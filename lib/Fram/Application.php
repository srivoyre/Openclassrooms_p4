<?php
namespace Fram;

$FramLoader = new SplClassLoader('Fram', '/lib');
$FramLoader->register();


abstract class Application
{
    protected $httpRequest;
    protected $httpResponse;
    protected $name;
    protected $user;
    protected $config;

    public function __construct()
    {
        $this->httpRequest = new HTTPRequest($this);
        $this->httpResponse = new HTTPResponse($this);
        $this->name = '';
        $this->user = new User($this);
        $this->config = new Config($this);
    }

    public function getController()
    {
        $router = new Router;
        
        $xml = new \DOMDocument;
        $xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml');

        $routes = $xml->getElementsByTagName('route');
        
        foreach ($routes as $route) 
        {
            $vars = [];

            // on regarde si des variables sont présentes dans l'URL.
            if ($route->hasAttribute('vars'))
            {
                $vars = explode(',', $route->getAttribute('vars'));
            }

            //on ajoute la route au routeur
        $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
        }

        try
        {
            // on récupère la route correspondante à l'URL
            $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
        }
        catch (\RuntimeException $e)
        {
            if ($e->getCode() == Router::NO_ROUTE)
            {
                // si aucune route ne correspond, c'est que la page demandée n'existe pas
                $this->httpResponse->redirect404();
            }
        }

        // on ajoute les variables de l'URL au tableau $_GET
        $_GET = array_merge($_GET, $matchedRoute->var());

        // on instancie le contrôleur
        $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
        return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());

    }
    abstract public function run();
    
    public function httpRequest()
    {
        return $this->httpRequest;
    }

    public function httpResponse()
    {
        return $this->httpResponse;
    }

    public function name()
    {
        return $this->name;
    }
}
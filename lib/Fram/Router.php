<?php
namespace Fram;

class Router
{
    protected $routes = [];

    const NO_ROUTE = 1;

    public function addRoute(Route $route)
    {
        if (!in_array($route, $this->routes))
        {
            $this->routes[] = $route;
        }
    }

    public function getRoute($url)
    {
        foreach ($this->routes as $route)
        {
            // la route correpsond à l'URL
            if (($varsValues = $route->match($url)) !== false) // voir si == true change qqch
            {
                if ($route->hasVars())
                {
                    $varsNames = $route->varsNames();
                    $listVars = [];

                    // nouveau tableau clé/valeur
                    // (clé = nom de la variable, valeur = sa valeur)
                    foreach ($varsValues as $key => $match)
                    {
                        // 1ere valeure contient entièrement la chaîne capturée (voir doc sur preg_match)
                        if ($key !== 0)
                        {
                            $listVars[$varsNames[$key - 1]] + $match;
                        }
                    }

                    // on assigne ce tableau de variables à la route
                    $route->setVars($listVars);
                }

                return $route;
            }
        }

        throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }
}
<?php
namespace Fram;

abstract class Application
{
    // 3 caratctéristiques : le nom, la requête http et sa réponse
    // 1 fonctionnalité : s'exéctuer

    // construction: cf UML

    protected $httpRequest;
    protected $httpResponse;
    protected $name;

    public function __construct()
    {
        $this->httpRequest = new HTTPRequest;
        $this->httpResponse = new HTTPResponse;
        $this->name = '';
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
<?php
namespace Fram;

class HTTPRequest
{
    // Représentation de la requête du client
    // contient des méthodes pour obtenir une variable GET, POST, un cookie, la méthode employée pour envoyer la requête (GET ou POST) et l'url d'entrée

    // construction: cf UML
    public function cookieData($key)
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    public function cookieExists($key)
    {
        return isset($_COOKIE[$key]);
    }

    public function getData($key) 
    {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    public function getExists($key)
    {
        return isset($_GET[$key]);
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function postData($key)
    {
        return isset($_POST[$key]);
    }

    public function requestURI()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
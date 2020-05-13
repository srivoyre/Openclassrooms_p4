<?php
namespace Fram;

class HTTPResponse
{
    /* 
    Représente la réponse envoyée au client
    Dans cette classe on va :
    - assigner une page à la réponse
    - envoyer la réponse en générant la page
    - rediriger l'utilisateur vers cette page
    - rediriger l'utilisateur vers une erreur 404 le cas échéant
    - ajouter un cookie
    - ajouter un header spécifique
    */

    // construction: cf UML

    protected $page;

    public function addHeader($header)
    {
        header($header);
    }

    public function redirect($location)
    {
        header('Location: ' .$location);
        exit;
    }

    public function redirect404()
    {
        
    }

    public function send()
    {
        exit($this->page->getGeneratedPage());
    }

    // public function setPage(Page $page)
    // {
    //     $this->page = $page;
    // }

    public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }
}
<?php
namespace Fram;

abstract class ApplicationComponent
{
    // Obtiens l'application auquel l'objet appartient

    // construction: cf UML

    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function app()
    {
        return $this->app;
    }
}
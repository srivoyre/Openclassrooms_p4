<?php
namespace Fram;

abstract class Entity implements \ArrayAccess
{
    protected $erreurs = [],
              $id;
    public function __construct(array $donnees = [])
    {
        if (empty($donnees) == false)
        {
            $this->hydrate($donnees));
        }
    }
}
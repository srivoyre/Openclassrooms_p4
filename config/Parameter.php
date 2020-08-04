<?php

namespace App\config;

class Parameter
{
    private $parameter;

    /**
     * Parameter constructor.
     */
    public function __construct($parameter)
    {
        $this->parameter = $parameter;
    }

    public function get(string $name)
    {
        if(isset($this->parameter[$name]))
        {
            return $this->parameter[$name];
        }
    }

    public function set(string $name, $value)
    {
        $this->parameter[$name] = $value;
    }

    public function all()
    {
        return $this->parameter;
    }
}
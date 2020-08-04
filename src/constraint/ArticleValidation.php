<?php

namespace App\src\constraint;

use App\config\Parameter;

class ArticleValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value)
        {
            $this->checkField($key,$value);
        }

        return $this->errors;
    }

    private function checkField(string $name, $value)
    {
        if($name === 'title')
        {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        }
        if($name === 'order_num')
        {
            $error = $this->checkOrderNum($name, $value);
            $this->addError($name, $error);
        }
        if($name === 'content')
        {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError(string $name, $error)
    {
        if($error)
        {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkTitle(string $name, $value)
    {
        if($this->constraint->notBlank($name, $value))
        {
            return $this->constraint->notBlank('titre', $value);
        }

        if($this->constraint->minLength($name, $value, 2))
        {
            return $this->constraint->minLength('titre', $value, 2);
        }

        if($this->constraint->maxLength($name, $value, 255));
        {
            return $this->constraint->maxLength('titre', $value, 255);
        }
    }

    private function checkContent(string $name, $value)
    {
        if($this->constraint->notBlank($name, $value))
        {
            return $this->constraint->notBlank('contenu', $value);
        }

        if($this->constraint->minLength($name, $value, 2))
        {
            return $this->constraint->minLength('contenu', $value, 2);
        }
    }

    private function checkOrderNum(string $name, $value)
    {
        if($this->constraint->notBlank($name, $value))
        {
            return $this->constraint->notBlank('numéro du chapitre', $value);
        }

        if($this->constraint->isPositiveInteger($value))
        {
            return $this->constraint->isPositiveInteger( $value);
        }

        if($this->constraint->maxLength($name, $value, 3))
        {
            return $this->constraint->maxLength('numéro du chapitre', $value, 3);
        }

    }

}
<?php

namespace App\src\constraint;

use App\src\Parameter;

/**
 * Class ArticleValidation
 * @package App\src\constraint
 */
class ArticleValidation extends Validation
{
    private $errors = [];
    private $constraint;

    /**
     * ArticleValidation constructor.
     */
    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    /**
     * @param Parameter $post
     * @return array
     */
    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key,$value);
        }

        return $this->errors;
    }

    /**
     * @param string $name
     * @param $value
     */
    private function checkField(string $name, $value)
    {
        if ($name === 'title') {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        }

        if ($name === 'order_num') {
            $error = $this->checkOrderNum($name, $value);
            $this->addError($name, $error);
        }

        if ($name === 'content') {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
    }

    /**
     * @param string $name
     * @param $error
     */
    private function addError(string $name, $error)
    {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }


    /**
     * @param string $name
     * @param $value
     * @return string
     */
    private function checkTitle(string $name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('titre', $value);
        }

        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('titre', $value, 2);
        }

        if ($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('titre', $value, 255);
        }
    }


    /**
     * @param string $name
     * @param $value
     * @return string
     */
    private function checkContent(string $name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('contenu', $value);
        }

        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('contenu', $value, 2);
        }
    }


    /**
     * @param string $name
     * @param $value
     * @return string
     */
    private function checkOrderNum(string $name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('numéro du chapitre', $value);
        }

        if ($this->constraint->isPositiveInteger($value)) {
            return $this->constraint->isPositiveInteger( $value);
        }

        if ($this->constraint->maxLength($name, $value, 3)) {
            return $this->constraint->maxLength('numéro du chapitre', $value, 3);
        }

    }
}
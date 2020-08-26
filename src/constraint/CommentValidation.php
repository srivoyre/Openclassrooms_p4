<?php

namespace App\src\constraint;

use App\src\Parameter;

/**
 * Class CommentValidation
 * @package App\src\constraint
 */
class CommentValidation extends Validation
{
    private $errors = [];
    private $constraint;

    /**
     * CommentValidation constructor.
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
            $this->checkField($key, $value);
        }

        return $this->errors;
    }

    /**
     * @param string $name
     * @param $value
     */
    private function checkField(string $name, $value)
    {
        if ($name === 'content') {
            $error = $this->checkContent($name, $value);
            $this->addError('content', $error);
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
    private function checkContent(string $name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('contenu', $value);
        }

        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('contenu', $value, 2);
        }
    }
}
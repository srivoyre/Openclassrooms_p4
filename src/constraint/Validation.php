<?php

namespace App\src\constraint;

use App\src\Parameter;

/**
 * Class Validation
 * @package App\src\constraint
 */
class Validation
{
    /**
     * @param Parameter $data
     * @param string $name
     * @return array
     */
    public function validate(Parameter $data, string $name)
    {
        if ($name === 'Article') {
            $articleValidation = new ArticleValidation();
            $errors = $articleValidation->check($data);
            return $errors;
        } elseif($name === 'Comment') {
            $commentValidation = new CommentValidation();
            $errors = $commentValidation->check($data);
            return $errors;
        } elseif($name === 'User') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
    }
}
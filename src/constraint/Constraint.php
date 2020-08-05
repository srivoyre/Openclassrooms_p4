<?php

namespace App\src\constraint;

class Constraint
{
    public function notBlank(string $name, $value)
    {
        if (empty($value)) {
            return '<p>Le champ '.$name.' saisi est vide</p>';
        }
    }

    public function minLength(string $name, $value, int $minSize)
    {
        if (strlen($value) < $minSize) {
            return '<p>Le champ '.$name.' doit contenir au moins '.$minSize.' caractères</p>';
        }
    }

    public function maxLength(string $name, $value, int $maxSize)
    {
        if (strlen($value) > $maxSize) {
            return '<p>Le champ '.$name.' doit contenir au maximum '.$maxSize.' caractères</p>';
        }
    }

    public function isPositiveInteger($value)
    {
        if (!is_int($value + 0) || ($value +0) < 0) {
            return '<p>Veuillez saisir un nombre entier positif </p>';
        }
    }

    public function isEmail($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return '<p>Veuillez saisir une adresse e-mail valide </p>';
        }
    }

}
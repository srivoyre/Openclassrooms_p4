<?php

require '../config/dev.php';
require '../vendor/autoload.php';

try
{
    if (isset($_GET['route']))
    {
        if($_GET['route'] === 'post')
        {
            require '../templates/single.php';
        }
        else
        {
            echo 'page inconnue';
        }
    }
    else
    {
        require '../templates/home.php';
    }
}
catch (Exception $ex)
{
    echo 'Erreur';
}
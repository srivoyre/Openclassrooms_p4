<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf159b1c3c42bda941f7690dcd5219eff
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
        'A' => 
        array (
            'App\\src\\' => 8,
            'App\\config\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'App\\src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf159b1c3c42bda941f7690dcd5219eff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf159b1c3c42bda941f7690dcd5219eff::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf159b1c3c42bda941f7690dcd5219eff::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
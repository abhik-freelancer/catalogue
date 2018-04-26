<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf077f05f82b646a85d2b0cabe820a9cd
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf077f05f82b646a85d2b0cabe820a9cd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf077f05f82b646a85d2b0cabe820a9cd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

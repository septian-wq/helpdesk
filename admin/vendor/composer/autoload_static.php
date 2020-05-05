<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7a50319192f1ddc1fb4b66f03c1592e4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7a50319192f1ddc1fb4b66f03c1592e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7a50319192f1ddc1fb4b66f03c1592e4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

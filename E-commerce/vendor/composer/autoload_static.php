<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit394edb36dac3005e2efd69c7eb16aa28
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit394edb36dac3005e2efd69c7eb16aa28::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit394edb36dac3005e2efd69c7eb16aa28::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit394edb36dac3005e2efd69c7eb16aa28::$classMap;

        }, null, ClassLoader::class);
    }
}

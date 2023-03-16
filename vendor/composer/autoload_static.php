<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit97746c7faa506f4284185acf676fb185
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit97746c7faa506f4284185acf676fb185::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit97746c7faa506f4284185acf676fb185::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit97746c7faa506f4284185acf676fb185::$classMap;

        }, null, ClassLoader::class);
    }
}

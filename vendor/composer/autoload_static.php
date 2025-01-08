<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita42144d7ca72776bb0d59fc32fbac2c2
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mattyeend\\Logger\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mattyeend\\Logger\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita42144d7ca72776bb0d59fc32fbac2c2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita42144d7ca72776bb0d59fc32fbac2c2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita42144d7ca72776bb0d59fc32fbac2c2::$classMap;

        }, null, ClassLoader::class);
    }
}

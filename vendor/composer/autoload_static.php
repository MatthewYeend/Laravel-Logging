<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9d7fd35b828101a0821ab0db6e39f838
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MattYeend\\Logger\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MattYeend\\Logger\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9d7fd35b828101a0821ab0db6e39f838::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9d7fd35b828101a0821ab0db6e39f838::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9d7fd35b828101a0821ab0db6e39f838::$classMap;

        }, null, ClassLoader::class);
    }
}

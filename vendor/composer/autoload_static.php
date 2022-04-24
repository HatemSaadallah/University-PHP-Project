<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbf47bc50e4cc72d313b7f3bb80fd59e1
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbf47bc50e4cc72d313b7f3bb80fd59e1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbf47bc50e4cc72d313b7f3bb80fd59e1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbf47bc50e4cc72d313b7f3bb80fd59e1::$classMap;

        }, null, ClassLoader::class);
    }
}
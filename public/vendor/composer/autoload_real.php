<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd19944fc15bd7d40eb3a1a306a925fe7
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitd19944fc15bd7d40eb3a1a306a925fe7', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd19944fc15bd7d40eb3a1a306a925fe7', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd19944fc15bd7d40eb3a1a306a925fe7::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
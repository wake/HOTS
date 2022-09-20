<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2f93f780826f38a44f4d39d6c7a7cadc
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

        spl_autoload_register(array('ComposerAutoloaderInit2f93f780826f38a44f4d39d6c7a7cadc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2f93f780826f38a44f4d39d6c7a7cadc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2f93f780826f38a44f4d39d6c7a7cadc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

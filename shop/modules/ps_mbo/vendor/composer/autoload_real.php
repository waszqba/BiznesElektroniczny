<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3308c2b2ef36c3ad49b5fdef4fa53607
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit3308c2b2ef36c3ad49b5fdef4fa53607', 'loadClassLoader'), true, false);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit3308c2b2ef36c3ad49b5fdef4fa53607', 'loadClassLoader'));

        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
        if ($useStaticLoader) {
            require_once __DIR__ . '/autoload_static.php';

            call_user_func(\Composer\Autoload\ComposerStaticInit3308c2b2ef36c3ad49b5fdef4fa53607::getInitializer($loader));
        } else {
            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }

        $loader->setClassMapAuthoritative(true);
        $loader->register(false);

        if ($useStaticLoader) {
            $includeFiles = Composer\Autoload\ComposerStaticInit3308c2b2ef36c3ad49b5fdef4fa53607::$files;
        } else {
            $includeFiles = require __DIR__ . '/autoload_files.php';
        }
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire3308c2b2ef36c3ad49b5fdef4fa53607($fileIdentifier, $file);
        }

        return $loader;
    }
}

function composerRequire3308c2b2ef36c3ad49b5fdef4fa53607($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        require $file;

        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;
    }
}

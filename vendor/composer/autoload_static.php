<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb77f6acb8a06201afbc2c5726468dea5
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'fand\\Classes\\' => 13,
            'fand\\' => 5,
        ),
        'A' => 
        array (
            'Automattic\\WooCommerce\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'fand\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Classes',
        ),
        'fand\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'Automattic\\WooCommerce\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/woocommerce/src/WooCommerce',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTTP_Request2' => 
            array (
                0 => __DIR__ . '/..' . '/pear/http_request2',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Net_URL2' => __DIR__ . '/..' . '/pear/net_url2/Net/URL2.php',
        'PEAR_Exception' => __DIR__ . '/..' . '/pear/pear_exception/PEAR/Exception.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb77f6acb8a06201afbc2c5726468dea5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb77f6acb8a06201afbc2c5726468dea5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb77f6acb8a06201afbc2c5726468dea5::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitb77f6acb8a06201afbc2c5726468dea5::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

/**
 * zPhpExt. Easy and simplified ExtJS UI Wrapper
 *
 * This software allows you to create ExtJs user interfaces using only PHP code.
 * @author Xavier Piquer <xavi@metadev.net>
 * @version 1.0
 * @package zPhpExt
 */

namespace zPhpExt;

/**
 * Singleton model
 *
 * @package zPhpExt
 * @subpackage classes
 */

class singletonModel extends main
{
    /**
     * Instance of singleton's class
     *
     * @var array
     */
    private static $_instance;

    /**
     * All constructeur should be protected
     */
    protected function __construct(){}

    /**
     * Singleton method to load a new object
     *
     * @return HlPwd_SingletonModel
     */
    public static function getSingleton()
    {
        if (!isset(self::$_instance[ get_called_class() ]))
        {
            $c = get_called_class();
            self::$_instance = new $c;
        }

        return self::$_instance;
    }

    /**
     * Destroy the singleton
     */
    public function destroySingleton()
    {
        unset(self::$_instance[ get_class($this) ]);
    }

    /**
     * Impeach the clone of singleton
     */
    public function __clone()
    {
        trigger_error('Cloning not allowed on a singleton object', E_USER_ERROR);
    }
}
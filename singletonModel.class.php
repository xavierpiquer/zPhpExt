<?php

/**
 * zPhpExt. Easy and simplified ExtJS UI Wrapper
 *
 * This software allows you to create ExtJs user interfaces using only PHP code.
 *
 * zPhpExt. ExtJS wrapper and quick UI development for PHP.

    Copyright (C) 2010  Xavier Piquer

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 *
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
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
 * Main class. Extjs viewport construction.
 *
 * @package zPhpExt
 * @subpackage classes
 */

abstract class main
{
    /**
     * Private var. stores list of created ID's
     * @access private
     * @var array
     */
    static private $_idList = array();

    /**
     * Create new unique ID for extjs widget id's
     * @return string $id
     */
    public function _getId($idType, $id = null)
    {
        if(!is_null($id) && !empty($id) && $this->_existsId($idType, $id))
        {
            trigger_error('ID already exists.', E_USER_ERROR);
        }
        else
        {
            if(is_null($id) || empty($id))
            {
                $result = uniqid(rand(), true);
            }
            else
            {
                $result = $id;
            }
            self::$_idList[$idType][] = $result;
        }
        
        return $result;
    }

    private function _existsId($idType, $id)
    {
        if(!isset(self::$_idList[$idType]))
        {
            return false;
        }
        
        if(in_array($id, self::$_idList[$idType]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
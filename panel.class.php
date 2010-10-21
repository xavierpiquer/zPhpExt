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

class panel extends main
{
    /**
     * Public var. stores object type
     * @access public
     * @var string
     */
    public $itemType = 'panel';

    /**
     * Public var. stores item ID
     * @access public
     * @var string
     */
    public $id = null;

    /**
     * Public var. stores items
     * @access public
     * @var array
     */
    public $items = array();

    /**
     * Public var. stores attributes
     * @access public
     * @var array
     */
    public $attributes = array();

    public function __construct($id = null)
    {
        $this->id = $this->_getId($this->itemType, $id);
    }

    /**
     * Adds the corresponding extjs attribute to region object
     */
    public function __call($method, $attrValue)
    {
        if(strpos($method, 'setAttribute') !== false)
        {
            $itemAttribute = lcfirst(substr_replace($method, '', 0, 12));
            $this->attributes[$itemAttribute] = $attrValue;
        }
        else
        {
            trigger_error($method.' Method not available.', E_USER_ERROR);
        }
    }

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getItems()
    {
        return $this->items;
    }

    /**
     * Return extjs object type
     * @return string
     */
    public function getObjectType()
    {
        return $this->itemType;
    }
}
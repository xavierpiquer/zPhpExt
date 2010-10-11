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
 * Main class. Extjs viewport construction.
 *
 * @package zPhpExt
 * @subpackage classes
 */

class userInterfaceRegion extends main
{
    /**
     * Public var. stores object type
     * @access public
     * @var string
     */
    public $itemType = 'region';

    /**
     * Public var. stores region ID
     * @access public
     * @var string
     */
    public $id = null;

    /**
     * Public var. stores item for region
     * @access public
     * @var array
     */
    public $items = array();

    /**
     * Private var. stores region attributes
     * @access private
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
            $regionAttribute = lcfirst(substr_replace($method, '', 0, 12));
            $this->attributes[$regionAttribute] = $attrValue;
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
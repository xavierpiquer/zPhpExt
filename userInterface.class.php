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

class userInterface extends singletonModel
{
    /**
     * Public var. stores object type
     * @access public
     * @var string
     */
    public $itemType = 'viewport';

    /**
     * Public var. stores the object ID
     * @access public
     * @var string
     */
    public $id = null;

    /**
     * Private var. stores viewport attributes
     * @access protected
     * @var array
     */
    private $_attributes = array();

    /**
     * Public var. stores language for extjs framework messages.
     * @access protected
     * @var string
     */
    static public $_uiLanguage;

    /**
     * Public var. stores theme definition for extjs.
     * @access protected
     * @var string
     */
    static public $_uiTheme;

    /**
     * Public var. stores object regions for viewport
     * @access public
     * @var array
     */
    public $regions = array();

    
    public function __construct($id = null)
    {
        $this->id = $this->_getId($this->itemType, $id);
        // Adds main region (center)
        $this->_addRegion(new userInterfaceRegion(), 'center');
    }

    /**
     * Set the language for extjs messages
     * @param string $value
     * @return string|value setted
     */
    public function setLanguage($value = 'en')
    {
        self::$_uiLanguage = $value;

        return true;
    }

    /**
     * Set the theme for extjs
     * @param string $value
     * @return string|value setted
     */
    public function setTheme($value = 'blue')
    {
        self::$_uiTheme = $value;

        return true;
    }

    /**
     * Adds the corresponding extjs attribute to userInterface object
     */
    public function __call($method, $attrValue)
    {
        if(strpos($method, 'setAttribute') !== false)
        {
            $extjsAttribute = lcfirst(substr_replace($method, '', 0, 12));
            $this->_attributes[$extjsAttribute] = $attrValue;
        }
        else
        {
            trigger_error($method.' Method not available.', E_USER_ERROR);
        }
    }

    /**
     * Return extjs language
     * @return string
     */
    public function getLanguage()
    {
        return $self::uiLanguage;
    }

    /**
     * Return extjs theme
     * @return string
     */
    public function getTheme()
    {
        return $self::uiTheme;
    }

    /**
     * Return extjs object type
     * @return string
     */
    public function getObjectType()
    {
        return $this->itemType;
    }

    /**
     * Return extjs object attributes
     * @return array
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * Add a new region in viewport
     * @param string $parent|parent object for new item
     * @param string $id
     */
    private function _addRegion(userInterfaceRegion $region, $nsea = 'center')
    {      
        $this->regions[$nsea] = $region;

        return true;
    }
    
    public function setNorthRegion($region = null)
    {
        krumo($region);
        if(is_null($region) || empty($region))
        {
            $region = new userInterfaceRegion();
        }
        $this->_addRegion($region, 'north');

        return true;
    }

    public function setSouthRegion($region = null)
    {
        if(is_null($region) || empty($region))
        {
            $region = new userInterfaceRegion();
        }
        $this->_addRegion($region, 'south');
    }

    public function setEastRegion($region = null)
    {
        if(is_null($region) || empty($region))
        {
            $region = new userInterfaceRegion();
        }
        $this->_addRegion($region, 'east');
    }

    public function setWestRegion($region = null)
    {
        if(is_null($region) || empty($region))
        {
            $region = new userInterfaceRegion();
        }
        $this->_addRegion($region, 'west');
    }

    public function getRegions()
    {
        return $this->regions;
    }

    public function getNorthRegion()
    {
        return $this->regions['north'];

    }

    public function getSouthRegion()
    {
        return $this->regions['south'];
    }

    public function getEastRegion()
    {
        return $this->regions['east'];
    }

    public function getWestRegion()
    {
        return $this->regions['west'];
    }

    public function render($imageUrl, $msgTarget)
    {
        \zPhpExt\userInterfaceRender::$imageUrl = $imageUrl;
        \zPhpExt\userInterfaceRender::$msgTarget = $msgTarget;
        $result = \zPhpExt\userInterfaceRender::render($this);

        return $result;
    }
}
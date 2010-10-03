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

require_once("render.class.php");

/**
 * Main class. Extjs viewport construction.
 *
 * @package zPhpExt
 * @subpackage classes
 */

class userInterface extends render
{
    /**
     * Protected var. stores language for extjs framework messages.
     * @access protected
     * @var string
     */
    private $_uiLanguage;

    /**
     * Protected var. stores theme definition for extjs.
     * @access protected
     * @var string
     */
    private $_uiTheme;

    /**
     * Protected var. stores object type
     * @access protected
     * @var string
     */
    private $_ObjectType = 'Viewport';

    /**
     * Protected var. stores the object ID
     * @access protected
     * @var string
     */
    private $_ObjectId = null;

    /**
     * Protected var. stores viewport attributes
     * @access protected
     * @var array
     */
    private $_attributes = array();

    public function __construct()
    {
        $this->addRegion();
    }

    /**
     * Create new unique ID for extjs widget id's
     * @return string $id
     */
    protected function _getID()
    {
        $id = uniqid(rand(), true);

        return $id;
    }

    private static function _addRegion($region)
    {
        krumo($region);
    }

    /**
     * Set the language for extjs messages
     * @param string $value
     * @return string|value setted
     */
    public function setLanguage($value = 'en')
    {
        $this->_uiLanguage = $value;

        return $this->_uiLanguage;
    }

    /**
     * Set the theme for extjs
     * @param string $value
     * @return string|value setted
     */
    public function setTheme($value = 'blue')
    {
        $this->_uiTheme = $value;

        return $this->_uiTheme;
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
     */
    public function getLanguage()
    {
        return $this->_uiLanguage;
    }

    /**
     * Return extjs theme
     */
    public function getTheme()
    {
        return $this->_uiTheme;
    }

    /**
     * Return extjs object type
     */
    public function getObjectType($id)
    {
        return $this->_ObjectType;
    }

    /**
     * Return extjs object attributes
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }
}
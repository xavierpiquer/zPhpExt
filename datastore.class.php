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
 * Datastore class. Extjs datastores construction.
 *
 * @package zPhpExt
 * @subpackage classes
 */

class datastore
{
    /**
     * Public var. store object type
     * @access public
     * @var string
     */
    public $itemType = 'datastore';

    /**
     * Public var. store datastore ID
     * @access public
     * @var string
     */
    public $id = null;

    /**
     * Public var. stores attributes
     * @access public
     * @var array
     */
    public $attributes = array();

    /**
     * Public var. store fields
     * @access public
     * @var array
     */
    public $fields = array();

    public function __construct($id = null)
    {
        $this->id = $this->getId($this->itemType, $id);
    }

    /**
     * Adds the corresponding extjs attribute to object
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

    /**
     * Add new field to datastore
     */
    public function addField($field)
    {
        array_push($field, $this->fields);
    }

    /**
     * Return datastore fields
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Return datastore ID
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Return datastore attributes
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
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
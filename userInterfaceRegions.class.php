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

class userInterfaceRegions extends userInterface
{
    /**
     * Protected var. stores object type
     * @access protected
     * @var string|southRegion northRegion eastRegion westRegion
     */
    private $_ObjectType = null;

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

    /**
     * Protected var. stores regions for viewport, usually: north, south, east, west regions
     * @access protected
     * @var array
     */
    private $_regions = array();

    private $_region = 'center';

    /**
     * Adds the corresponding extjs attribute to region object
     */
    public function __call($method, $attrValue)
    {
        if(strpos($method, 'setAttribute') !== false)
        {
            $regionAttribute = lcfirst(substr_replace($method, '', 0, 12));
            $this->regions[$this->_region][$this->_attributes[$extjsAttribute]] = $attrValue;
        }
        else
        {
            trigger_error($method.' Method not available.', E_USER_ERROR);
        }
    }

    /**
     * Check if region already exists
     * @param string $region
     * @return bool| true false
     */
    private function _regionExists($region)
    {
        if(array_key_exists($region, $this->_regions))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Add a new region in viewport
     * @param string $parent|parent object for new item
     * @param string $id
     */
    private function _addNewRegion($id, $region = 'center')
    {
        // Check if requested region already exists
        if($this->_regionExists($region))
        {
            error_log($region.' region for '.$id.' '.$this->ObjectType.
                ' already exists.');
        }
        else
        {
            if(is_null($id) || empty($id))
            {
                $id = $this->_getID();
            }
            $this->_regions[] = $region;
            $this->_regions[$region]['id'] = $id;
            $this::addRegion($this->_regions[$region]);
        }
        
    }

    private function _setRegion($region)
    {
        $this->_region = $region;
    }

    public function getNorthRegion()
    {
        $this->_setRegion('north');
        return $this->_regions['north'];

    }

    public function getSouthRegion()
    {
        $this->_setRegion('south');
        return $this->_regions['south'];
    }

    public function getEastRegion()
    {
        $this->_setRegion('east');
        return $this->_regions['east'];
    }

    public function getWestRegion()
    {
        $this->_setRegion('west');
        return $this->_regions['west'];
    }

    public function addNorthRegion($id)
    {
        if(is_null($id) || empty($id))
        {
            $id = $this->_getID();
        }
        $this->_addNewRegion($id, 'north');
    }

    public function addSouthRegion($id)
    {
        if(is_null($id) || empty($id))
        {
            $id = $this->_getID();
        }
        $this->_addNewRegion($id, 'south');
    }

    public function addEastRegion($id)
    {
        if(is_null($id) || empty($id))
        {
            $id = $this->_getID();
        }
        $this->_addNewRegion($id, 'east');
    }

    public function addWestRegion($id)
    {
        if(is_null($id) || empty($id))
        {
            $id = $this->_getID();
        }
        $this->_addNewRegion($id, 'west');
    }

}
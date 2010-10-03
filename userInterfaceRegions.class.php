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

class userInterfaceRegions
{
    /**
     * Protected var. stores object type
     * @access protected
     * @var string|southRegion northRegion eastRegion westRegion
     */
    protected $_ObjectType = null;

    /**
     * Protected var. stores the object ID
     * @access protected
     * @var string
     */
    protected $_ObjectId = null;

    /**
     * Protected var. stores viewport attributes
     * @access protected
     * @var array
     */
    protected $_attributes = array();
    /**
     * Protected var. stores items for viewport, usually: north, south, east, west regions
     * @access protected
     * @var array
     */
    protected $_regions = array();

    protected $_region = array(
        "id"        => null,
        "position"  => "center",
        "title"     => null,
        "split"     => true,
        "width"     => "auto",
        "height"    => "auto");

    /**
     * Adds the corresponding extjs attribute to region object
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
    private function _addRegion($region = 'center', $id)
    {
        // Check if requested region already exists
        if($this->_regionExists($region))
        {
            error_log($region.' item for '.$id.' '.$this->ObjectType.
                ' already exists.');
        }

        if(is_null($id) || empty($id))
        {
            $id = $this->_getID();
        }

        $this->_regions[] = $region;
    }

    public function addNorthRegion($id)
    {

    }

    public function addSouthRegion($id)
    {

    }

    public function addEastRegion($id)
    {

    }

    public function addWestRegion($id)
    {

    }

}
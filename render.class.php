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
 * Renderization class
 *
 * @package zPhpExt
 * @subpackage classes
 */

class renderObject
{
    /**
     * Private var. stores the object passed to be rendered
     * @access private
     * @var object
     */
    private $_objectToRender = null;

    /**
     * Private var. stores result text
     * @access private
     * @var array
     */
    private $_result = array();
    
    /**
     * Get the object and assign it to a private property
     * @param string $sentence
     * @return bool|true false
     */
    public function  __construct($object)
    {
        $this->_objectToRender = $object;

    }

    /**
     * Add new sentences to final text result
     * @param string $sentence
     * @return bool|true false
     */
    private function _addSentence($sentence)
    {
        array_push($this->_result, $sentence);
    }

    /**
     * Get the Items of an object
     * @return array of intems strcuture
     */
    private function _getObjectItems()
    {

    }

    /**
     * Parse userInterface object and builds final text
     * @return bool|true false
     */
    private function _parseObject()
    {

    }

    /**
     * Return extjs code
     */
    public function render()
    {
        $value = "Render Done!";
        return $value;
    }
}
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

require_once("singletonModel.class.php");

/**
 * Renderization class
 *
 * @package zPhpExt
 * @subpackage classes
 */

class render extends singletonModel
{
    /**
     * Private var. stores result text
     * @access private
     * @var array
     */
    private $_result = array();
    
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
     * Add new sentences to final text result
     * @param string $sentence
     * @return bool|true false
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
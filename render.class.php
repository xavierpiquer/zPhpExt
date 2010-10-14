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

class userInterfaceRender
{
    /**
     * Private var. stores result javascript
     * @access private
     * @var array
     */
    private $_result = array();

    public static $imageUrl = '/';

    public static $msgTarget = 'side';
    
    /**
     * Get the object and assign it to a private property
     * @param string $sentence
     * @return bool|true false
     */
    public function  __construct($uiObject = null)
    {
        $this->_initialize();
        $this->_parseObject($uiObject);

        return $this->_result;
    }

    private function _initialize()
    {
        $jsCodeInit = \zPhpExt\templates\init::setInit(self::$imageUrl, self::$msgTarget);
        foreach($jsCodeInit as $jsCode)
        {
            $this->_addSentence($jsCode);
        }
    }

    /**
     * Parse userInterface object and builds final text
     * @return bool|true false
     */
    private function _parseObject($uiObject)
    {
        switch ($uiObject->itemType)
        {
            case 'viewport':

            break;
            case 'region':

            break;
            case 'panel':

            break;
            case 'grid':

            break;
            case 'tree':

            break;
        }        
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
     * Static access to the class. Returns javascript code.
     * @param userInterface object
     * @return string
     */
    public static function render(userInterface $ui)
    {
        $instance = new userInterfaceRender($ui);

        return $instance->_result;
 
    }
}
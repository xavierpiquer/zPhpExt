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
     * Private var. store result javascript after parsing main object
     * @access private
     * @var array
     */
    private $_content = array();

    /**
     * Public var. define Ext image
     * @access public
     * @var string
     */
    public static $imageUrl = '/';

    /**
     * Public var. define target of Ext messages
     * @access public
     * @var string
     */
    public static $msgTarget = 'side';
    
    /**
     * Parse userInterface object and builds final text
     * @return bool|true false
     */
    private function _parseObject($uiObject)
    {
        // Bucle por objeto
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

        $jsCode =
            \zPhpExt\templates\init::setInit(
                self::$imageUrl,
                self::$msgTarget,
                $this->_content
        );

        return $jsCode;
    }

    /**
     * Static access to the class. Returns javascript code.
     * @param userInterface object
     * @return string
     */
    public static function render(userInterface $ui)
    {
        $renderization = new userInterfaceRender();
        $result = $renderization->_parseObject($ui);

        return $result;
    }
}
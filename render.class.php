<?php

/**
 * zPhpExt. Easy and simplified ExtJS UI Wrapper
 *
 * This software allows you to create ExtJs user interfaces using only PHP code.
 *
 * zPhpExt. ExtJS wrapper and quick UI development for PHP.

    Copyright (C) 2010  Xavier Piquer

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 *
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
        // Object iteration
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
            \zPhpExt\templates\init::setTemplate(
                'init.template.js',
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
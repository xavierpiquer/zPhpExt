<?php
/**
 * zPhpExt. Easy and simplified ExtJS UI Wrapper
 *
 * This software allows you to create ExtJs user interfaces using only PHP code.
 * @author Xavier Piquer <xavi@metadev.net>
 * @version 1.0
 * @package zPhpExt
 */

namespace zPhpExt\templates;

/**
 * Main class. Extjs viewport construction.
 *
 * @package zPhpExt
 * @subpackage classes
 */

class init
{
    private $_result = array();

    private function _setExtImageUrl($url)
    {
        array_push($this->_result, "Ext.BLANK_IMAGE_URL = '".$url."'");
    }

    private function _setExtCookieProvider()
    {
        array_push($this->_result, "Ext.state.Manager.setProvider(new Ext.state.CookieProvider());");
    }

    private function _getTop()
    {
        array_push($this->_result, "Ext.onReady(function(){");
        array_push($this->_result, "Ext.QuickTips.init();");
    }

    private function _setMsgTarget($target)
    {
        array_push($this->_result, "Ext.form.Field.prototype.msgTarget = '".$target."';");
    }

    private function _setContentTag()
    {
        array_push($this->_result, '|CONTENT|');
    }

    private function _getBottom()
    {
        array_push($this->_result, "});");
    }

    public static function setInit($imageUrl = '/', $msgTarget = 'side')
    {
        $instance = new init();
        $instance->_setExtImageUrl($imageUrl);
        $instance->_setExtCookieProvider();
        $instance->_getTop();
        $instance->_setMsgTarget($msgTarget);
        $instance->_setContentTag();
        $instance->_getBottom();
        
        return $instance->_result;
    }
}
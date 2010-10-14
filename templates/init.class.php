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
 * Init template class. Parse init.temlate file.
 *
 * @package zPhpExt
 * @subpackage templates
 */

class init
{
    private $_match = array('|IMAGE_URL|', '|MSGTARGET|');
    private $_result = array();
    public static $IMAGE_URL = null;
    public static $MSGTARGET = null;

    public function __construct()
    {
        array_walk($this->_match, $this->_replace);

        return $this->_result;
    }

    private function _replace($tag)
    {
        $template = file('jscode/init.template.js');
        foreach($template as $line)
        {
            $this->_result[] = str_replace($tag, self::$$tag, $line);
        }
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
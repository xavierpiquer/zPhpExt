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
 * Init template class. Parse init.template file.
 *
 * @package zPhpExt
 * @subpackage templates
 */

class init extends main
{
    private $_result = array();

    private function __construct($template, $paramsArray)
    {
        $this->_result = $this->replace($template, $paramsArray);
        
        return $this->_result;
    }

    public static function setTemplate($template, $imageUrl = '/',
        $msgTarget = 'side', $content = null)
    {
        $paramsArray = array(
            'IMAGE_URL' =>  $imageUrl,
            'MSGTARGET' =>  $msgTarget,
            'CONTENT'   =>  $content);
        
        $instance = new init($template, $paramsArray);
        
        return $instance->_result;
    }
}
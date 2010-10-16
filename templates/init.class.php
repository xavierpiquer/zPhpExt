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
    //private $_match = array('IMAGE_URL', 'MSGTARGET');
    private $_result = array();
    /*public static $IMAGE_URL = null;
    public static $MSGTARGET = null;*/

    private function __construct($paramsArray)
    {
        $templateLines = file('templates/jscode/init.template.js');
        foreach($templateLines as $line)
        {
            $this->_result[] = $this->_replace($line, $paramsArray);
        }

        return $this->_result;
    }

    private function _replace($line, $paramsArray)
    {
        $first = stripos($line, '<zPhpExt>');
        $last = stripos($line, '</zPhpExt>');
        if($first !== false && $last !== false)
        {
            $first = $first + 9;
            $length = $last - $first;
            $value = substr($line, $first, $length);
            $line = substr_replace($line, $paramsArray[$value], $first - 9, $length+19);
            $this->_replace($line, $paramsArray);
        }

       return($line);
    }

    public static function setInit($imageUrl = '/', $msgTarget = 'side', $content = null)
    {
        $paramsArray = array(
            'IMAGE_URL' =>  $imageUrl,
            'MSGTARGET' =>  $msgTarget,
            'CONTENT'   =>  $content);
        
        $instance = new init($paramsArray);
        
        return $instance->_result;
    }
}
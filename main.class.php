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

abstract class main
{
    /**
     * Private var. stores list of created ID's
     * @access private
     * @var array
     */
    static private $_idList = array();

    /**
     * Create new unique ID for extjs widget id's
     * @return string $id
     */
    public function _getId($idType, $id = null)
    {
        if(!is_null($id) && !empty($id) && $this->_existsId($idType, $id))
        {
            trigger_error('ID already exists.', E_USER_ERROR);
        }
        else
        {
            if(is_null($id) || empty($id))
            {
                $result = uniqid(rand(), true);
            }
            else
            {
                $result = $id;
            }
            self::$_idList[$idType][] = $result;
        }
        
        return $result;
    }

    private function _existsId($idType, $id)
    {
        if(!isset(self::$_idList[$idType]))
        {
            return false;
        }
        
        if(in_array($id, self::$_idList[$idType]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
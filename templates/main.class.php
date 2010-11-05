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

namespace zPhpExt\templates;

/**
 * Main class for template replaces
 *
 * @package zPhpExt
 * @subpackage templates
 */

abstract class main
{
    public function replace($template, $paramsArray)
    {
        $result = array();
        $templateLines = file('templates/jscode/'.$template);
        foreach($templateLines as $line)
        {
            $result[] = $this->_replaceInTemplate($line, $paramsArray);
        }

        return $result;
    }

    private function _replaceInTemplate($line, $paramsArray)
    {
        $first = stripos($line, '<zPhpExt>');
        $last = stripos($line, '</zPhpExt>');
        if($first !== false && $last !== false)
        {
            $first = $first + 9;
            $length = $last - $first;
            $value = substr($line, $first, $length);
            $line = substr_replace($line, $paramsArray[$value], $first - 9, $length+19);
            $this->_replaceInTemplate($line, $paramsArray);
        }

       return($line);
    }

}
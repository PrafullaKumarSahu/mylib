<?php
/**
 * This functions is used for security purposes, it will
 * convert all applicable characters to HTML entities.
 *
 * This will prevents Cross-site scripting attacks.
 *
 * @param $string
 * @return string
 * @link http://php.net/htmlentities
 * @tutorial http://dwindle.link/Py604
 *
 * @author Andre Ferraz
 *
 * The tutorial link has been a reference for possible
 * vulnerabilities, have a look at it.
 */
    function encode($string)
    {
        return htmlentities($string, ENT_QUOTES, 'UTF-8');
    }
?>
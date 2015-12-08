<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of __string
 *
 * @author bassam
 */
class __string {

    function in_array_r($needle, $haystack, $strict = false) {
        if (is_array($haystack)) {
            foreach ($haystack as $item) {
                if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
                    return true;
                }
            }
        }

        return false;
    }

    function after($strthis, $inthat) {
        if (!is_bool(strpos($inthat, $strthis))) {
            return substr($inthat, strpos($inthat, $strthis) + strlen($strthis));
        }
    }

    function after_last($strthis, $inthat) {
        if (!is_bool($this->strrevpos($inthat, $strthis))) {
            return substr($inthat, $this->strrevpos($inthat, $strthis) + strlen($strthis));
        }
    }

    function before($strthis, $inthat) {
        return substr($inthat, 0, strpos($inthat, $strthis));
    }

    function before_last($strthis, $inthat) {
        return substr($inthat, 0, $this->strrevpos($inthat, $strthis));
    }

    function between($strthis, $that, $inthat) {
        return $this->before($that, $this->after($strthis, $inthat));
    }

    function between_last($strthis, $that, $inthat) {
        return $this->after_last($strthis, $this->before_last($that, $inthat));
    }

// use strrevpos function in case your php version does not include it
    function strrevpos($instr, $needle) {
        $rev_pos = strpos(strrev($instr), strrev($needle));
        if ($rev_pos === false) {
            return false;
        } else
            return strlen($instr) - $rev_pos - strlen($needle);
    }

}

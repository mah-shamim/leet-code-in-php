<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function clearDigits($s) {
        $stack = array();
        foreach (str_split($s) as $char) {
            if (ctype_digit($char)) {
                if (!empty($stack)) {
                    array_pop($stack);
                }
            } else {
                array_push($stack, $char);
            }
        }
        return implode('', $stack);
    }
}
<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function doesAliceWin($s) {
        $vowels = "aeiou";
        for ($i = 0; $i < strlen($s); $i++) {
            if (strpos($vowels, $s[$i]) !== false) {
                return true;
            }
        }
        return false;
    }
}
<?php

class Solution {

    /**
     * @param String $s
     * @param String $goal
     * @return Boolean
     */
    function rotateString($s, $goal) {
        // Check if lengths are equal; if not, return false
        if (strlen($s) !== strlen($goal)) {
            return false;
        }

        // Concatenate s with itself
        $doubleS = $s . $s;

        // Check if goal is a substring of doubleS
        return strpos($doubleS, $goal) !== false;
    }
}
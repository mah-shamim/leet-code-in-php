<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function makeFancyString($s) {
        $result = "";
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            // Check if last two characters in the result are the same as current character
            if ($i > 1 && $s[$i] == $result[strlen($result) - 1] && $s[$i] == $result[strlen($result) - 2]) {
                continue; // Skip adding the character if it makes three consecutive
            }

            $result .= $s[$i]; // Add character to result
        }

        return $result;
    }
}
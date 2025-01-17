<?php

class Solution {

    /**
     * @param String $word
     * @return String
     */
    function compressedString($word) {
        $comp = "";
        $i = 0;
        $n = strlen($word);

        while ($i < $n) {
            $char = $word[$i];
            $count = 0;

            // Count the number of consecutive characters, but not more than 9
            while ($i < $n && $word[$i] == $char && $count < 9) {
                $count++;
                $i++;
            }

            // Append the count and character to the compressed string
            $comp .= $count . $char;
        }

        return $comp;
    }
}
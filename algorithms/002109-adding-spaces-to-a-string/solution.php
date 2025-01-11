<?php

class Solution {

    /**
     * @param String $s
     * @param Integer[] $spaces
     * @return String
     */
    function addSpaces($s, $spaces) {
        $result = ""; // Initialize the resulting string
        $spaceIndex = 0; // Pointer for the spaces array
        $n = strlen($s); // Length of the string
        $spacesCount = count($spaces); // Number of spaces to add

        for ($i = 0; $i < $n; $i++) {
            // If the current index matches the space index, add a space
            if ($spaceIndex < $spacesCount && $i == $spaces[$spaceIndex]) {
                $result .= " ";
                $spaceIndex++;
            }
            // Append the current character to the result
            $result .= $s[$i];
        }

        return $result;
    }
}
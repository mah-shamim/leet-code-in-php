<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function minimumPushes($word) {
        // Step 1: Count the frequency of each character
        $frequency = array();
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($frequency[$char])) {
                $frequency[$char] = 0;
            }
            $frequency[$char]++;
        }

        // Step 2: Sort the characters by frequency in descending order
        arsort($frequency);

        // Step 3: Assign characters to keys
        $pushes = 0;
        $position = 0;
        foreach ($frequency as $char => $count) {
            // Determine the number of pushes for the current character
            $pushesForChar = (int)($position / 8) + 1;
            $pushes += $pushesForChar * $count;
            $position++;
        }

        return $pushes;

    }
}
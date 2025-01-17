<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Boolean
     */
    function canConstruct($s, $k) {
        // Step 1: If the length of s is less than k, return false
        if (strlen($s) < $k) {
            return false;
        }

        // Step 2: Count the frequency of each character
        $freq = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (isset($freq[$char])) {
                $freq[$char]++;
            } else {
                $freq[$char] = 1;
            }
        }

        // Step 3: Count how many characters have an odd frequency
        $oddCount = 0;
        foreach ($freq as $count) {
            if ($count % 2 != 0) {
                $oddCount++;
            }
        }

        // Step 4: If oddCount is greater than k, return false
        if ($oddCount > $k) {
            return false;
        }

        // Step 5: Otherwise, return true
        return true;
    }
}
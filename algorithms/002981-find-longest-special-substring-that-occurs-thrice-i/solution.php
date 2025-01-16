<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maximumLength($s) {
        $n = strlen($s);

        // Iterate over substring lengths from longest to shortest
        for ($len = $n; $len >= 1; $len--) {
            $countMap = [];

            // Sliding window to collect substrings of length $len
            for ($i = 0; $i <= $n - $len; $i++) {
                $substring = substr($s, $i, $len);

                // Count the occurrences of each substring
                if (!isset($countMap[$substring])) {
                    $countMap[$substring] = 0;
                }
                $countMap[$substring]++;
            }

            // Check if any special substring occurs at least 3 times
            foreach ($countMap as $substring => $count) {
                if ($count >= 3 && $this->isSpecial($substring)) {
                    return $len; // Return the length of the substring
                }
            }
        }

        // If no special substring occurs at least 3 times
        return -1;
    }

    /**
     * Helper function to check if a substring is special
     *
     * @param $substring
     * @return bool
     */
    function isSpecial($substring) {
        $char = $substring[0];
        for ($i = 1; $i < strlen($substring); $i++) {
            if ($substring[$i] !== $char) {
                return false;
            }
        }
        return true;
    }
}
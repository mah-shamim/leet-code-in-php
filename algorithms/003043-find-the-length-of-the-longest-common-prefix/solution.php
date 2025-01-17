<?php

class Solution {

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer
     */
    function longestCommonPrefix($arr1, $arr2) {
        $prefixSet = [];

        // Step 1: Generate all prefixes for elements in arr1 and store them in a HashSet
        foreach ($arr1 as $num) {
            $str = (string)$num; // Convert to string to extract prefixes
            for ($i = 1; $i <= strlen($str); $i++) {
                $prefixSet[substr($str, 0, $i)] = true; // Store the prefix in the HashSet
            }
        }

        $maxLength = 0;

        // Step 2: Check prefixes of elements in arr2 against the HashSet
        foreach ($arr2 as $num) {
            $str = (string)$num; // Convert to string to extract prefixes
            for ($i = 1; $i <= strlen($str); $i++) {
                $prefix = substr($str, 0, $i); // Get the current prefix
                if (isset($prefixSet[$prefix])) {
                    // If the prefix exists in arr1, update the maxLength
                    $maxLength = max($maxLength, strlen($prefix));
                }
            }
        }

        return $maxLength; // Return the length of the longest common prefix
    }
}
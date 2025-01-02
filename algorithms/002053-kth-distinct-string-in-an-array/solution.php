<?php

class Solution {

    /**
     * @param String[] $arr
     * @param Integer $k
     * @return String
     */
    function kthDistinct($arr, $k) {
        // Step 1: Create a frequency map
        $frequency = array();
        foreach ($arr as $string) {
            if (isset($frequency[$string])) {
                $frequency[$string]++;
            } else {
                $frequency[$string] = 1;
            }
        }

        // Step 2: Collect distinct strings in the order they appear
        $distinctStrings = array();
        foreach ($arr as $string) {
            if ($frequency[$string] == 1) {
                $distinctStrings[] = $string;
            }
        }

        // Step 3: Return the k-th distinct string if it exists, otherwise return an empty string
        if (count($distinctStrings) >= $k) {
            return $distinctStrings[$k - 1];
        } else {
            return "";
        }

    }
}
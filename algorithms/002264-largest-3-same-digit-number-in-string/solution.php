<?php

class Solution {

    /**
     * @param String $num
     * @return String
     */
    function largestGoodInteger($num) {
        for ($digit = 9; $digit >= 0; $digit--) {
            $candidate = str_repeat((string)$digit, 3);
            if (strpos($num, $candidate) !== false || strpos($num, $candidate) === 0) {
                return $candidate;
            }
        }
        return "";
    }
}
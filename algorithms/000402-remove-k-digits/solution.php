<?php

class Solution {

    /**
     * @param String $num
     * @param Integer $k
     * @return String
     */
    function removeKdigits($num, $k) {
        $stack = [];
        $len = strlen($num);

        for ($i = 0; $i < $len; $i++) {
            $digit = $num[$i];

            // Remove digits from the stack if the current digit is smaller and we still have digits to remove
            while ($k > 0 && !empty($stack) && end($stack) > $digit) {
                array_pop($stack);
                $k--;
            }

            // Push the current digit onto the stack
            $stack[] = $digit;
        }

        // If we still have digits to remove, remove them from the end
        while ($k > 0) {
            array_pop($stack);
            $k--;
        }

        // Build the final result, removing leading zeros
        $result = ltrim(implode('', $stack), '0');

        // Return "0" if the result is empty
        return $result === '' ? '0' : $result;

    }
}
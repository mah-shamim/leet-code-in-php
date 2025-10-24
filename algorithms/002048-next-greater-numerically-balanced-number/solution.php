<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function nextBeautifulNumber($n) {
        // Try numbers starting from n+1 until we find a balanced one
        $candidate = $n + 1;
        while (true) {
            if ($this->isBalanced($candidate)) {
                return $candidate;
            }
            $candidate++;
        }
    }


    /**
     * Check if a number is numerically balanced
     *
     * @param $num
     * @return bool
     */
    function isBalanced($num) {
        $digitCount = array_fill(0, 10, 0);
        $temp = $num;

        // Count occurrences of each digit
        while ($temp > 0) {
            $digit = $temp % 10;
            $digitCount[$digit]++;
            $temp = (int)($temp / 10);
        }

        // Check if each digit d appears exactly d times
        // Note: digit 0 should appear 0 times
        for ($d = 0; $d <= 9; $d++) {
            if ($digitCount[$d] > 0 && $digitCount[$d] != $d) {
                return false;
            }
        }

        return true;
    }
}
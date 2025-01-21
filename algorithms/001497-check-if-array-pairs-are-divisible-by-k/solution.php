<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Boolean
     */
    function canArrange($arr, $k) {
        $freq = array_fill(0, $k, 0);

        // Fill frequency array with counts of each remainder
        foreach ($arr as $num) {
            $remainder = ($num % $k + $k) % $k; // Handle negative numbers
            $freq[$remainder]++;
        }

        // Check pairing conditions
        for ($i = 1; $i < $k; $i++) {
            // If remainder i has more elements than remainder k-i, it's not possible to pair them
            if ($freq[$i] != $freq[$k - $i]) {
                return false;
            }
        }

        // Check for the special case of remainder 0
        if ($freq[0] % 2 != 0) {
            return false;
        }

        // If k is even, also check that elements with remainder k/2 are even
        if ($k % 2 == 0 && $freq[$k / 2] % 2 != 0) {
            return false;
        }

        return true;
    }
}
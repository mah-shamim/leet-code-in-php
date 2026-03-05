<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minOperations(string $s): int
    {
        $n = strlen($s);
        $start0 = 0; // changes needed if pattern starts with '0'
        $start1 = 0; // changes needed if pattern starts with '1'

        for ($i = 0; $i < $n; $i++) {
            // For pattern starting with '0': at even index should be '0', odd index '1'
            $expected0 = ($i % 2 == 0) ? '0' : '1';
            // For pattern starting with '1': at even index should be '1', odd index '0'
            $expected1 = ($i % 2 == 0) ? '1' : '0';

            if ($s[$i] != $expected0) {
                $start0++;
            }
            if ($s[$i] != $expected1) {
                $start1++;
            }
        }

        return min($start0, $start1);
    }
}
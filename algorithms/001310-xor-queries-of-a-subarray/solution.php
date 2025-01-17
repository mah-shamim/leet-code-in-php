<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function xorQueries($arr, $queries) {
        $n = count($arr);
        $prefix = array_fill(0, $n, 0);
        $prefix[0] = $arr[0];

        // Build the prefix XOR array
        for ($i = 1; $i < $n; $i++) {
            $prefix[$i] = $prefix[$i - 1] ^ $arr[$i];
        }

        $result = [];

        // Process each query
        foreach ($queries as $query) {
            list($left, $right) = $query;
            if ($left == 0) {
                $result[] = $prefix[$right];
            } else {
                $result[] = $prefix[$right] ^ $prefix[$left - 1];
            }
        }

        return $result;
    }
}
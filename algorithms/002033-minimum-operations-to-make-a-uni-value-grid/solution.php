<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $x
     * @return Integer
     */
    function minOperations($grid, $x) {
        $arr = array();
        // Efficiently flatten the grid using element-by-element pushing
        foreach ($grid as $row) {
            foreach ($row as $num) {
                $arr[] = $num;
            }
        }
        if (empty($arr)) {
            return 0;
        }

        // Check if all elements can reach the same value
        $base = $arr[0];
        foreach ($arr as $num) {
            if (($num - $base) % $x !== 0) {
                return -1;
            }
        }

        // Find median using optimized sorting
        sort($arr);
        $median = $arr[(int)(count($arr) / 2)];

        // Calculate total operations
        $total = 0;
        foreach ($arr as $num) {
            $total += abs($num - $median) / $x;
        }

        return $total;
    }
}
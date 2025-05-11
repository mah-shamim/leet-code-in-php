<?php

class Solution {

    /**
     * @param String $blocks
     * @param Integer $k
     * @return Integer
     */
    function minimumRecolors($blocks, $k) {
        $n = strlen($blocks);
        $min_ops = $k; // Initialize with maximum possible value (all W's)
        for ($i = 0; $i <= $n - $k; $i++) {
            $current = substr($blocks, $i, $k);
            $count = substr_count($current, 'W');
            if ($count < $min_ops) {
                $min_ops = $count;
            }
        }
        return $min_ops;
    }
}
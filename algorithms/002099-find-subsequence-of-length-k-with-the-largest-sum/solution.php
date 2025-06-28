<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSubsequence($nums, $k) {
        $pairs = [];
        $n = count($nums);
        for ($i = 0; $i < $n; $i++) {
            $pairs[] = [$i, $nums[$i]];
        }

        usort($pairs, function($a, $b) {
            return $b[1] - $a[1];
        });

        $selected = array_slice($pairs, 0, $k);

        usort($selected, function($a, $b) {
            return $a[0] - $b[0];
        });

        $result = [];
        foreach ($selected as $pair) {
            $result[] = $pair[1];
        }

        return $result;
    }
}
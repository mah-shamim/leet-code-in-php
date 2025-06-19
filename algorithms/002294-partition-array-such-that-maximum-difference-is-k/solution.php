<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function partitionArray($nums, $k) {
        sort($nums);
        $n = count($nums);
        $count = 0;
        $i = 0;
        while ($i < $n) {
            $count++;
            $start = $nums[$i];
            while ($i < $n && $nums[$i] - $start <= $k) {
                $i++;
            }
        }
        return $count;
    }
}
<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function triangleNumber($nums) {
        sort($nums);
        $count = 0;
        $n = count($nums);
        for ($k = $n - 1; $k >= 2; $k--) {
            $i = 0;
            $j = $k - 1;
            while ($i < $j) {
                if ($nums[$i] + $nums[$j] > $nums[$k]) {
                    $count += $j - $i;
                    $j--;
                } else {
                    $i++;
                }
            }
        }
        return $count;
    }
}
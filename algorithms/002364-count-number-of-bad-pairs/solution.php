<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countBadPairs($nums) {
        $n = count($nums);
        $total = $n * ($n - 1) / 2;
        $freq = array();
        foreach ($nums as $i => $num) {
            $key = $num - $i;
            if (!isset($freq[$key])) {
                $freq[$key] = 0;
            }
            $freq[$key]++;
        }
        $good = 0;
        foreach ($freq as $count) {
            if ($count >= 2) {
                $good += $count * ($count - 1) / 2;
            }
        }
        return $total - $good;
    }
}
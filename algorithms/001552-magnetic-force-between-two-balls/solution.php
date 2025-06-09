<?php

class Solution {

    /**
     * @param Integer[] $position
     * @param Integer $m
     * @return Integer
     */
    function maxDistance($position, $m) {
        sort($position);
        $n = count($position);
        $low = 0;
        $high = $position[$n - 1] - $position[0];
        $ans = 0;

        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);
            if ($this->canPlaceBalls($position, $m, $mid)) {
                $ans = $mid;
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }
        return $ans;
    }

    /**
     * @param $arr
     * @param $m
     * @param $d
     * @return bool
     */
    private function canPlaceBalls($arr, $m, $d) {
        $count = 1;
        $last = $arr[0];
        $length = count($arr);
        for ($i = 1; $i < $length; $i++) {
            if ($arr[$i] - $last >= $d) {
                $count++;
                $last = $arr[$i];
                if ($count >= $m) {
                    return true;
                }
            }
        }
        return $count >= $m;
    }
}
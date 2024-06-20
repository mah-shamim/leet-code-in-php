<?php

class Solution {

    /**
     * @param Integer[] $position
     * @param Integer $m
     * @return Integer
     */
    function maxDistance($position, $m) {
        sort($position);
        $left = 1;
        $right = $position[count($position) - 1];
        while ($left < $right) {
            $mid = ($left + $right + 1) >> 1;
            if ($this->check($position, $mid, $m)) {
                $left = $mid;
            } else {
                $right = $mid - 1;
            }
        }
        return $left;
    }

    public function check($position, $f, $m) {
        $prev = $position[0];
        $cnt = 1;
        for ($i = 1; $i < count($position); ++$i) {
            $curr = $position[$i];
            if ($curr - $prev >= $f) {
                $prev = $curr;
                ++$cnt;
            }
        }
        return $cnt >= $m;
    }
}
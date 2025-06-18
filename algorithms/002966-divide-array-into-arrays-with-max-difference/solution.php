<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[][]
     */
    function divideArray($nums, $k) {
        sort($nums);
        $n = count($nums);
        $result = array();
        for ($i = 0; $i < $n; $i += 3) {
            if ($i + 2 >= $n) {
                break;
            }
            if ($nums[$i + 2] - $nums[$i] > $k) {
                return array();
            }
            $result[] = array($nums[$i], $nums[$i + 1], $nums[$i + 2]);
        }
        return $result;
    }
}
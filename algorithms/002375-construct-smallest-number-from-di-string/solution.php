<?php

class Solution {

    /**
     * @param String $pattern
     * @return String
     */
    function smallestNumber($pattern) {
        $n = strlen($pattern);
        $result = range(1, $n + 1);
        $i = 0;
        while ($i < $n) {
            if ($pattern[$i] == 'D') {
                $j = $i;
                while ($j < $n && $pattern[$j] == 'D') {
                    $j++;
                }
                $m = $j - $i;
                $start = $i;
                $end = $i + $m;
                $this->reverseSubarray($result, $start, $end);
                $i = $j;
            } else {
                $i++;
            }
        }
        return implode('', $result);
    }

    /**
     * @param $arr
     * @param $start
     * @param $end
     * @return void
     */
    function reverseSubarray(&$arr, $start, $end) {
        while ($start < $end) {
            $temp = $arr[$start];
            $arr[$start] = $arr[$end];
            $arr[$end] = $temp;
            $start++;
            $end--;
        }
    }
}
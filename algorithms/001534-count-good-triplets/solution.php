<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return Integer
     */
    function countGoodTriplets($arr, $a, $b, $c) {
        $count = 0;
        $n = count($arr);
        for ($i = 0; $i < $n - 2; $i++) {
            for ($j = $i + 1; $j < $n - 1; $j++) {
                $diff_ij = abs($arr[$i] - $arr[$j]);
                if ($diff_ij > $a) {
                    continue;
                }
                for ($k = $j + 1; $k < $n; $k++) {
                    $diff_jk = abs($arr[$j] - $arr[$k]);
                    if ($diff_jk > $b) {
                        continue;
                    }
                    $diff_ik = abs($arr[$i] - $arr[$k]);
                    if ($diff_ik <= $c) {
                        $count++;
                    }
                }
            }
        }
        return $count;
    }
}
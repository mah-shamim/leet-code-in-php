<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $m
     * @return Integer
     */
    function flowerGame($n, $m) {
        $even_n = (int)($n / 2);
        $odd_n = $n - $even_n;
        $even_m = (int)($m / 2);
        $odd_m = $m - $even_m;
        return $even_n * $odd_m + $odd_n * $even_m;
    }
}
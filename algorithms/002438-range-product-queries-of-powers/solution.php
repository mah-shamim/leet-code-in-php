<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function productQueries($n, $queries) {
        $mod = 1000000007;
        $powers = [];
        $current = 1;
        $temp = $n;
        while ($temp) {
            if ($temp & 1) {
                $powers[] = $current;
            }
            $temp = $temp >> 1;
            $current *= 2;
        }

        $ans = [];
        foreach ($queries as $q) {
            $l = $q[0];
            $r = $q[1];
            $product = 1;
            for ($i = $l; $i <= $r; $i++) {
                $product = ($product * $powers[$i]) % $mod;
            }
            $ans[] = $product;
        }
        return $ans;
    }
}
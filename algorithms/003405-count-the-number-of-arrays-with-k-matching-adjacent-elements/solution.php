<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $m
     * @param Integer $k
     * @return Integer
     */
    function countGoodArrays($n, $m, $k) {
        $MOD = 1000000007;
        $total_adjacent = $n - 1;

        if ($k > $total_adjacent) {
            return 0;
        }

        $fact = array();
        $fact[0] = 1;
        for ($i = 1; $i <= $total_adjacent; $i++) {
            $fact[$i] = ($fact[$i-1] * $i) % $MOD;
        }

        $denom = ($fact[$k] * $fact[$total_adjacent - $k]) % $MOD;
        $inv_denom = $this->mod_pow($denom, $MOD-2, $MOD);
        $binom = ($fact[$total_adjacent] * $inv_denom) % $MOD;

        $exponent = $total_adjacent - $k;
        $base_val = $m - 1;
        $power = $this->mod_pow($base_val, $exponent, $MOD);

        $result = (($m % $MOD) * $binom) % $MOD;
        $result = ($result * $power) % $MOD;

        return $result;
    }

    /**
     * Modular exponentiation
     *
     * @param $base
     * @param $exponent
     * @param $mod
     * @return int
     */
    function mod_pow($base, $exponent, $mod) {
        if ($mod == 1) {
            return 0;
        }
        $result = 1;
        $base = $base % $mod;
        while ($exponent > 0) {
            if ($exponent & 1) {
                $result = ($result * $base) % $mod;
            }
            $base = ($base * $base) % $mod;
            $exponent = $exponent >> 1;
        }
        return $result;
    }
}
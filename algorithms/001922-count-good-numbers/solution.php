<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function countGoodNumbers($n) {
        $mod = 1000000007;
        $even_count = (int)(($n + 1) / 2);
        $odd_count = (int)($n / 2);

        $even_power = $this->pow_mod(5, $even_count, $mod);
        $odd_power = $this->pow_mod(4, $odd_count, $mod);

        return (int)(($even_power * $odd_power) % $mod);
    }

    /**
     * @param $base
     * @param $exponent
     * @param $mod
     * @return int
     */
    function pow_mod($base, $exponent, $mod) {
        $result = 1;
        $base = $base % $mod;
        while ($exponent > 0) {
            if ($exponent % 2 == 1) {
                $result = ($result * $base) % $mod;
            }
            $base = ($base * $base) % $mod;
            $exponent = (int)($exponent / 2);
        }
        return $result;
    }
}
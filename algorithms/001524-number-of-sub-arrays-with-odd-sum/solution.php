<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function numOfSubarrays($arr) {
        $mod = 1000000007;
        $even = 1; // starts with prefix sum 0 (even)
        $odd = 0;
        $result = 0;
        $current_parity = 0; // initial prefix sum is 0 (even)

        foreach ($arr as $num) {
            $current_parity = ($current_parity + $num) % 2;
            if ($current_parity == 1) {
                $result = ($result + $even) % $mod;
            } else {
                $result = ($result + $odd) % $mod;
            }
            if ($current_parity == 1) {
                $odd++;
            } else {
                $even++;
            }
        }

        return $result % $mod;
    }
}
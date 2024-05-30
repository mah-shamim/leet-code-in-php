<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function countTriplets($arr) {
        $ans = 0;
        $xors = [0];
        $prefix = 0;

        foreach ($arr as $key => $a) {
            $prefix ^= $a;
            $xors[] = $prefix;
        }

        for ($j = 1; $j < count($arr); $j++) {
            for ($i = 0; $i < $j; $i++) {
                $xors_i = $xors[$j] ^ $xors[$i];
                for ($k = $j; $k < count($arr); $k++) {
                    $xors_k = $xors[$k + 1] ^ $xors[$j];
                    if ($xors_i == $xors_k) {
                        $ans += 1;
                    }
                }
            }
        }

        return $ans;
    }
}

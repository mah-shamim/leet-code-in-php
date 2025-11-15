<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numberOfSubstrings($s) {
        $n = strlen($s);
        $pre0 = array_fill(0, $n + 1, 0);
        $zeros = [];
        for ($i = 0; $i < $n; $i++) {
            $pre0[$i + 1] = $pre0[$i] + ($s[$i] == '0' ? 1 : 0);
            if ($s[$i] == '0') {
                $zeros[] = $i;
            }
        }
        $totalZeros = count($zeros);
        $count = 0;
        for ($l = 0; $l < $n; $l++) {
            $idx0 = $pre0[$l];
            if ($idx0 < $totalZeros) {
                $firstZero = $zeros[$idx0];
            } else {
                $firstZero = $n;
            }
            $count += ($firstZero - $l);

            for ($k = 1; $k <= 200; $k++) {
                if ($idx0 + $k - 1 >= $totalZeros) {
                    break;
                }
                $p = $zeros[$idx0 + $k - 1];
                if ($idx0 + $k < $totalZeros) {
                    $q = $zeros[$idx0 + $k];
                } else {
                    $q = $n;
                }
                $rMinValid = $l + $k * $k + $k - 1;
                if ($rMinValid < $p) {
                    $startR = $p;
                } else {
                    $startR = $rMinValid;
                }
                if ($startR < $q) {
                    $count += ($q - $startR);
                }
            }
        }
        return $count;
    }
}
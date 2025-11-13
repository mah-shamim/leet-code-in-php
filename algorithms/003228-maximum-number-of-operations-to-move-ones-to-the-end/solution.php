<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxOperations($s) {
        $n = strlen($s);
        $positions = [];
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] == '1') {
                $positions[] = $i;
            }
        }
        $k = count($positions);
        if ($k == 0) {
            return 0;
        }
        $d = array_fill(0, $k, 0);
        for ($i = 0; $i < $k - 1; $i++) {
            $d[$i] = $positions[$i+1] - $positions[$i] - 1;
        }
        $d[$k-1] = $n - $positions[$k-1] - 1;
        $m = array_fill(0, $k, 0);
        $m[$k-1] = min($d[$k-1], 1);
        for ($i = $k - 2; $i >= 0; $i--) {
            $m[$i] = min($d[$i], 1) + $m[$i+1];
        }
        return array_sum($m);
    }
}
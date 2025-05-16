<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numberOfSubstrings($s) {
        $last_a = -1;
        $last_b = -1;
        $last_c = -1;
        $total = 0;
        $n = strlen($s);
        for ($j = 0; $j < $n; $j++) {
            $char = $s[$j];
            if ($char == 'a') {
                $last_a = $j;
            } elseif ($char == 'b') {
                $last_b = $j;
            } else {
                $last_c = $j;
            }
            if ($last_a != -1 && $last_b != -1 && $last_c != -1) {
                $min_last = min($last_a, $last_b, $last_c);
                $total += ($min_last + 1);
            }
        }
        return $total;
    }
}
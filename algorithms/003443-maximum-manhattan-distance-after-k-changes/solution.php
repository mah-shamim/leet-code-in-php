<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxDistance($s, $k) {
        $x = 0;
        $y = 0;
        $ans = 0;
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            $char = $s[$i];
            if ($char == 'N') {
                $y++;
            } elseif ($char == 'S') {
                $y--;
            } elseif ($char == 'E') {
                $x++;
            } elseif ($char == 'W') {
                $x--;
            }

            $current = abs($x) + abs($y);
            $c = min($i + 1, $k);
            $candidate = $current + 2 * $c;
            $best_at_i = min($i + 1, $candidate);

            if ($best_at_i > $ans) {
                $ans = $best_at_i;
            }
        }

        return $ans;
    }
}
<?php

class Solution {

    /**
     * @param Integer[][] $queries
     * @return Integer
     */
    function minOperations($queries) {
        $bounds = [];
        $low = 1;
        for ($k = 1; $k <= 16; $k++) {
            $high = $low * 4 - 1;
            $bounds[] = ['low' => $low, 'high' => $high, 'k' => $k];
            $low = $high + 1;
        }

        $total_ans = 0;
        foreach ($queries as $q) {
            $l = $q[0];
            $r = $q[1];
            $S = 0;
            $M = 0;
            foreach ($bounds as $b) {
                $low_b = $b['low'];
                $high_b = $b['high'];
                $k_val = $b['k'];
                if ($low_b > $r) {
                    break;
                }
                if ($high_b < $l) {
                    continue;
                }
                $A = max($l, $low_b);
                $B = min($r, $high_b);
                if ($A <= $B) {
                    $count = $B - $A + 1;
                    $S += $count * $k_val;
                    if ($k_val > $M) {
                        $M = $k_val;
                    }
                }
            }
            $ops = max( (int)ceil($S / 2), $M );
            $total_ans += $ops;
        }
        return $total_ans;
    }
}
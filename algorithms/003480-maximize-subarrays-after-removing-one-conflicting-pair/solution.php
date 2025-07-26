<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $conflictingPairs
     * @return Integer
     */
    function maxSubarrays($n, $conflictingPairs) {
        $normalizedPairs = [];
        $mult = [];
        foreach ($conflictingPairs as $pair) {
            sort($pair);
            $normalizedPairs[] = $pair;
            $key = $pair[0] . "," . $pair[1];
            if (!isset($mult[$key])) {
                $mult[$key] = 1;
            } else {
                $mult[$key]++;
            }
        }

        $b_lists = array_fill(1, $n, []);
        foreach ($normalizedPairs as $pair) {
            $a0 = $pair[0];
            $b0 = $pair[1];
            if ($a0 <= $n) {
                $b_lists[$a0][] = $b0;
            }
        }

        $min1_arr = array_fill(0, $n+1, $n+1);
        $min2_arr = array_fill(0, $n+1, $n+1);
        $freq_min1_arr = array_fill(0, $n+1, 0);

        for ($a0 = 1; $a0 <= $n; $a0++) {
            if (empty($b_lists[$a0])) {
                $min1_arr[$a0] = $n+1;
                $min2_arr[$a0] = $n+1;
                $freq_min1_arr[$a0] = 0;
            } else {
                $freq = array_count_values($b_lists[$a0]);
                $distinct = array_unique($b_lists[$a0]);
                sort($distinct);
                $min1_arr[$a0] = $distinct[0];
                $min2_arr[$a0] = count($distinct) > 1 ? $distinct[1] : $n+1;
                $freq_min1_arr[$a0] = $freq[$distinct[0]];
            }
        }

        $minB_self = array_fill(0, $n+2, $n+1);
        for ($a0 = 1; $a0 <= $n; $a0++) {
            $minB_self[$a0] = $min1_arr[$a0];
        }

        $minB0 = array_fill(0, $n+3, $n+1);
        for ($i = $n; $i >= 1; $i--) {
            $minB0[$i] = min($minB0[$i+1], $minB_self[$i]);
        }

        $total_base = 0;
        for ($i = 1; $i <= $n; $i++) {
            $total_base += $minB0[$i] - $i;
        }

        $best_increase = 0;

        foreach ($conflictingPairs as $pair) {
            $a0 = min($pair[0], $pair[1]);
            $b0 = max($pair[0], $pair[1]);
            $key = $a0 . "," . $b0;
            $multiplicity = isset($mult[$key]) ? $mult[$key] : 0;

            if ($multiplicity == 1) {
                if ($b0 == $min1_arr[$a0]) {
                    if ($freq_min1_arr[$a0] == 1) {
                        $x = $min2_arr[$a0];
                    } else {
                        $x = $min1_arr[$a0];
                    }
                } else {
                    $x = $min1_arr[$a0];
                }

                $new_val = min($minB0[$a0+1], $x);
                $change = 0;
                if ($new_val != $minB0[$a0]) {
                    $change = $new_val - $minB0[$a0];
                    $current = $new_val;
                    $i_index = $a0 - 1;
                    while ($i_index >= 1) {
                        $next_val = min($current, $minB_self[$i_index]);
                        if ($next_val == $minB0[$i_index]) {
                            break;
                        }
                        $change += $next_val - $minB0[$i_index];
                        $current = $next_val;
                        $i_index--;
                    }
                }

                if ($change > $best_increase) {
                    $best_increase = $change;
                }
            }
        }

        return $total_base + $best_increase;
    }
}
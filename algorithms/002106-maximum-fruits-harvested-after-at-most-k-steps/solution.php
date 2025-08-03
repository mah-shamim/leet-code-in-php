<?php

class Solution {

    /**
     * @param Integer[][] $fruits
     * @param Integer $startPos
     * @param Integer $k
     * @return Integer
     */
    function maxTotalFruits($fruits, $startPos, $k) {
        $n = count($fruits);
        if ($n == 0) return 0;

        $positions = array_column($fruits, 0);
        $amounts = array_column($fruits, 1);

        $prefix = [0];
        for ($i = 0; $i < $n; $i++) {
            $prefix[$i+1] = $prefix[$i] + $amounts[$i];
        }

        $j0 = -1;
        $low = 0;
        $high = $n - 1;
        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            if ($positions[$mid] <= $startPos) {
                $j0 = $mid;
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        $j1 = -1;
        $low = 0;
        $high = $n - 1;
        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            if ($positions[$mid] >= $startPos) {
                $j1 = $mid;
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }
        if ($j1 == -1) {
            $j1 = $n;
        }

        $ans = 0;

        if ($j0 >= 0) {
            for ($i = 0; $i <= $j0; $i++) {
                $steps = $startPos - $positions[$i];
                if ($steps <= $k) {
                    $total = $prefix[$j0 + 1] - $prefix[$i];
                    if ($total > $ans) {
                        $ans = $total;
                    }
                }
            }
        }

        if ($j1 < $n) {
            for ($i = $j1; $i < $n; $i++) {
                $steps = $positions[$i] - $startPos;
                if ($steps <= $k) {
                    $total = $prefix[$i + 1] - $prefix[$j1];
                    if ($total > $ans) {
                        $ans = $total;
                    }
                }
            }
        }

        if ($j0 >= 0) {
            for ($i = 0; $i <= $j0; $i++) {
                $max_r = $k - $startPos + 2 * $positions[$i];
                if ($max_r < $startPos) {
                    continue;
                }
                $low_bound = 0;
                $high_bound = $n - 1;
                $r_index = -1;
                $low = 0;
                $high = $n - 1;
                while ($low <= $high) {
                    $mid = intdiv($low + $high, 2);
                    if ($positions[$mid] <= $max_r) {
                        $r_index = $mid;
                        $low = $mid + 1;
                    } else {
                        $high = $mid - 1;
                    }
                }
                if ($r_index == -1) {
                    continue;
                }
                $total = $prefix[$r_index + 1] - $prefix[$i];
                if ($total > $ans) {
                    $ans = $total;
                }
            }
        }

        if ($j1 < $n) {
            for ($i = $j1; $i < $n; $i++) {
                $min_l = 2 * $positions[$i] - $k - $startPos;
                $low_bound = 0;
                $high_bound = $i;
                $l_index = -1;
                $low = 0;
                $high = $i;
                while ($low <= $high) {
                    $mid = intdiv($low + $high, 2);
                    if ($positions[$mid] >= $min_l) {
                        $l_index = $mid;
                        $high = $mid - 1;
                    } else {
                        $low = $mid + 1;
                    }
                }
                if ($l_index == -1) {
                    continue;
                }
                $total = $prefix[$i + 1] - $prefix[$l_index];
                if ($total > $ans) {
                    $ans = $total;
                }
            }
        }

        return $ans;
    }
}
<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxTotalValue(array $nums, int $k): int
    {
        $n = count($nums);

        // Build Sparse Table for max
        $log = array_fill(0, $n + 1, 0);
        for ($i = 2; $i <= $n; $i++) {
            $log[$i] = $log[$i >> 1] + 1;
        }

        $st_max = array_fill(0, $n, array_fill(0, $log[$n] + 1, 0));
        $st_min = array_fill(0, $n, array_fill(0, $log[$n] + 1, 0));
        for ($i = 0; $i < $n; $i++) {
            $st_max[$i][0] = $nums[$i];
            $st_min[$i][0] = $nums[$i];
        }

        for ($j = 1; (1 << $j) <= $n; $j++) {
            for ($i = 0; $i + (1 << $j) - 1 < $n; $i++) {
                $st_max[$i][$j] = max($st_max[$i][$j - 1], $st_max[$i + (1 << ($j - 1))][$j - 1]);
                $st_min[$i][$j] = min($st_min[$i][$j - 1], $st_min[$i + (1 << ($j - 1))][$j - 1]);
            }
        }

        $rangeMax = function($l, $r) use ($st_max, $log) {
            $j = $log[$r - $l + 1];
            return max($st_max[$l][$j], $st_max[$r - (1 << $j) + 1][$j]);
        };
        $rangeMin = function($l, $r) use ($st_min, $log) {
            $j = $log[$r - $l + 1];
            return min($st_min[$l][$j], $st_min[$r - (1 << $j) + 1][$j]);
        };
        $value = function($l, $r) use ($rangeMax, $rangeMin) {
            return $rangeMax($l, $r) - $rangeMin($l, $r);
        };

        // Max heap in PHP: store [-value, l, r] so the smallest (-value) is actually largest value
        $heap = new SplMaxHeap();
        for ($l = 0; $l < $n; $l++) {
            $heap->insert([$value($l, $n - 1), $l, $n - 1]);
        }

        $total = 0;
        for ($i = 0; $i < $k; $i++) {
            if ($heap->isEmpty()) break;
            $top = $heap->extract();
            $val = $top[0];
            $l = $top[1];
            $r = $top[2];
            $total += $val;

            if ($r > $l) {
                $heap->insert([$value($l, $r - 1), $l, $r - 1]);
            }
        }

        return $total;
    }
}
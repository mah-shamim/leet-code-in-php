<?php

class Solution {

    /**
     * @param Integer[] $fruits
     * @param Integer[] $baskets
     * @return Integer
     */
    function numOfUnplacedFruits($fruits, $baskets) {
        $n = count($fruits);
        if ($n == 0) return 0;

        $baskets_arr = [];
        for ($i = 0; $i < $n; $i++) {
            $baskets_arr[] = [$baskets[$i], $i];
        }

        usort($baskets_arr, function($a, $b) {
            if ($a[0] != $b[0]) {
                return $a[0] - $b[0];
            }
            return $a[1] - $b[1];
        });

        $arr = array_fill(0, $n, 0);
        $pos_in_sorted = array_fill(0, $n, 0);
        for ($j = 0; $j < $n; $j++) {
            $original_index = $baskets_arr[$j][1];
            $arr[$j] = $original_index;
            $pos_in_sorted[$original_index] = $j;
        }

        $N = $n;
        $tree = array_fill(0, 2 * $N, PHP_INT_MAX);
        for ($i = 0; $i < $n; $i++) {
            $tree[$N + $i] = $arr[$i];
        }
        for ($i = $N - 1; $i >= 1; $i--) {
            $tree[$i] = min($tree[2 * $i], $tree[2 * $i + 1]);
        }

        $query_tree = function($l, $r) use (&$tree, $N) {
            $res = PHP_INT_MAX;
            $l += $N;
            $r += $N;
            while ($l <= $r) {
                if ($l % 2 == 1) {
                    $res = min($res, $tree[$l]);
                    $l++;
                }
                if ($r % 2 == 0) {
                    $res = min($res, $tree[$r]);
                    $r--;
                }
                $l = $l >> 1;
                $r = $r >> 1;
            }
            return $res;
        };

        $update_tree = function($pos, $value) use (&$tree, $N) {
            $p = $N + $pos;
            $tree[$p] = $value;
            while ($p > 1) {
                $p = $p >> 1;
                $tree[$p] = min($tree[2 * $p], $tree[2 * $p + 1]);
            }
        };

        $unplaced = 0;
        $INF = PHP_INT_MAX;

        foreach ($fruits as $fruit) {
            $low = 0;
            $high = $n - 1;
            $j0 = $n;
            while ($low <= $high) {
                $mid = (int)(($low + $high) / 2);
                if ($baskets_arr[$mid][0] >= $fruit) {
                    $j0 = $mid;
                    $high = $mid - 1;
                } else {
                    $low = $mid + 1;
                }
            }

            if ($j0 == $n) {
                $unplaced++;
                continue;
            }

            $min_original_index = $query_tree($j0, $n - 1);
            if ($min_original_index == $INF) {
                $unplaced++;
                continue;
            }

            $j_pos = $pos_in_sorted[$min_original_index];
            $update_tree($j_pos, $INF);
        }

        return $unplaced;
    }
}
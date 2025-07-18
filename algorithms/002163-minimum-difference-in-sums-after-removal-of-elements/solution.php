<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumDifference($nums) {
        $total = count($nums);
        $n = $total / 3;

        $left = array();
        $right = array();

        $maxHeap = new SplMaxHeap();
        $left_sum = 0;
        for ($i = 0; $i < $n; $i++) {
            $left_sum += $nums[$i];
            $maxHeap->insert($nums[$i]);
        }
        $left[$n] = $left_sum;

        for ($k = $n + 1; $k <= 2 * $n; $k++) {
            $num = $nums[$k - 1];
            $maxHeap->insert($num);
            $left_sum += $num;
            $pop = $maxHeap->extract();
            $left_sum -= $pop;
            $left[$k] = $left_sum;
        }

        $minHeap = new SplMinHeap();
        $right_sum = 0;
        for ($i = 2 * $n; $i < 3 * $n; $i++) {
            $right_sum += $nums[$i];
            $minHeap->insert($nums[$i]);
        }
        $right[2 * $n] = $right_sum;

        for ($k = 2 * $n - 1; $k >= $n; $k--) {
            $num = $nums[$k];
            $minHeap->insert($num);
            $right_sum += $num;
            $pop = $minHeap->extract();
            $right_sum -= $pop;
            $right[$k] = $right_sum;
        }

        $ans = PHP_INT_MAX;
        for ($k = $n; $k <= 2 * $n; $k++) {
            $diff = $left[$k] - $right[$k];
            if ($diff < $ans) {
                $ans = $diff;
            }
        }

        return $ans;
    }
}
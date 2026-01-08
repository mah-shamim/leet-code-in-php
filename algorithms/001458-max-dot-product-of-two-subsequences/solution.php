<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function maxDotProduct(array $nums1, array $nums2): int
    {
        $m = count($nums1);
        $n = count($nums2);

        $prev = array_fill(0, $n + 1, PHP_INT_MIN);
        $curr = array_fill(0, $n + 1, PHP_INT_MIN);

        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                $product = $nums1[$i - 1] * $nums2[$j - 1];

                $curr[$j] = max(
                    $prev[$j - 1] + $product,
                    $product,
                    $prev[$j],
                    $curr[$j - 1]
                );
            }
            // Swap arrays for next iteration
            $temp = $prev;
            $prev = $curr;
            $curr = $temp;
            // Reset current row for next iteration
            $curr = array_fill(0, $n + 1, PHP_INT_MIN);
        }

        return $prev[$n];
    }
}
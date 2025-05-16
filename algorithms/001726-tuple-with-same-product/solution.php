<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function tupleSameProduct($nums) {
        $productCounts = array();
        $n = count($nums);
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $prod = $nums[$i] * $nums[$j];
                if (isset($productCounts[$prod])) {
                    $productCounts[$prod]++;
                } else {
                    $productCounts[$prod] = 1;
                }
            }
        }
        $total = 0;
        foreach ($productCounts as $count) {
            if ($count >= 2) {
                $total += 4 * $count * ($count - 1);
            }
        }
        return $total;
    }
}
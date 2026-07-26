<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumProduct(array $nums): int
    {
        sort($nums);
        $n = count($nums);

        // Compare last three numbers vs first two and last one
        return max(
            $nums[$n-1] * $nums[$n-2] * $nums[$n-3],
            $nums[0] * $nums[1] * $nums[$n-1]
        );
    }
}
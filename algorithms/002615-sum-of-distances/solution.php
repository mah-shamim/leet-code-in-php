<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function distance(array $nums): array
    {
        $n = count($nums);
        $arr = array_fill(0, $n, 0);
        $group = [];

        // Step 1: group indices by value
        for ($i = 0; $i < $n; $i++) {
            $group[$nums[$i]][] = $i;
        }

        // Step 2: for each group, compute prefix sums and distances
        foreach ($group as $indices) {
            $k = count($indices);
            $prefixSum = array_fill(0, $k + 1, 0);
            for ($j = 0; $j < $k; $j++) {
                $prefixSum[$j + 1] = $prefixSum[$j] + $indices[$j];
            }

            for ($j = 0; $j < $k; $j++) {
                $leftCount = $j;
                $rightCount = $k - $j - 1;

                $leftSum = $prefixSum[$j]; // sum of indices before current
                $rightSum = $prefixSum[$k] - $prefixSum[$j + 1]; // sum of indices after current

                $pos = $indices[$j];
                $arr[$pos] = ($pos * $leftCount - $leftSum) + ($rightSum - $pos * $rightCount);
            }
        }

        return $arr;
    }
}
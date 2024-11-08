<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $maximumBit
     * @return Integer[]
     */
    function getMaximumXor($nums, $maximumBit) {
        $maxNum = (1 << $maximumBit) - 1;  // 2^maximumBit - 1
        $currentXOR = 0;
        $n = count($nums);
        $answer = [];

        // Calculate initial XOR of all elements in nums
        foreach ($nums as $num) {
            $currentXOR ^= $num;
        }

        // Process each query from the last element to the first
        for ($i = $n - 1; $i >= 0; $i--) {
            // Find k that maximizes the XOR result
            $answer[] = $currentXOR ^ $maxNum;

            // Remove the last element from currentXOR by XORing it out
            $currentXOR ^= $nums[$i];
        }

        return $answer;  // We populated answer in reverse order
    }
}
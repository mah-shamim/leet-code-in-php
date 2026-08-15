<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSubsequence(array $nums): int
    {
        $n = count($nums);

        // Compute XOR of all elements
        $totalXor = 0;
        foreach ($nums as $num) {
            $totalXor ^= $num;
        }

        // If whole array XOR is non-zero, return full length
        if ($totalXor != 0) {
            return $n;
        }

        // If all elements are zero, return 0
        $allZero = true;
        foreach ($nums as $num) {
            if ($num != 0) {
                $allZero = false;
                break;
            }
        }
        if ($allZero) {
            return 0;
        }

        // Otherwise try removing each element to see if XOR becomes non-zero
        // Since totalXor = 0, removing element x gives newXor = totalXor ^ x = x
        // So if any element != 0, we can remove it and get non-zero XOR
        // That subsequence length will be n - 1
        return $n - 1;
    }
}
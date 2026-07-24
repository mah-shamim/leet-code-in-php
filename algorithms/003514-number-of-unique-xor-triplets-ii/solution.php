<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function uniqueXorTriplets(array $nums): int
    {
        $n = count($nums);
        $maxVal = 2047; // maximum possible XOR value
        $seen = array_fill(0, $maxVal + 1, false);

        // For each starting index i, compute all pair XORs for j,k where i <= j <= k
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i; $j < $n; $j++) {
                $pairXor = $nums[$i] ^ $nums[$j];
                for ($k = $j; $k < $n; $k++) {
                    $tripletXor = $pairXor ^ $nums[$k];
                    $seen[$tripletXor] = true;
                }
            }
        }

        $count = 0;
        foreach ($seen as $val) {
            if ($val) $count++;
        }
        return $count;
    }
}
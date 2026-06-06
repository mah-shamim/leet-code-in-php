<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function leftRightDifference(array $nums): array
    {
        $n = count($nums);
        $leftSum = array_fill(0, $n, 0);
        $rightSum = array_fill(0, $n, 0);
        $answer = array_fill(0, $n, 0);

        // Compute leftSum
        for ($i = 1; $i < $n; $i++) {
            $leftSum[$i] = $leftSum[$i-1] + $nums[$i-1];
        }

        // Compute rightSum
        for ($i = $n-2; $i >= 0; $i--) {
            $rightSum[$i] = $rightSum[$i+1] + $nums[$i+1];
        }

        // Compute answer array
        for ($i = 0; $i < $n; $i++) {
            $answer[$i] = abs($leftSum[$i] - $rightSum[$i]);
        }

        return $answer;
    }
}
<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) {
        $n = count($nums);

        // Count number of 1s in the array
        $countOnes = 0;
        foreach ($nums as $num) {
            if ($num == 1) {
                $countOnes++;
            }
        }

        // If there's at least one 1, we can spread it to other elements
        if ($countOnes > 0) {
            return $n - $countOnes;
        }

        // Find the minimum length subarray with GCD = 1
        $minLength = PHP_INT_MAX;

        for ($i = 0; $i < $n; $i++) {
            $currentGcd = $nums[$i];
            for ($j = $i + 1; $j < $n; $j++) {
                $currentGcd = $this->gcd($currentGcd, $nums[$j]);

                if ($currentGcd == 1) {
                    $minLength = min($minLength, $j - $i + 1);
                    break;
                }
            }
        }

        // If no subarray with GCD = 1 exists, return -1
        if ($minLength == PHP_INT_MAX) {
            return -1;
        }

        // Operations to create first 1: (minLength - 1)
        // Operations to spread 1 to remaining elements: (n - 1)
        return ($minLength - 1) + ($n - 1);
    }

    /**
     * Helper function to calculate GCD
     *
     * @param $a
     * @param $b
     * @return int|mixed
     */
    private function gcd($a, $b) {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }
}
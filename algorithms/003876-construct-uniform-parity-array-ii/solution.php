<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @return Boolean
     */
    function uniformArray(array $nums1): bool
    {
        $n = count($nums1);

        // Find the smallest odd number
        $minOdd = PHP_INT_MAX;
        foreach ($nums1 as $num) {
            if ($num % 2 == 1 && $num < $minOdd) {
                $minOdd = $num;
            }
        }

        // Check for all odd
        $possibleOdd = true;
        foreach ($nums1 as $num) {
            if ($num % 2 == 0) {
                // Need to subtract an odd number
                if ($minOdd == PHP_INT_MAX || $num - $minOdd < 1) {
                    $possibleOdd = false;
                    break;
                }
            }
        }
        if ($possibleOdd) return true;

        // Check for all even
        // We need the smallest odd number again for subtracting to change odd -> even
        if ($minOdd == PHP_INT_MAX) {
            // No odd numbers, all are already even => all even is possible
            return true;
        }

        $possibleEven = true;
        foreach ($nums1 as $num) {
            if ($num % 2 == 1) {
                // Need to subtract an odd number
                if ($num - $minOdd < 1) {
                    $possibleEven = false;
                    break;
                }
            }
        }

        return $possibleEven;
    }
}
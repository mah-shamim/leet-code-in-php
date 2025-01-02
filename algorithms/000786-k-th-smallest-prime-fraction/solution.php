<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function kthSmallestPrimeFraction($arr, $k) {
        $n = count($arr);
        $l = 0.0;
        $r = 1.0;

        while ($l < $r) {
            $m = ($l + $r) / 2.0; // Midpoint in binary search
            $fractionsNoGreaterThanM = 0; // Count of fractions <= m
            $p = 0; // Numerator of the closest fraction
            $q = 1; // Denominator of the closest fraction

            // Two pointers for each fraction arr[i] / arr[j]
            for ($i = 0, $j = 1; $i < $n; ++$i) {
                // Move j while the fraction arr[i] / arr[j] > m
                while ($j < $n && $arr[$i] > $m * $arr[$j]) {
                    ++$j;
                }

                // If we reach the end of the array, break out of the loop
                if ($j == $n) {
                    break;
                }

                // Count fractions with arr[i] / arr[j] <= m
                $fractionsNoGreaterThanM += $n - $j;

                // Track the largest fraction <= m
                if ($p * $arr[$j] < $q * $arr[$i]) {
                    $p = $arr[$i];
                    $q = $arr[$j];
                }
            }

            // Check if the count matches k
            if ($fractionsNoGreaterThanM == $k) {
                return [$p, $q]; // Return the k-th smallest fraction
            }

            // Adjust the binary search bounds
            if ($fractionsNoGreaterThanM > $k) {
                $r = $m; // Too many fractions, search left side
            } else {
                $l = $m; // Too few fractions, search right side
            }
        }

        throw new Exception("Kth smallest prime fraction not found.");
    }
}
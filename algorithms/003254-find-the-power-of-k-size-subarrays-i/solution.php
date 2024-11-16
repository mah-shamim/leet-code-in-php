<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function resultsArray($nums, $k) {
        $n = count($nums);
        $result = [];

        // Iterate through all subarrays of size k
        for ($i = 0; $i <= $n - $k; $i++) {
            $subarray = array_slice($nums, $i, $k);
            $isSorted = true;

            // Check if the subarray is sorted with consecutive elements
            for ($j = 0; $j < $k - 1; $j++) {
                if ($subarray[$j] + 1 !== $subarray[$j + 1]) {
                    $isSorted = false;
                    break;
                }
            }

            // If sorted and consecutive, return the maximum, else -1
            if ($isSorted) {
                $result[] = max($subarray);
            } else {
                $result[] = -1;
            }
        }

        return $result;
    }
}
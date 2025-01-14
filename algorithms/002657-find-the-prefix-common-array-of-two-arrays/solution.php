<?php

class Solution {

    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @return Integer[]
     */
    function findThePrefixCommonArray($A, $B) {
        $n = count($A); // Length of arrays
        $freqA = array_fill(0, $n + 1, 0); // Frequency array for A
        $freqB = array_fill(0, $n + 1, 0); // Frequency array for B
        $result = [];

        // Iterate through each index and calculate the common count
        for ($i = 0; $i < $n; $i++) {
            // Increment frequency of A[i] and B[i]
            $freqA[$A[$i]]++;
            $freqB[$B[$i]]++;

            // Count how many elements have appeared in both arrays till this point
            $commonCount = 0;
            for ($j = 1; $j <= $n; $j++) {
                if ($freqA[$j] > 0 && $freqB[$j] > 0) {
                    $commonCount++;
                }
            }

            // Store the common count in the result array
            $result[] = $commonCount;
        }

        return $result;
    }
}
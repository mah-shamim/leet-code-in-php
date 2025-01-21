<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function maxChunksToSorted($arr) {
        $n = count($arr);
        $maxSoFar = -1;
        $chunks = 0;

        // Traverse through the array
        for ($i = 0; $i < $n; $i++) {
            // Update the max value encountered so far
            $maxSoFar = max($maxSoFar, $arr[$i]);

            // If the maximum value encountered so far equals the current index
            // It means we can split here, making a chunk.
            if ($maxSoFar == $i) {
                $chunks++;
            }
        }

        return $chunks;
    }
}
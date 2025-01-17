<?php

class Solution {

    /**
     * @param Integer[] $gifts
     * @param Integer $k
     * @return Integer
     */
    function pickGifts($gifts, $k) {
        // Use a max heap implemented using SplPriorityQueue
        $maxHeap = new SplPriorityQueue();

        // Add all the gifts to the heap
        foreach ($gifts as $gift) {
            $maxHeap->insert($gift, $gift); // Value and priority are the same
        }

        // Perform the operation k times
        for ($i = 0; $i < $k; ++$i) {
            if ($maxHeap->isEmpty()) break;

            // Get the largest pile
            $largestPile = $maxHeap->extract();

            // Compute the floor of the square root of the largest pile
            $reducedPile = floor(sqrt($largestPile));

            // Put the reduced pile back into the heap
            $maxHeap->insert($reducedPile, $reducedPile);
        }

        // Sum up the remaining gifts
        $remainingGifts = 0;
        while (!$maxHeap->isEmpty()) {
            $remainingGifts += $maxHeap->extract();
        }

        return $remainingGifts;
    }
}
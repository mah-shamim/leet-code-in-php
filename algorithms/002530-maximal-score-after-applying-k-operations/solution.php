<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxKelements($nums, $k) {
        $pq = new SplMaxHeap(); // Building a max heap
        $sum = 0;

        // Insert all elements into the max heap
        foreach ($nums as $num) {
            $pq->insert($num);
        }

        // Perform k operations
        for ($i = 0; $i < $k; $i++) {
            // Extract the largest element
            $t = $pq->extract();

            // Add it to the score
            $sum += $t;

            // Calculate the new value using ceil(t / 3)
            $newVal = (int)(($t + 2) / 3);

            // Insert the updated value back into the heap
            $pq->insert($newVal);
        }

        return $sum;
    }
}
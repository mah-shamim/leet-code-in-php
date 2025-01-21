<?php

class Solution {

    /**
     * @param Integer[] $quality
     * @param Integer[] $wage
     * @param Integer $k
     * @return Float
     */
    function mincostToHireWorkers($quality, $wage, $k) {
        $n = count($quality);
        $workers = array();
        $ans = PHP_INT_MAX;
        $qualitySum = 0;

        // (wagePerQuality, quality) sorted by wagePerQuality
        for ($i = 0; $i < $n; ++$i) {
            $workers[$i] = array((double) $wage[$i] / $quality[$i], $quality[$i]);
        }

        // Sort by wagePerQuality ratio
        usort($workers, function($a, $b) {
            return $a[0] <=> $b[0];
        });

        // MaxHeap to keep track of largest quality workers
        $maxHeap = new SplMaxHeap();

        foreach ($workers as $worker) {
            $wagePerQuality = $worker[0];
            $q = $worker[1];
            $qualitySum += $q;
            $maxHeap->insert($q);

            // Ensure the heap contains at most 'k' workers
            if ($maxHeap->count() > $k) {
                // Remove the worker with the largest quality
                $qualitySum -= $maxHeap->extract();
            }

            // If we have exactly 'k' workers, calculate the cost
            if ($maxHeap->count() == $k) {
                // Total cost is (total quality of 'k' workers) * (current wagePerQuality)
                $ans = min($ans, $qualitySum * $wagePerQuality);
            }
        }

        return $ans;
    }
}
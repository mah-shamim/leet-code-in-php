<?php

class Solution {

    /**
     * @param Integer $k
     * @param Integer $w
     * @param Integer[] $profits
     * @param Integer[] $capital
     * @return Integer
     */
    function findMaximizedCapital($k, $w, $profits, $capital) {
        // Combine the projects into a list of tuples (capital, profit)
        $projects = [];
        $n = count($profits);

        for ($i = 0; $i < $n; $i++) {
            $projects[] = [$capital[$i], $profits[$i]];
        }

        // Sort projects by the capital needed (ascending)
        usort($projects, function($a, $b) {
            return $a[0] - $b[0];
        });

        // A max heap to store the available profits
        $maxHeap = new SplMaxHeap();

        $index = 0;
        for ($i = 0; $i < $k; $i++) {
            // Push all projects that can be started with the current capital into the heap
            while ($index < $n && $projects[$index][0] <= $w) {
                $maxHeap->insert($projects[$index][1]);
                $index++;
            }

            // If there are no available projects, break out of the loop
            if ($maxHeap->isEmpty()) {
                break;
            }

            // Pick the project with the maximum profit
            $w += $maxHeap->extract();
        }

        return $w;

    }
}
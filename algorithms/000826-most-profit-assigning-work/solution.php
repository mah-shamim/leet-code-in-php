<?php

class Solution {

    /**
     * @param Integer[] $difficulty
     * @param Integer[] $profit
     * @param Integer[] $worker
     * @return Integer
     */
    function maxProfitAssignment($difficulty, $profit, $worker) {
        // Combine difficulty and profit into a list of jobs
        $jobs = [];
        for ($i = 0; $i < count($difficulty); $i++) {
            $jobs[] = [$difficulty[$i], $profit[$i]];
        }

        // Sort jobs by difficulty (and by profit in case of tie in difficulty)
        usort($jobs, function($a, $b) {
            if ($a[0] == $b[0]) {
                return $b[1] - $a[1]; // sort by profit if difficulties are the same
            }
            return $a[0] - $b[0]; // sort by difficulty
        });

        // Sort the workers by their ability
        sort($worker);

        $maxProfit = 0;
        $totalProfit = 0;
        $i = 0; // job index

        // Iterate over each worker
        foreach ($worker as $ability) {
            // Assign the best job to the current worker
            while ($i < count($jobs) && $jobs[$i][0] <= $ability) {
                $maxProfit = max($maxProfit, $jobs[$i][1]);
                $i++;
            }
            // Add the best profit the worker can achieve
            $totalProfit += $maxProfit;
        }

        return $totalProfit;
    }
}
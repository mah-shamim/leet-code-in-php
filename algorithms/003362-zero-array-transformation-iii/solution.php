<?php

class MaxHeap extends SplPriorityQueue {
    /**
     * @param $a
     * @param $b
     * @return int|mixed
     */
    public function compare($a, $b) {
        return $a - $b; // max-heap
    }
}

class MinHeap extends SplPriorityQueue {
    /**
     * @param $a
     * @param $b
     * @return int|mixed
     */
    public function compare($a, $b) {
        return $b - $a; // min-heap
    }
}

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[][] $queries
     * @return Integer
     */
    function maxRemoval($nums, $queries) {
        $queryIndex = 0;
        $available = new MaxHeap(); // max-heap for available `r`s
        $running = new MinHeap();   // min-heap for running `r`s

        // Sort queries by the first element
        usort($queries, function($a, $b) {
            return $a[0] - $b[0];
        });

        $n = count($nums);
        for ($i = 0; $i < $n; ++$i) {
            // Push to available all queries where l <= i
            while ($queryIndex < count($queries) && $queries[$queryIndex][0] <= $i) {
                $available->insert($queries[$queryIndex][1], $queries[$queryIndex][1]);
                ++$queryIndex;
            }

            // Remove all expired running tasks (r < i)
            while (!$running->isEmpty() && $running->top() < $i) {
                $running->extract();
            }

            // Add tasks from available until nums[i] <= count(running)
            while ($nums[$i] > $running->count()) {
                if ($available->isEmpty()) {
                    return -1;
                }

                // Get the max available r
                $top = $available->top();
                if ($top < $i) {
                    return -1;
                }

                $running->insert($top, $top);
                $available->extract();
            }
        }

        return $available->count();
    }
}
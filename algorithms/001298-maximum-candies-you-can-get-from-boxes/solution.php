<?php

class Solution {

    /**
     * @param Integer[] $status
     * @param Integer[] $candies
     * @param Integer[][] $keys
     * @param Integer[][] $containedBoxes
     * @param Integer[] $initialBoxes
     * @return Integer
     */
    function maxCandies($status, $candies, $keys, $containedBoxes, $initialBoxes) {
        $n = count($status);
        $hasBox = array_fill(0, $n, false);
        $hasKey = array_fill(0, $n, false);
        $visited = array_fill(0, $n, false);
        $queue = new SplQueue();

        foreach ($initialBoxes as $box) {
            $hasBox[$box] = true;
            if ($status[$box] == 1 || $hasKey[$box]) {
                $visited[$box] = true;
                $queue->enqueue($box);
            }
        }

        $total = 0;
        while (!$queue->isEmpty()) {
            $box = $queue->dequeue();
            $total += $candies[$box];

            foreach ($keys[$box] as $key) {
                if (!$hasKey[$key]) {
                    $hasKey[$key] = true;
                    if ($hasBox[$key] && !$visited[$key]) {
                        $visited[$key] = true;
                        $queue->enqueue($key);
                    }
                }
            }

            foreach ($containedBoxes[$box] as $child) {
                if (!$hasBox[$child]) {
                    $hasBox[$child] = true;
                    if (($status[$child] == 1 || $hasKey[$child]) && !$visited[$child]) {
                        $visited[$child] = true;
                        $queue->enqueue($child);
                    }
                }
            }
        }

        return $total;
    }
}
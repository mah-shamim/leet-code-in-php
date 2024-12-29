<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minimumTime($grid) {
        $m = count($grid);
        $n = count($grid[0]);

        // Early exit if the adjacent cells from the starting point are both blocked
        if ($grid[0][1] > 1 && $grid[1][0] > 1) {
            return -1;
        }

        // Directional movements: right, down, left, up
        $dirs = [[0, 1], [1, 0], [0, -1], [-1, 0]];

        // Priority queue to store (time, row, col)
        $minHeap = new SplPriorityQueue();
        $minHeap->setExtractFlags(SplPriorityQueue::EXTR_DATA); // Extract data only
        $minHeap->insert([0, 0, 0], 0); // (time, i, j)

        // Seen array to track visited cells
        $seen = array_fill(0, $m, array_fill(0, $n, false));
        $seen[0][0] = true;

        while (!$minHeap->isEmpty()) {
            list($time, $i, $j) = $minHeap->extract();
            if ($i === $m - 1 && $j === $n - 1) {
                return $time; // Reached the bottom-right cell
            }

            foreach ($dirs as $dir) {
                $x = $i + $dir[0];
                $y = $j + $dir[1];

                // Skip invalid or already visited cells
                if ($x < 0 || $x >= $m || $y < 0 || $y >= $n || $seen[$x][$y]) {
                    continue;
                }

                // Calculate the waiting time if needed
                $extraWait = ($grid[$x][$y] - $time) % 2 === 0 ? 1 : 0;
                $nextTime = max($time + 1, $grid[$x][$y] + $extraWait);

                $minHeap->insert([$nextTime, $x, $y], -$nextTime); // Use -$nextTime to mimic min-heap
                $seen[$x][$y] = true;
            }
        }

        return -1; // Unable to reach the bottom-right cell
    }
}
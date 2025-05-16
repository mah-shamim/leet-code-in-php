<?php

class Solution {

    /**
     * @param Integer[][] $moveTime
     * @return Integer
     */
    function minTimeToReach($moveTime) {
        $n = count($moveTime);
        $m = count($moveTime[0]);

        // Initialize distance array with PHP_INT_MAX
        $dist = array();
        for ($i = 0; $i < $n; $i++) {
            $dist[$i] = array_fill(0, $m, PHP_INT_MAX);
        }
        $dist[0][0] = 0;

        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_DATA);
        $pq->insert(array(0, 0, 0), -0);

        $dirs = array(array(-1, 0), array(1, 0), array(0, -1), array(0, 1));

        while (!$pq->isEmpty()) {
            $current = $pq->extract();
            $currentTime = $current[0];
            $x = $current[1];
            $y = $current[2];

            // Check if current cell is the destination
            if ($x == $n - 1 && $y == $m - 1) {
                return $currentTime;
            }

            // Skip if a shorter path to this cell was already found
            if ($currentTime > $dist[$x][$y]) {
                continue;
            }

            // Explore all four directions
            foreach ($dirs as $dir) {
                $nx = $x + $dir[0];
                $ny = $y + $dir[1];

                if ($nx >= 0 && $nx < $n && $ny >= 0 && $ny < $m) {
                    // Calculate the new arrival time
                    $newTime = max($currentTime, $moveTime[$nx][$ny]) + 1;

                    // Update if this path is better
                    if ($newTime < $dist[$nx][$ny]) {
                        $dist[$nx][$ny] = $newTime;
                        $pq->insert(array($newTime, $nx, $ny), -$newTime);
                    }
                }
            }
        }

        // The destination is guaranteed to be reachable per problem constraints
        return $dist[$n - 1][$m - 1];
    }
}
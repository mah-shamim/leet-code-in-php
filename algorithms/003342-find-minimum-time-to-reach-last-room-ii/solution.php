<?php

class Solution {

    /**
     * @param Integer[][] $moveTime
     * @return Integer
     */
    function minTimeToReach($moveTime) {
        $n = count($moveTime);
        $m = count($moveTime[0]);
        $dirs = [[-1, 0], [1, 0], [0, -1], [0, 1]];
        $INF = PHP_INT_MAX;

        // Initialize distance array with INF for all (i,j,p)
        $dist = array_fill(0, $n, []);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $dist[$i][$j] = [$INF, $INF];
            }
        }
        $dist[0][0][0] = 0;

        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        $pq->insert([0, 0, 0, 0], -0);

        while (!$pq->isEmpty()) {
            $element = $pq->extract();
            $currentTime = $element['data'][0];
            $i = $element['data'][1];
            $j = $element['data'][2];
            $p = $element['data'][3];

            // Check if we have reached the destination
            if ($i == $n - 1 && $j == $m - 1) {
                return $currentTime;
            }

            // Skip if a shorter path to this state was already found
            if ($currentTime > $dist[$i][$j][$p]) {
                continue;
            }

            foreach ($dirs as $d) {
                $ni = $i + $d[0];
                $nj = $j + $d[1];

                // Check if the neighbor is within bounds
                if ($ni < 0 || $ni >= $n || $nj < 0 || $nj >= $m) {
                    continue;
                }

                // Determine the cost based on the current parity
                $cost = ($p == 0) ? 1 : 2;
                $mt = $moveTime[$ni][$nj];
                $departureTime = max($currentTime, $mt);
                $arrivalTime = $departureTime + $cost;
                $newP = 1 - $p;

                // Update the distance if a shorter path is found
                if ($arrivalTime < $dist[$ni][$nj][$newP]) {
                    $dist[$ni][$nj][$newP] = $arrivalTime;
                    $pq->insert([$arrivalTime, $ni, $nj, $newP], -$arrivalTime);
                }
            }
        }

        // The problem guarantees a path exists, so this is a fallback
        return -1;
    }
}
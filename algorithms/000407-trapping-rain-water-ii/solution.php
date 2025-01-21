<?php

class Solution {

    /**
     * @param Integer[][] $heightMap
     * @return Integer
     */
    function trapRainWater($heightMap) {
        $m = count($heightMap);
        $n = count($heightMap[0]);

        if ($m < 3 || $n < 3) {
            return 0;
        }

        $directions = [[1, 0], [-1, 0], [0, 1], [0, -1]];
        $minHeap = new SplPriorityQueue();
        $visited = array_fill(0, $m, array_fill(0, $n, false));

        // Add the boundary cells to the priority queue
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i == 0 || $i == $m - 1 || $j == 0 || $j == $n - 1) {
                    $minHeap->insert([$i, $j, $heightMap[$i][$j]], -$heightMap[$i][$j]);
                    $visited[$i][$j] = true;
                }
            }
        }

        $waterTrapped = 0;

        while (!$minHeap->isEmpty()) {
            list($x, $y, $h) = $minHeap->extract();
            foreach ($directions as $direction) {
                $nx = $x + $direction[0];
                $ny = $y + $direction[1];

                if ($nx >= 0 && $nx < $m && $ny >= 0 && $ny < $n && !$visited[$nx][$ny]) {
                    $visited[$nx][$ny] = true;
                    $waterTrapped += max(0, $h - $heightMap[$nx][$ny]);
                    $minHeap->insert([$nx, $ny, max($h, $heightMap[$nx][$ny])], -max($h, $heightMap[$nx][$ny]));
                }
            }
        }

        return $waterTrapped;
    }
}
/**
 * @param Integer[][] $heightMap
 * @return Integer
 */
function trapRainWater($heightMap) {
    $m = count($heightMap);
    $n = count($heightMap[0]);

    if ($m < 3 || $n < 3) {
        return 0;
    }

    $directions = [[1, 0], [-1, 0], [0, 1], [0, -1]];
    $minHeap = new SplPriorityQueue();
    $visited = array_fill(0, $m, array_fill(0, $n, false));

    // Add the boundary cells to the priority queue
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($i == 0 || $i == $m - 1 || $j == 0 || $j == $n - 1) {
                $minHeap->insert([$i, $j, $heightMap[$i][$j]], -$heightMap[$i][$j]);
                $visited[$i][$j] = true;
            }
        }
    }

    $waterTrapped = 0;

    while (!$minHeap->isEmpty()) {
        list($x, $y, $h) = $minHeap->extract();
        foreach ($directions as $direction) {
            $nx = $x + $direction[0];
            $ny = $y + $direction[1];

            if ($nx >= 0 && $nx < $m && $ny >= 0 && $ny < $n && !$visited[$nx][$ny]) {
                $visited[$nx][$ny] = true;
                $waterTrapped += max(0, $h - $heightMap[$nx][$ny]);
                $minHeap->insert([$nx, $ny, max($h, $heightMap[$nx][$ny])], -max($h, $heightMap[$nx][$ny]));
            }
        }
    }

    return $waterTrapped;
}
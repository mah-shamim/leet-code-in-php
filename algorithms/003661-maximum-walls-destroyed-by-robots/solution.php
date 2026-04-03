<?php

class Solution {

    /**
     * @param Integer[] $robots
     * @param Integer[] $distance
     * @param Integer[] $walls
     * @return Integer
     */
    function maxWalls(array $robots, array $distance, array $walls): int
    {
        sort($robots);
        sort($walls);

        $n = count($robots);
        $m = count($walls);

        // Precompute nearest robot positions
        $prevRobot = array_fill(0, $n, -1);
        $nextRobot = array_fill(0, $n, -1);

        for ($i = 0; $i < $n; $i++) {
            if ($i > 0) $prevRobot[$i] = $robots[$i - 1];
            if ($i < $n - 1) $nextRobot[$i] = $robots[$i + 1];
        }

        // left and right reachable ranges in wall indices
        $leftRange = [];
        $rightRange = [];

        for ($i = 0; $i < $n; $i++) {
            // left range
            $leftLimit = $robots[$i] - $distance[$i];
            if ($prevRobot[$i] != -1) {
                $leftLimit = max($leftLimit, $prevRobot[$i] + 1);
            }
            // walls in [$leftLimit, $robots[$i]]
            $leftIdx = $this->lower_bound($walls, $leftLimit);
            $rightIdx = $this->upper_bound($walls, $robots[$i]) - 1;
            if ($leftIdx <= $rightIdx) {
                $leftRange[$i] = [$leftIdx, $rightIdx];
            } else {
                $leftRange[$i] = null;
            }

            // right range
            $rightLimit = $robots[$i] + $distance[$i];
            if ($nextRobot[$i] != -1) {
                $rightLimit = min($rightLimit, $nextRobot[$i] - 1);
            }
            // walls in [$robots[$i], $rightLimit]
            $leftIdx = $this->lower_bound($walls, $robots[$i]);
            $rightIdx = $this->upper_bound($walls, $rightLimit) - 1;
            if ($leftIdx <= $rightIdx) {
                $rightRange[$i] = [$leftIdx, $rightIdx];
            } else {
                $rightRange[$i] = null;
            }
        }

        // DP: dp[i][0] = max walls destroyed considering first i+1 robots, last shot left
        // dp[i][1] = last shot right
        $dp = array_fill(0, $n, [0, 0]);

        for ($i = 0; $i < $n; $i++) {
            if ($i > 0) {
                $dp[$i][0] = $dp[$i - 1][0];
                $dp[$i][1] = $dp[$i - 1][1];
            }
            if ($leftRange[$i]) {
                list($l, $r) = $leftRange[$i];
                $cnt = $r - $l + 1;
                // if previous robot's right range didn't cover these walls
                // we need to add uncovered ones
                $prevCovered = 0;
                if ($i > 0 && $rightRange[$i - 1]) {
                    list($pl, $pr) = $rightRange[$i - 1];
                    $prevCovered = max(0, $pr - $l + 1);
                }
                $newCnt = max($cnt, $cnt - $prevCovered);
                $dp[$i][0] = max($dp[$i][0], $dp[$i][0] + $newCnt);
            }
            if ($rightRange[$i]) {
                list($l, $r) = $rightRange[$i];
                $cnt = $r - $l + 1;
                // similar check
                $prevCovered = 0;
                if ($i > 0 && $rightRange[$i - 1]) {
                    list($pl, $pr) = $rightRange[$i - 1];
                    $prevCovered = max(0, $pr - $l + 1);
                }
                $newCnt = max($cnt, $cnt - $prevCovered);
                $dp[$i][1] = max($dp[$i][1], $dp[$i][1] + $newCnt);
            }
        }

        return max($dp[$n - 1][0], $dp[$n - 1][1]);
    }

    /**
     * @param $arr
     * @param $target
     * @return int
     */
    function lower_bound($arr, $target): int
    {
        $l = 0;
        $r = count($arr);
        while ($l < $r) {
            $m = intdiv($l + $r, 2);
            if ($arr[$m] < $target) {
                $l = $m + 1;
            } else {
                $r = $m;
            }
        }
        return $l;
    }

    /**
     * @param $arr
     * @param $target
     * @return int
     */
    function upper_bound($arr, $target): int
    {
        $l = 0;
        $r = count($arr);
        while ($l < $r) {
            $m = intdiv($l + $r, 2);
            if ($arr[$m] <= $target) {
                $l = $m + 1;
            } else {
                $r = $m;
            }
        }
        return $l;
    }
}
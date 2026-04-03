<?php

class Solution {
    /**
     * @param integer[] $robots
     * @param integer[] $distance
     * @param integer[] $walls
     * @return integer
     */
    function maxWalls(array $robots, array $distance, array $walls): int {
        $n = count($robots);

        // Create pairs of (robot_position, robot_distance) for easier handling
        $robotInfo = [];
        for ($i = 0; $i < $n; $i++) {
            $robotInfo[] = [$robots[$i], $distance[$i]];
        }

        // Sort robots by their positions
        usort($robotInfo, function($a, $b) {
            return $a[0] - $b[0];
        });

        // Sort walls for binary search
        sort($walls);

        // DP memoization table
        // dp[i][direction]: maximum walls destroyed considering robots 0 to i
        // direction = 0: robot i moves left, direction = 1: robot i moves right
        $dp = array_fill(0, $n, array_fill(0, 2, -1));

        // Recursive function with memoization using a closure
        $solve = function($robotIdx, $prevDirection) use (&$solve, &$dp, $robotInfo, $walls, $n) {
            // Base case: no robots left to consider
            if ($robotIdx < 0) {
                return 0;
            }

            // Return memoized result if already computed
            if ($dp[$robotIdx][$prevDirection] != -1) {
                return $dp[$robotIdx][$prevDirection];
            }

            $maxDestroyed = 0;

            // Option 1: Current robot moves LEFT
            // Calculate the leftmost position this robot can reach
            $leftBound = $robotInfo[$robotIdx][0] - $robotInfo[$robotIdx][1];

            // Ensure no overlap with previous robot (if exists)
            if ($robotIdx > 0) {
                $leftBound = max($leftBound, $robotInfo[$robotIdx - 1][0] + 1);
            }

            // Count walls that can be destroyed when moving left
            $leftWallIdx = $this->lowerBound($walls, $leftBound);
            $rightWallIdx = $this->lowerBound($walls, $robotInfo[$robotIdx][0] + 1);
            $wallsDestroyedLeft = $rightWallIdx - $leftWallIdx;

            // Recurse for previous robots (current robot chose left, so prev can choose any direction)
            $maxDestroyed = $solve($robotIdx - 1, 0) + $wallsDestroyedLeft;

            // Option 2: Current robot moves RIGHT
            // Calculate the rightmost position this robot can reach
            $rightBound = $robotInfo[$robotIdx][0] + $robotInfo[$robotIdx][1];

            // Ensure no overlap with next robot (if exists)
            if ($robotIdx + 1 < $n) {
                if ($prevDirection == 0) {
                    // If next robot will move left, consider its leftmost reach
                    $rightBound = min($rightBound, $robotInfo[$robotIdx + 1][0] - $robotInfo[$robotIdx + 1][1] - 1);
                } else {
                    // If next robot will move right, just avoid its starting position
                    $rightBound = min($rightBound, $robotInfo[$robotIdx + 1][0] - 1);
                }
            }

            // Count walls that can be destroyed when moving right
            $leftWallIdx = $this->lowerBound($walls, $robotInfo[$robotIdx][0]);
            $rightWallIdx = $this->lowerBound($walls, $rightBound + 1);
            $wallsDestroyedRight = $rightWallIdx - $leftWallIdx;

            // Recurse for previous robots (current robot chose right, so pass direction = 1)
            $maxDestroyed = max($maxDestroyed, $solve($robotIdx - 1, 1) + $wallsDestroyedRight);

            // Store and return the result
            $dp[$robotIdx][$prevDirection] = $maxDestroyed;
            return $maxDestroyed;
        };

        // Start solving from the last robot, assuming it moves right
        // (The last robot's direction doesn't affect next robots since there are none)
        return $solve($n - 1, 1);
    }

    /**
     * Binary search: find first index where value >= target
     * @param integer[] $arr
     * @param integer $target
     * @return integer
     */
    private function lowerBound(array $arr, int $target): int {
        $left = 0;
        $right = count($arr);

        while ($left < $right) {
            $mid = $left + (int)(($right - $left) / 2);
            if ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }

        return $left;
    }
}
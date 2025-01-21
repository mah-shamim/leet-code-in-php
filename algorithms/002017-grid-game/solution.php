<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function gridGame($grid) {
        $n = count($grid[0]);

        // Calculate prefix sums for both rows
        $prefixTop = array_fill(0, $n + 1, 0);
        $prefixBottom = array_fill(0, $n + 1, 0);

        for ($i = 0; $i < $n; $i++) {
            $prefixTop[$i + 1] = $prefixTop[$i] + $grid[0][$i];
            $prefixBottom[$i + 1] = $prefixBottom[$i] + $grid[1][$i];
        }

        $minPointsForSecond = PHP_INT_MAX;

        // Iterate over all possible transition points
        for ($i = 0; $i < $n; $i++) {
            // Points remaining in the top row after $i
            $topRemaining = $prefixTop[$n] - $prefixTop[$i + 1];
            // Points remaining in the bottom row before $i
            $bottomRemaining = $prefixBottom[$i];

            // Maximum points the second robot can collect
            $secondRobotPoints = max($topRemaining, $bottomRemaining);

            // Minimize the maximum points for the second robot
            $minPointsForSecond = min($minPointsForSecond, $secondRobotPoints);
        }

        return $minPointsForSecond;
    }
}
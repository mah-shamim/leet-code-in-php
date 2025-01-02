<?php

class Solution {

    /**
     * @param Integer[] $commands
     * @param Integer[][] $obstacles
     * @return Integer
     */
    function robotSim($commands, $obstacles) {
        // Directions: North, East, South, West
        $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]];
        $currentDirection = 0; // Start facing North
        $x = 0;
        $y = 0;
        $maxDistanceSquared = 0;

        // Convert obstacles array to a set of strings for quick lookup
        $obstacleSet = [];
        foreach ($obstacles as $obstacle) {
            $obstacleSet[$obstacle[0] . ',' . $obstacle[1]] = true;
        }

        foreach ($commands as $command) {
            if ($command == -2) {
                // Turn left
                $currentDirection = ($currentDirection + 3) % 4;
            } elseif ($command == -1) {
                // Turn right
                $currentDirection = ($currentDirection + 1) % 4;
            } else {
                // Move forward
                for ($i = 0; $i < $command; $i++) {
                    $nextX = $x + $directions[$currentDirection][0];
                    $nextY = $y + $directions[$currentDirection][1];

                    // Check if the next position is an obstacle
                    if (isset($obstacleSet[$nextX . ',' . $nextY])) {
                        break; // Stop if hitting an obstacle
                    }

                    // Move to the next position
                    $x = $nextX;
                    $y = $nextY;

                    // Calculate the distance squared from the origin
                    $maxDistanceSquared = max($maxDistanceSquared, $x * $x + $y * $y);
                }
            }
        }

        return $maxDistanceSquared;

    }
}
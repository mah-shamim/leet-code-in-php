<?php

class Solution {

    /**
     * @param Integer[] $positions
     * @param Integer[] $healths
     * @param String $directions
     * @return Integer[]
     */
    function survivedRobotsHealths($positions, $healths, $directions) {
        // Combine all robot data into a single array
        $robots = [];
        for ($i = 0; $i < count($positions); $i++) {
            $robots[] = ['position' => $positions[$i], 'health' => $healths[$i], 'direction' => $directions[$i], 'index' => $i];
        }

        // Sort robots by their positions
        usort($robots, function($a, $b) {
            return $a['position'] - $b['position'];
        });

        // Initialize a stack to keep track of robots
        $stack = [];

        foreach ($robots as $robot) {
            if ($robot['direction'] == 'R') {
                // If the robot is moving to the right, push it onto the stack
                $stack[] = $robot;
            } else {
                // The robot is moving to the left, handle collisions
                while (!empty($stack) && end($stack)['direction'] == 'R') {
                    $topRobot = array_pop($stack);
                    if ($topRobot['health'] > $robot['health']) {
                        $topRobot['health'] -= 1;
                        $stack[] = $topRobot;
                        $robot = null;
                        break;
                    } elseif ($topRobot['health'] < $robot['health']) {
                        $robot['health'] -= 1;
                    } else {
                        $robot = null;
                        break;
                    }
                }
                if ($robot) {
                    $stack[] = $robot;
                }
            }
        }

        // Create an array to store the results
        $result = array_fill(0, count($positions), null);
        foreach ($stack as $robot) {
            $result[$robot['index']] = $robot['health'];
        }

        // Filter out null values from the result array
        return array_filter($result, function($value) {
            return $value !== null;
        });

    }
}
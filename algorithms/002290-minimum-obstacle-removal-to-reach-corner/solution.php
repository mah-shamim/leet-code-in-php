<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minimumObstacles($grid) {
        $rows = count($grid);
        $cols = count($grid[0]);

        // Directions for moving up, down, left, right
        $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]];

        // Deque for 0-1 BFS
        $deque = new SplDoublyLinkedList();
        $deque->push([0, 0, 0]); // [row, col, cost]

        // Visited array
        $visited = array_fill(0, $rows, array_fill(0, $cols, false));
        $visited[0][0] = true;

        // 0-1 BFS
        while (!$deque->isEmpty()) {
            list($x, $y, $cost) = $deque->shift();

            // If we reach the bottom-right corner, return the cost
            if ($x == $rows - 1 && $y == $cols - 1) {
                return $cost;
            }

            // Explore neighbors
            foreach ($directions as $direction) {
                $nx = $x + $direction[0];
                $ny = $y + $direction[1];

                // Check if the new position is within bounds and not visited
                if ($nx >= 0 && $nx < $rows && $ny >= 0 && $ny < $cols && !$visited[$nx][$ny]) {
                    $visited[$nx][$ny] = true;

                    // If no obstacle, add to the front of the deque
                    if ($grid[$nx][$ny] == 0) {
                        $deque->unshift([$nx, $ny, $cost]);
                    } else {
                        // If obstacle, add to the back of the deque
                        $deque->push([$nx, $ny, $cost + 1]);
                    }
                }
            }
        }

        return -1; // Should not reach here if there's a valid path
    }
}
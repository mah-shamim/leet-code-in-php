<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer[][] $guards
     * @param Integer[][] $walls
     * @return Integer
     */
    function countUnguarded($m, $n, $guards, $walls) {
        // Initialize the grid
        $grid = array_fill(0, $m, array_fill(0, $n, 0));

        // Define constants for the grid
        $GUARD = 1;
        $WALL = 2;
        $GUARDED = 3;

        // Mark walls and guards on the grid
        foreach ($walls as $wall) {
            list($row, $col) = $wall;
            $grid[$row][$col] = $WALL;
        }
        foreach ($guards as $guard) {
            list($row, $col) = $guard;
            $grid[$row][$col] = $GUARD;
        }

        // Directions for north, south, east, west
        $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        // Process guards
        foreach ($guards as $guard) {
            list($row, $col) = $guard;
            foreach ($directions as $dir) {
                $x = $row;
                $y = $col;

                // Move in the current direction
                while (true) {
                    $x += $dir[0];
                    $y += $dir[1];

                    // Stop if out of bounds or hits a wall/guard
                    if ($x < 0 || $x >= $m || $y < 0 || $y >= $n || $grid[$x][$y] == $WALL || $grid[$x][$y] == $GUARD) {
                        break;
                    }

                    // Mark the cell as guarded
                    if ($grid[$x][$y] == 0) {
                        $grid[$x][$y] = $GUARDED;
                    }
                }
            }
        }

        // Count unguarded cells
        $unguardedCount = 0;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 0) {
                    $unguardedCount++;
                }
            }
        }

        return $unguardedCount;
    }
}
<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $health
     * @return Boolean
     */
    function findSafeWalk(array $grid, int $health): bool
    {
        $m = count($grid);
        $n = count($grid[0]);

        // directions: up, down, left, right
        $dirs = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        // dist[i][j] = minimum health loss to reach (i, j)
        $dist = array_fill(0, $m, array_fill(0, $n, PHP_INT_MAX));
        $dist[0][0] = $grid[0][0]; // starting cell cost

        // Deque for 0-1 BFS
        $deque = new SplDoublyLinkedList();
        $deque->push([0, 0]);

        while (!$deque->isEmpty()) {
            list($x, $y) = $deque->shift();

            foreach ($dirs as $dir) {
                $nx = $x + $dir[0];
                $ny = $y + $dir[1];

                if ($nx < 0 || $nx >= $m || $ny < 0 || $ny >= $n) {
                    continue;
                }

                $newCost = $dist[$x][$y] + $grid[$nx][$ny];

                if ($newCost < $dist[$nx][$ny]) {
                    $dist[$nx][$ny] = $newCost;
                    if ($grid[$nx][$ny] == 0) {
                        // 0-cost edge → push to front
                        $deque->unshift([$nx, $ny]);
                    } else {
                        // 1-cost edge → push to back
                        $deque->push([$nx, $ny]);
                    }
                }
            }
        }

        // We need to end with health >= 1, so loss must be <= health - 1
        return $dist[$m-1][$n-1] < $health;
    }
}
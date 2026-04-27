<?php

class Solution {
    private int $m;
    private int $n;
    private array $grid;

    // Directions: up, right, down, left
    private array $dirs = [[-1, 0], [0, 1], [1, 0], [0, -1]];

    // For each street type (1-6), list of directions it connects to
    // Up:0, Right:1, Down:2, Left:3
    private array $connections = [
        1 => [1, 3],      // left and right
        2 => [0, 2],      // up and down
        3 => [2, 3],      // down and left
        4 => [1, 2],      // right and down
        5 => [0, 3],      // up and left
        6 => [0, 1]       // up and right
    ];

    // Inverse mapping: from direction to required connection in neighbor
    // If we go from current cell to neighbor in direction d,
    // neighbor must have the opposite direction in its connections
    private array $opposite = [2, 3, 0, 1]; // opposite[0]=2 (up<->down), etc.

    /**
     * @param Integer[][] $grid
     * @return Boolean
     */
    function hasValidPath(array $grid): bool
    {
        $this->grid = $grid;
        $this->m = count($grid);
        $this->n = count($grid[0]);

        $visited = array_fill(0, $this->m, array_fill(0, $this->n, false));
        return $this->dfs(0, 0, $visited);
    }

    /**
     * @param $r
     * @param $c
     * @param $visited
     * @return bool
     */
    private function dfs($r, $c, &$visited): bool
    {
        if ($r == $this->m - 1 && $c == $this->n - 1) {
            return true;
        }

        $visited[$r][$c] = true;
        $streetType = $this->grid[$r][$c];

        foreach ($this->connections[$streetType] as $dirIdx) {
            $nr = $r + $this->dirs[$dirIdx][0];
            $nc = $c + $this->dirs[$dirIdx][1];

            if ($nr >= 0 && $nr < $this->m && $nc >= 0 && $nc < $this->n && !$visited[$nr][$nc]) {
                $neighborType = $this->grid[$nr][$nc];
                $neighborConnections = $this->connections[$neighborType];
                $requiredConnection = $this->opposite[$dirIdx];

                if (in_array($requiredConnection, $neighborConnections)) {
                    if ($this->dfs($nr, $nc, $visited)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}
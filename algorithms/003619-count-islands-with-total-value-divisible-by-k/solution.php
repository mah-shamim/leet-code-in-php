<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $k
     * @return Integer
     */
    function countIslands(array $grid, int $k): int
    {
        $m = count($grid);
        $n = count($grid[0]);
        $answer = 0;

        $directions = [
            [1, 0],
            [-1, 0],
            [0, 1],
            [0, -1],
        ];

        for ($r = 0; $r < $m; $r++) {
            for ($c = 0; $c < $n; $c++) {
                if ($grid[$r][$c] <= 0) {
                    continue;
                }

                $sum = $grid[$r][$c];
                $grid[$r][$c] = 0; // mark visited

                $stack = [[$r, $c]];

                while (!empty($stack)) {
                    [$cr, $cc] = array_pop($stack);

                    foreach ($directions as [$dr, $dc]) {
                        $nr = $cr + $dr;
                        $nc = $cc + $dc;

                        if ($nr < 0 || $nr >= $m || $nc < 0 || $nc >= $n) {
                            continue;
                        }

                        if ($grid[$nr][$nc] <= 0) {
                            continue;
                        }

                        $sum += $grid[$nr][$nc];
                        $grid[$nr][$nc] = 0; // mark visited
                        $stack[] = [$nr, $nc];
                    }
                }

                if ($sum % $k === 0) {
                    $answer++;
                }
            }
        }

        return $answer;
    }
}
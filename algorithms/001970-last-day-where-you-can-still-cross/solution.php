<?php

class Solution {
    private int $row;
    private int $col;
    private array $cells;

    /**
     * @param Integer $row
     * @param Integer $col
     * @param Integer[][] $cells
     * @return Integer
     */
    function latestDayToCross(int $row, int $col, array $cells): int
    {
        $this->row = $row;
        $this->col = $col;
        $this->cells = $cells;

        $left = 1;
        $right = count($cells);
        $answer = 0;

        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);

            if ($this->canCross($mid)) {
                $answer = $mid;
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $answer;
    }

    /**
     * @param int $day
     * @return bool
     */
    private function canCross(int $day): bool
    {
        // Initialize grid with land (0)
        $grid = array_fill(0, $this->row, array_fill(0, $this->col, 0));

        // Flood cells for given day
        for ($i = 0; $i < $day; $i++) {
            [$r, $c] = $this->cells[$i];
            $grid[$r - 1][$c - 1] = 1;
        }

        $queue = new SplQueue();
        $visited = array_fill(0, $this->row, array_fill(0, $this->col, false));

        // Start BFS from all land cells in the top row
        for ($c = 0; $c < $this->col; $c++) {
            if ($grid[0][$c] === 0) {
                $queue->enqueue([0, $c]);
                $visited[0][$c] = true;
            }
        }

        $dirs = [[1, 0], [-1, 0], [0, 1], [0, -1]];

        while (!$queue->isEmpty()) {
            [$r, $c] = $queue->dequeue();

            // Reached bottom row
            if ($r === $this->row - 1) {
                return true;
            }

            foreach ($dirs as [$dr, $dc]) {
                $nr = $r + $dr;
                $nc = $c + $dc;

                if (
                    $nr >= 0 && $nr < $this->row &&
                    $nc >= 0 && $nc < $this->col &&
                    !$visited[$nr][$nc] &&
                    $grid[$nr][$nc] === 0
                ) {
                    $visited[$nr][$nc] = true;
                    $queue->enqueue([$nr, $nc]);
                }
            }
        }

        return false;
    }
}
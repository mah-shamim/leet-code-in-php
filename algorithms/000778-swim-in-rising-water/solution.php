<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function swimInWater($grid) {
        $n = count($grid);
        $left = 0;
        $right = $n * $n - 1;

        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($this->canReach($grid, $mid, $n)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        return $left;
    }

    /**
     * @param $grid
     * @param $time
     * @param $n
     * @return bool
     */
    private function canReach($grid, $time, $n) {
        if ($grid[0][0] > $time) {
            return false;
        }
        $visited = array_fill(0, $n, array_fill(0, $n, false));
        $queue = new SplQueue();
        $queue->enqueue([0, 0]);
        $visited[0][0] = true;
        $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]];

        while (!$queue->isEmpty()) {
            list($i, $j) = $queue->dequeue();
            if ($i == $n - 1 && $j == $n - 1) {
                return true;
            }
            foreach ($directions as $dir) {
                $x = $i + $dir[0];
                $y = $j + $dir[1];
                if ($x >= 0 && $x < $n && $y >= 0 && $y < $n && !$visited[$x][$y] && $grid[$x][$y] <= $time) {
                    $visited[$x][$y] = true;
                    $queue->enqueue([$x, $y]);
                }
            }
        }
        return false;
    }
}
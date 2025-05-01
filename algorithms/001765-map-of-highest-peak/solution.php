<?php

class Solution {

    /**
     * @param Integer[][] $isWater
     * @return Integer[][]
     */
    function highestPeak($isWater) {
        $dirs = [
            [0, 1], [1, 0], [0, -1], [-1, 0]
        ];
        $m = count($isWater);
        $n = count($isWater[0]);
        $ans = array_fill(0, $m, array_fill(0, $n, -1));
        $q = new SplQueue();

        // Initialize the queue with water cells and mark their height as 0
        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                if ($isWater[$i][$j] == 1) {
                    $q->enqueue([$i, $j]);
                    $ans[$i][$j] = 0;
                }
            }
        }

        // BFS to find the highest peak
        while (!$q->isEmpty()) {
            list($i, $j) = $q->dequeue();
            foreach ($dirs as $dir) {
                $dx = $dir[0];
                $dy = $dir[1];
                $x = $i + $dx;
                $y = $j + $dy;
                if ($x < 0 || $x == $m || $y < 0 || $y == $n) continue;
                if ($ans[$x][$y] != -1) continue;
                $ans[$x][$y] = $ans[$i][$j] + 1;
                $q->enqueue([$x, $y]);
            }
        }

        return $ans;
    }
}
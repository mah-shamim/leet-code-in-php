<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer $time
     * @param Integer $change
     * @return Integer
     */
    function secondMinimum($n, $edges, $time, $change) {
        $graph = array_fill(0, $n + 1, []);
        $queue = [];
        $queue[] = [1, 0]; // initial position

        // minTime[i][0] := the first minimum time to reach the node i
        // minTime[i][1] := the second minimum time to reach the node i
        $minTime = array_fill(0, $n + 1, [PHP_INT_MAX, PHP_INT_MAX]);
        $minTime[1][0] = 0;

        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $graph[$u][] = $v;
            $graph[$v][] = $u;
        }

        while (!empty($queue)) {
            [$i, $prevTime] = array_shift($queue);
            // Start from green.
            // If `numChangeSignal` is odd, now red.
            // If `numChangeSignal` is even, now green.
            $numChangeSignal = intdiv($prevTime, $change);
            $waitTime = $numChangeSignal % 2 === 0 ? 0 : $change - $prevTime % $change;
            $newTime = $prevTime + $waitTime + $time;

            foreach ($graph[$i] as $j) {
                if ($newTime < $minTime[$j][0]) {
                    $minTime[$j][0] = $newTime;
                    $queue[] = [$j, $newTime];
                } elseif ($minTime[$j][0] < $newTime && $newTime < $minTime[$j][1]) {
                    if ($j === $n) {
                        return $newTime;
                    }
                    $minTime[$j][1] = $newTime;
                    $queue[] = [$j, $newTime];
                }
            }
        }

        throw new Exception("Unable to find the second minimum time");
    }
}
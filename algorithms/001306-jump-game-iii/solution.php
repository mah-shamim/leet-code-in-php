<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $start
     * @return Boolean
     */
    function canReach(array $arr, int $start): bool
    {
        $n = count($arr);
        $visited = array_fill(0, $n, false);
        $queue = [$start];
        $visited[$start] = true;

        while (!empty($queue)) {
            $i = array_shift($queue);

            if ($arr[$i] == 0) {
                return true;
            }

            $forward = $i + $arr[$i];
            $backward = $i - $arr[$i];

            if ($forward < $n && !$visited[$forward]) {
                $visited[$forward] = true;
                $queue[] = $forward;
            }

            if ($backward >= 0 && !$visited[$backward]) {
                $visited[$backward] = true;
                $queue[] = $backward;
            }
        }

        return false;
    }
}
<?php

class Solution {

    /**
     * @param Integer $mountainHeight
     * @param Integer[] $workerTimes
     * @return Integer
     */
    function minNumberOfSeconds(int $mountainHeight, array $workerTimes): int
    {
        $maxWT = max($workerTimes);
        // Upper bound: if a single worker with the largest time does all the work
        $high = $maxWT * $mountainHeight * ($mountainHeight + 1) / 2;
        $low = 1;

        while ($low < $high) {
            $mid = intdiv($low + $high, 2);
            if ($this->canReduce($mid, $mountainHeight, $workerTimes)) {
                $high = $mid;
            } else {
                $low = $mid + 1;
            }
        }
        return $low;
    }

    /**
     * Check whether it is possible to reduce the mountain height to zero within T seconds.
     *
     * @param int $T
     * @param int $H
     * @param array $workerTimes
     * @return bool
     */
    function canReduce(int $T, int $H, array $workerTimes): bool {
        $total = 0;
        foreach ($workerTimes as $w) {
            // Binary search the maximum x for this worker such that w * x*(x+1)/2 <= T
            $left = 0;
            $right = $H;
            $maxX = 0;
            while ($left <= $right) {
                $midX = intdiv($left + $right, 2);
                $product = $w * $midX * ($midX + 1);
                $time = intdiv($product, 2); // always integer because midX*(midX+1) is even
                if ($time <= $T) {
                    $maxX = $midX;
                    $left = $midX + 1;
                } else {
                    $right = $midX - 1;
                }
            }
            $total += $maxX;
            if ($total >= $H) {
                return true; // early exit
            }
        }
        return $total >= $H;
    }
}
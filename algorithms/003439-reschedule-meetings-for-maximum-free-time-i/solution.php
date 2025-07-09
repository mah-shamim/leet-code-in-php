<?php

class Solution {

    /**
     * @param Integer $eventTime
     * @param Integer $k
     * @param Integer[] $startTime
     * @param Integer[] $endTime
     * @return Integer
     */
    function maxFreeTime($eventTime, $k, $startTime, $endTime) {
        $n = count($startTime);
        $gaps = array();
        $gaps[] = $startTime[0];
        for ($i = 1; $i < $n; $i++) {
            $gaps[] = $startTime[$i] - $endTime[$i-1];
        }
        $gaps[] = $eventTime - $endTime[$n-1];

        $L = min($k + 1, $n + 1);
        if ($L == 0) {
            return 0;
        }

        $current_sum = 0;
        for ($i = 0; $i < $L; $i++) {
            $current_sum += $gaps[$i];
        }
        $max_sum = $current_sum;

        $total_gaps = $n + 1;
        for ($i = $L; $i < $total_gaps; $i++) {
            $current_sum = $current_sum - $gaps[$i - $L] + $gaps[$i];
            if ($current_sum > $max_sum) {
                $max_sum = $current_sum;
            }
        }

        return $max_sum;
    }
}
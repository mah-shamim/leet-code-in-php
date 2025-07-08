<?php

class Solution {

    /**
     * @param Integer[][] $events
     * @param Integer $k
     * @return Integer
     */
    function maxValue($events, $k) {
        $n = count($events);
        if ($n == 0 || $k == 0) {
            return 0;
        }

        usort($events, function($a, $b) {
            return $a[1] - $b[1];
        });

        $endDays = array_column($events, 1);
        $prevIndex = array_fill(0, $n, -1);
        for ($i = 1; $i < $n; $i++) {
            $left = 0;
            $right = $i - 1;
            while ($left <= $right) {
                $mid = intdiv($left + $right, 2);
                if ($endDays[$mid] < $events[$i][0]) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }
            $prevIndex[$i] = $right;
        }

        $dp = array_fill(0, $n, array_fill(0, $k + 1, 0));
        for ($j = 1; $j <= $k; $j++) {
            $dp[0][$j] = $events[0][2];
        }

        for ($j = 1; $j <= $k; $j++) {
            for ($i = 1; $i < $n; $i++) {
                $dp[$i][$j] = $dp[$i - 1][$j];
                $prevVal = 0;
                if ($prevIndex[$i] != -1) {
                    $prevVal = $dp[$prevIndex[$i]][$j - 1];
                }
                $currentOption = $events[$i][2] + $prevVal;
                if ($currentOption > $dp[$i][$j]) {
                    $dp[$i][$j] = $currentOption;
                }
            }
        }

        $ans = 0;
        for ($j = 0; $j <= $k; $j++) {
            if ($dp[$n - 1][$j] > $ans) {
                $ans = $dp[$n - 1][$j];
            }
        }

        return $ans;
    }
}
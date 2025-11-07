<?php

class Solution {

    /**
     * @param Integer[] $stations
     * @param Integer $r
     * @param Integer $k
     * @return Integer
     */
    function maxPower($stations, $r, $k) {
        $n = count($stations);

        // Step 1: Calculate initial power using prefix sum
        $prefix = array_fill(0, $n + 1, 0);
        for ($i = 0; $i < $n; $i++) {
            $left = max(0, $i - $r);
            $right = min($n - 1, $i + $r);
            $prefix[$left] += $stations[$i];
            $prefix[$right + 1] -= $stations[$i];
        }

        $power = array_fill(0, $n, 0);
        $power[0] = $prefix[0];
        for ($i = 1; $i < $n; $i++) {
            $power[$i] = $power[$i - 1] + $prefix[$i];
        }

        // Step 2: Binary search for maximum minimum power
        $left = 0;
        $right = max($power) + $k;
        $answer = 0;

        while ($left <= $right) {
            $mid = (int)(($left + $right) / 2);

            if ($this->isPossible($power, $r, $k, $mid)) {
                $answer = $mid;
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $answer;
    }

    /**
     * @param $initialPower
     * @param $r
     * @param $k
     * @param $target
     * @return bool
     */
    private function isPossible($initialPower, $r, $k, $target) {
        $n = count($initialPower);
        $power = $initialPower;
        $add = array_fill(0, $n + 1, 0);
        $currAdd = 0;
        $stationsUsed = 0;

        for ($i = 0; $i < $n; $i++) {
            // Remove additions that are out of range
            if ($i > $r) {
                $currAdd -= $add[$i - $r - 1];
            }

            $currentPower = $power[$i] + $currAdd;

            if ($currentPower < $target) {
                $needed = $target - $currentPower;
                if ($needed > $k - $stationsUsed) {
                    return false;
                }

                $pos = min($n - 1, $i + $r);
                $add[$pos] += $needed;
                $currAdd += $needed;
                $stationsUsed += $needed;
            }
        }

        return true;
    }
}
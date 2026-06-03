<?php

class Solution {

    /**
     * @param Integer[] $landStartTime
     * @param Integer[] $landDuration
     * @param Integer[] $waterStartTime
     * @param Integer[] $waterDuration
     * @return Integer
     */
    function earliestFinishTime(array $landStartTime, array $landDuration, array $waterStartTime, array $waterDuration): int
    {
        $n = count($landStartTime);
        $m = count($waterStartTime);

        // Pair start and duration for both
        $land = [];
        for ($i = 0; $i < $n; $i++) {
            $land[] = [$landStartTime[$i], $landDuration[$i]];
        }
        $water = [];
        for ($j = 0; $j < $m; $j++) {
            $water[] = [$waterStartTime[$j], $waterDuration[$j]];
        }

        // Sort by start time
        usort($land, fn($a, $b) => $a[0] <=> $b[0]);
        usort($water, fn($a, $b) => $a[0] <=> $b[0]);

        // Preprocess water rides
        $waterStart = array_column($water, 0);
        $waterDuration = array_column($water, 1);
        $waterFinish = array_map(fn($s, $d) => $s + $d, $waterStart, $waterDuration);

        // Prefix min duration
        $prefixMinDuration = [];
        $minDur = PHP_INT_MAX;
        for ($i = 0; $i < $m; $i++) {
            $minDur = min($minDur, $waterDuration[$i]);
            $prefixMinDuration[$i] = $minDur;
        }

        // Suffix min finish time
        $suffixMinFinish = [];
        $minFinish = PHP_INT_MAX;
        for ($i = $m - 1; $i >= 0; $i--) {
            $minFinish = min($minFinish, $waterFinish[$i]);
            $suffixMinFinish[$i] = $minFinish;
        }

        // First order: land -> water
        $ans = PHP_INT_MAX;
        for ($i = 0; $i < $n; $i++) {
            $landFinish = $land[$i][0] + $land[$i][1];

            // Binary search in waterStart for first > landFinish
            $left = 0;
            $right = $m - 1;
            $pos = $m; // if all start <= landFinish, pos = m means no group B
            while ($left <= $right) {
                $mid = intdiv($left + $right, 2);
                if ($waterStart[$mid] > $landFinish) {
                    $pos = $mid;
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            }

            $groupA = [];
            if ($pos > 0) {
                $minDurInA = $prefixMinDuration[$pos - 1];
                $groupA[] = $landFinish + $minDurInA;
            }

            $groupB = [];
            if ($pos < $m) {
                $groupB[] = $suffixMinFinish[$pos];
            }

            $bestForThisLand = min(
                $groupA ? min($groupA) : PHP_INT_MAX,
                $groupB ? min($groupB) : PHP_INT_MAX
            );
            $ans = min($ans, $bestForThisLand);
        }

        // Second order: water -> land
        // Preprocess land rides similarly
        $landStart = array_column($land, 0);
        $landDuration = array_column($land, 1);
        $landFinish = array_map(fn($s, $d) => $s + $d, $landStart, $landDuration);

        $prefixMinDurationLand = [];
        $minDurLand = PHP_INT_MAX;
        for ($i = 0; $i < $n; $i++) {
            $minDurLand = min($minDurLand, $landDuration[$i]);
            $prefixMinDurationLand[$i] = $minDurLand;
        }

        $suffixMinFinishLand = [];
        $minFinishLand = PHP_INT_MAX;
        for ($i = $n - 1; $i >= 0; $i--) {
            $minFinishLand = min($minFinishLand, $landFinish[$i]);
            $suffixMinFinishLand[$i] = $minFinishLand;
        }

        for ($j = 0; $j < $m; $j++) {
            $waterFinish = $water[$j][0] + $water[$j][1];

            // Binary search in landStart for first > waterFinish
            $left = 0;
            $right = $n - 1;
            $pos = $n;
            while ($left <= $right) {
                $mid = intdiv($left + $right, 2);
                if ($landStart[$mid] > $waterFinish) {
                    $pos = $mid;
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            }

            $groupA = [];
            if ($pos > 0) {
                $minDurInA = $prefixMinDurationLand[$pos - 1];
                $groupA[] = $waterFinish + $minDurInA;
            }

            $groupB = [];
            if ($pos < $n) {
                $groupB[] = $suffixMinFinishLand[$pos];
            }

            $bestForThisWater = min(
                $groupA ? min($groupA) : PHP_INT_MAX,
                $groupB ? min($groupB) : PHP_INT_MAX
            );
            $ans = min($ans, $bestForThisWater);
        }

        return $ans;
    }
}
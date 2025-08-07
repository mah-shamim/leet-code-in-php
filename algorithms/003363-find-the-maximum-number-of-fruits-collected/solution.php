<?php

class Solution {

    /**
     * @param Integer[][] $fruits
     * @return Integer
     */
    function maxCollectedFruits($fruits) {
        $n = count($fruits);
        $diagonalSum = 0;
        for ($i = 0; $i < $n; $i++) {
            $diagonalSum += $fruits[$i][$i];
        }

        $dp2_prev = array_fill(0, $n, -1);
        $dp2_prev[$n-1] = $fruits[0][$n-1];

        for ($k = 1; $k < $n; $k++) {
            $dp2_curr = array_fill(0, $n, -1);
            $minJ = max(0, $n-1 - $k);
            $maxJ = min($n-1, $n-1 + $k);
            for ($j = $minJ; $j <= $maxJ; $j++) {
                $best = -1;
                for ($d = -1; $d <= 1; $d++) {
                    $prevJ = $j + $d;
                    if ($prevJ >= 0 && $prevJ < $n && $dp2_prev[$prevJ] != -1) {
                        if ($best < $dp2_prev[$prevJ]) {
                            $best = $dp2_prev[$prevJ];
                        }
                    }
                }
                if ($best == -1) {
                    continue;
                }
                $add = ($j == $k) ? 0 : $fruits[$k][$j];
                $dp2_curr[$j] = $best + $add;
            }
            $dp2_prev = $dp2_curr;
        }
        $totalSecond = $dp2_prev[$n-1] == -1 ? 0 : $dp2_prev[$n-1];

        $dp3_prev = array_fill(0, $n, -1);
        $dp3_prev[$n-1] = $fruits[$n-1][0];
        for ($k = 1; $k < $n; $k++) {
            $dp3_curr = array_fill(0, $n, -1);
            $minI = max(0, $n-1 - $k);
            $maxI = min($n-1, $n-1 + $k);
            for ($i = $minI; $i <= $maxI; $i++) {
                $best = -1;
                for ($d = -1; $d <= 1; $d++) {
                    $prevI = $i + $d;
                    if ($prevI >= 0 && $prevI < $n && $dp3_prev[$prevI] != -1) {
                        if ($best < $dp3_prev[$prevI]) {
                            $best = $dp3_prev[$prevI];
                        }
                    }
                }
                if ($best == -1) {
                    continue;
                }
                $add = ($i == $k) ? 0 : $fruits[$i][$k];
                $dp3_curr[$i] = $best + $add;
            }
            $dp3_prev = $dp3_curr;
        }
        $totalThird = $dp3_prev[$n-1] == -1 ? 0 : $dp3_prev[$n-1];

        return $diagonalSum + $totalSecond + $totalThird;
    }
}
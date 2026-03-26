<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Boolean
     */
    function canPartitionGrid(array $grid): bool
    {
        $m = count($grid);
        $n = count($grid[0]);
        $total = 0;
        for ($i = 0; $i < $m; $i++) {
            $total += array_sum($grid[$i]);
        }

        // ---------- row prefix and row first/last ----------
        $rowSum = array_fill(0, $m, 0);
        $rowFirst = array_fill(0, $m, 0);
        $rowLast = array_fill(0, $m, 0);
        for ($i = 0; $i < $m; $i++) {
            $rowSum[$i] = array_sum($grid[$i]);
            $rowFirst[$i] = $grid[$i][0];
            $rowLast[$i] = $grid[$i][$n - 1];
        }
        $rowPref = [0];
        for ($i = 0; $i < $m; $i++) {
            $rowPref[] = $rowPref[$i] + $rowSum[$i];
        }

        // ---------- total frequency ----------
        $totalFreq = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $v = $grid[$i][$j];
                $totalFreq[$v] = ($totalFreq[$v] ?? 0) + 1;
            }
        }

        // ---------- horizontal cuts ----------
        $freqTop = [];
        $freqBottom = $totalFreq; // copy
        for ($i = 1; $i < $m; $i++) {
            $rowIdx = $i - 1;
            // add row to top, remove from bottom
            foreach ($grid[$rowIdx] as $v) {
                $freqTop[$v] = ($freqTop[$v] ?? 0) + 1;
            }
            foreach ($grid[$rowIdx] as $v) {
                if (--$freqBottom[$v] == 0) {
                    unset($freqBottom[$v]);
                }
            }
            $S1 = $rowPref[$i];
            $S2 = $total - $S1;

            if ($S1 == $S2) {
                return true;
            }
            if ($S1 > $S2) {
                $v = $S1 - $S2;
                if (isset($freqTop[$v])) {
                    $rows = $i;
                    $cols = $n;
                    if ($rows == 1) {
                        // single row
                        if ($v == $rowFirst[0] || $v == $rowLast[0]) {
                            return true;
                        }
                    } elseif ($cols == 1) {
                        // single column (n == 1)
                        if ($v == $grid[0][0] || $v == $grid[$i - 1][0]) {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
            } else { // $S2 > $S1
                $v = $S2 - $S1;
                if (isset($freqBottom[$v])) {
                    $rows = $m - $i;
                    $cols = $n;
                    if ($rows == 1) {
                        // single row
                        if ($v == $rowFirst[$m - 1] || $v == $rowLast[$m - 1]) {
                            return true;
                        }
                    } elseif ($cols == 1) {
                        // single column (n == 1)
                        if ($v == $grid[$i][0] || $v == $grid[$m - 1][0]) {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
            }
        }

        // ---------- column prefix and column first/last ----------
        $colSum = array_fill(0, $n, 0);
        $colFirst = array_fill(0, $n, 0);
        $colLast = array_fill(0, $n, 0);
        for ($j = 0; $j < $n; $j++) {
            $colFirst[$j] = $grid[0][$j];
            $colLast[$j] = $grid[$m - 1][$j];
            for ($i = 0; $i < $m; $i++) {
                $colSum[$j] += $grid[$i][$j];
            }
        }
        $colPref = [0];
        for ($j = 0; $j < $n; $j++) {
            $colPref[] = $colPref[$j] + $colSum[$j];
        }

        // ---------- vertical cuts ----------
        $freqLeft = [];
        $freqRight = $totalFreq; // copy
        for ($j = 1; $j < $n; $j++) {
            $colIdx = $j - 1;
            // add column to left, remove from right
            for ($i = 0; $i < $m; $i++) {
                $v = $grid[$i][$colIdx];
                $freqLeft[$v] = ($freqLeft[$v] ?? 0) + 1;
            }
            for ($i = 0; $i < $m; $i++) {
                $v = $grid[$i][$colIdx];
                if (--$freqRight[$v] == 0) {
                    unset($freqRight[$v]);
                }
            }
            $S1 = $colPref[$j];
            $S2 = $total - $S1;

            if ($S1 == $S2) {
                return true;
            }
            if ($S1 > $S2) {
                $v = $S1 - $S2;
                if (isset($freqLeft[$v])) {
                    $rows = $m;
                    $cols = $j;
                    if ($cols == 1) {
                        // single column
                        if ($v == $colFirst[0] || $v == $colLast[0]) {
                            return true;
                        }
                    } elseif ($rows == 1) {
                        // single row (m == 1)
                        if ($v == $grid[0][0] || $v == $grid[0][$j - 1]) {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
            } else { // $S2 > $S1
                $v = $S2 - $S1;
                if (isset($freqRight[$v])) {
                    $rows = $m;
                    $cols = $n - $j;
                    if ($cols == 1) {
                        // single column
                        if ($v == $colFirst[$n - 1] || $v == $colLast[$n - 1]) {
                            return true;
                        }
                    } elseif ($rows == 1) {
                        // single row (m == 1)
                        if ($v == $grid[0][$j] || $v == $grid[0][$n - 1]) {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}
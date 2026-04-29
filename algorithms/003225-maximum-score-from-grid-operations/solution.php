<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maximumScore(array $grid): int
    {
        $n = count($grid);

        // Build prefix sums for each column
        $prefix = array_fill(0, $n, array_fill(0, $n + 1, 0));
        for ($j = 0; $j < $n; $j++) {
            for ($i = 0; $i < $n; $i++) {
                $prefix[$j][$i + 1] = $prefix[$j][$i] + $grid[$i][$j];
            }
        }

        // DP arrays
        $prevPick = array_fill(0, $n + 1, 0);
        $prevSkip = array_fill(0, $n + 1, 0);

        for ($j = 1; $j < $n; $j++) {
            $currPick = array_fill(0, $n + 1, 0);
            $currSkip = array_fill(0, $n + 1, 0);

            for ($curr = 0; $curr <= $n; $curr++) {
                for ($prev = 0; $prev <= $n; $prev++) {
                    if ($curr > $prev) {
                        // Current bottom is deeper than previous bottom
                        // Add the cells between prev and curr in column j-1
                        $score = $prefix[$j - 1][$curr] - $prefix[$j - 1][$prev];
                        $currPick[$curr] = max($currPick[$curr], $prevSkip[$prev] + $score);
                        $currSkip[$curr] = max($currSkip[$curr], $prevSkip[$prev] + $score);
                    } else {
                        // Previous bottom is deeper than current bottom
                        // Add the cells between curr and prev in column j
                        $score = $prefix[$j][$prev] - $prefix[$j][$curr];
                        $currPick[$curr] = max($currPick[$curr], $prevPick[$prev] + $score);
                        $currSkip[$curr] = max($currSkip[$curr], $prevPick[$prev]);
                    }
                }
            }

            $prevPick = $currPick;
            $prevSkip = $currSkip;
        }

        return max($prevPick);
    }
}
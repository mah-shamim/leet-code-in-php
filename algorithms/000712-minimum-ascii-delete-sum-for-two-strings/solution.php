<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Integer
     */
    function minimumDeleteSum($s1, $s2) {
        $m = strlen($s1);
        $n = strlen($s2);

        // Use two rows to save space
        $prev = array_fill(0, $n + 1, 0);
        $curr = array_fill(0, $n + 1, 0);

        // Initialize first row (empty s1)
        for ($j = 1; $j <= $n; $j++) {
            $prev[$j] = $prev[$j - 1] + ord($s2[$j - 1]);
        }

        for ($i = 1; $i <= $m; $i++) {
            // Initialize current row for empty s2
            $curr[0] = $prev[0] + ord($s1[$i - 1]);

            for ($j = 1; $j <= $n; $j++) {
                if ($s1[$i - 1] == $s2[$j - 1]) {
                    $curr[$j] = $prev[$j - 1];
                } else {
                    $curr[$j] = min(
                        $prev[$j] + ord($s1[$i - 1]),
                        $curr[$j - 1] + ord($s2[$j - 1])
                    );
                }
            }

            // Swap rows for next iteration
            $temp = $prev;
            $prev = $curr;
            $curr = $temp;
        }

        return $prev[$n];
    }
}
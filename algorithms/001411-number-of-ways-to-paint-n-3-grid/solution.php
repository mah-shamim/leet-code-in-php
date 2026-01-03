<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numOfWays($n) {
        $MOD = 1000000007;

        // Generate all 12 valid color patterns for a row (3 colors: 0,1,2)
        $patterns = [];
        for ($a = 0; $a < 3; $a++) {
            for ($b = 0; $b < 3; $b++) {
                if ($a == $b) continue;
                for ($c = 0; $c < 3; $c++) {
                    if ($b == $c) continue;
                    $patterns[] = [$a, $b, $c];
                }
            }
        }
        $m = 12; // number of patterns

        // Build transition matrix: trans[i][j] = 1 if patterns i and j are compatible
        $trans = array_fill(0, $m, array_fill(0, $m, 0));
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $p1 = $patterns[$i];
                $p2 = $patterns[$j];
                if ($p1[0] != $p2[0] && $p1[1] != $p2[1] && $p1[2] != $p2[2]) {
                    $trans[$i][$j] = 1;
                }
            }
        }

        // dp[j] = number of ways to paint up to current row, ending with pattern j
        $dp = array_fill(0, $m, 1); // first row: each pattern once

        // For each additional row
        for ($row = 2; $row <= $n; $row++) {
            $next = array_fill(0, $m, 0);
            for ($j = 0; $j < $m; $j++) {
                for ($k = 0; $k < $m; $k++) {
                    if ($trans[$k][$j]) {
                        $next[$j] = ($next[$j] + $dp[$k]) % $MOD;
                    }
                }
            }
            $dp = $next;
        }

        // Sum over all patterns for the last row
        $ans = 0;
        for ($i = 0; $i < $m; $i++) {
            $ans = ($ans + $dp[$i]) % $MOD;
        }
        return $ans;
    }
}
<?php

class Solution {
    const MOD = 1000000007;

    /**
     * @param Integer $n
     * @param Integer $l
     * @param Integer $r
     * @return Integer
     */
    function zigZagArrays(int $n, int $l, int $r): int
    {
        $m = $r - $l + 1;

        // Initialize dp for length 1
        $dpUp = array_fill(0, $m, 0);
        $dpDown = array_fill(0, $m, 0);
        for ($i = 0; $i < $m; $i++) {
            $dpUp[$i] = 1;
            $dpDown[$i] = 1;
        }

        // For length from 2 to n
        for ($len = 2; $len <= $n; $len++) {
            // Prefix sums for dpDown (for building up transitions)
            $prefixDown = array_fill(0, $m, 0);
            $prefixDown[0] = $dpDown[0];
            for ($i = 1; $i < $m; $i++) {
                $prefixDown[$i] = ($prefixDown[$i - 1] + $dpDown[$i]) % self::MOD;
            }

            // Suffix sums for dpUp (for building down transitions)
            $suffixUp = array_fill(0, $m, 0);
            $suffixUp[$m - 1] = $dpUp[$m - 1];
            for ($i = $m - 2; $i >= 0; $i--) {
                $suffixUp[$i] = ($suffixUp[$i + 1] + $dpUp[$i]) % self::MOD;
            }

            $newUp = array_fill(0, $m, 0);
            $newDown = array_fill(0, $m, 0);

            // Build newUp: from down to up, need previous < current
            for ($i = 0; $i < $m; $i++) {
                if ($i > 0) {
                    $newUp[$i] = $prefixDown[$i - 1];
                }
            }

            // Build newDown: from up to down, need previous > current
            for ($i = 0; $i < $m; $i++) {
                if ($i < $m - 1) {
                    $newDown[$i] = $suffixUp[$i + 1];
                }
            }

            $dpUp = $newUp;
            $dpDown = $newDown;
        }

        $total = 0;
        for ($i = 0; $i < $m; $i++) {
            $total = ($total + $dpUp[$i] + $dpDown[$i]) % self::MOD;
        }

        return $total;
    }
}
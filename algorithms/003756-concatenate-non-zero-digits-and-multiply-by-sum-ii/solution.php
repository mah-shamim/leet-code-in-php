<?php

class Solution {

    /**
     * @param String $s
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function sumAndMultiply(string $s, array $queries): array
    {
        $mod = 1000000007;
        $n = strlen($s);

        // Store non-zero digits and their prefix info
        $nonZeroDigits = [];
        $prefixVal = [];   // concatenation value prefix (mod MOD)
        $prefixSum = [0];  // digit sum prefix

        $pow10 = [1];
        for ($i = 1; $i <= $n; $i++) {
            $pow10[$i] = ($pow10[$i-1] * 10) % $mod;
        }

        // Index mapping: first non-zero digit at or after position i
        $nextNonZero = array_fill(0, $n + 1, -1);
        $last = -1;
        for ($i = $n - 1; $i >= 0; $i--) {
            if ($s[$i] != '0') {
                $last = $i;
            }
            $nextNonZero[$i] = $last;
        }

        // Build prefix arrays for non-zero digits
        $pos = []; // store positions of non-zero digits
        foreach (str_split($s) as $i => $ch) {
            if ($ch != '0') {
                $pos[] = $i;
                $digit = intval($ch);
                $nonZeroDigits[] = $digit;

                // concatenation prefix: val = val * 10 + digit
                $newVal = (end($prefixVal) ?: 0);
                $newVal = ($newVal * 10 + $digit) % $mod;
                $prefixVal[] = $newVal;

                // digit sum prefix
                $prefixSum[] = end($prefixSum) + $digit;
            }
        }

        $result = [];
        foreach ($queries as $q) {
            $l = $q[0];
            $r = $q[1];

            // Find first non-zero in [l, r]
            $firstIdx = $nextNonZero[$l];
            if ($firstIdx == -1 || $firstIdx > $r) {
                // No non-zero digit in range
                $result[] = 0;
                continue;
            }

            // Find last non-zero in [l, r] by searching from r backward
            // Since nextNonZero gives the first from a position, we can find by scanning
            // for a simpler approach, do a binary search on positions
            $left = 0;
            $right = count($pos) - 1;
            $firstPosInArr = -1;
            while ($left <= $right) {
                $mid = intdiv($left + $right, 2);
                if ($pos[$mid] >= $l) {
                    $firstPosInArr = $mid;
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            }

            $left = 0;
            $right = count($pos) - 1;
            $lastPosInArr = -1;
            while ($left <= $right) {
                $mid = intdiv($left + $right, 2);
                if ($pos[$mid] <= $r) {
                    $lastPosInArr = $mid;
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }

            if ($firstPosInArr == -1 || $lastPosInArr == -1 || $firstPosInArr > $lastPosInArr) {
                $result[] = 0;
                continue;
            }

            // Get x from prefix concatenation
            if ($firstPosInArr == 0) {
                $x = $prefixVal[$lastPosInArr];
            } else {
                $x = ($prefixVal[$lastPosInArr] -
                        ($prefixVal[$firstPosInArr - 1] * $pow10[$lastPosInArr - $firstPosInArr + 1]) % $mod + $mod) % $mod;
            }

            // Get sum
            $sum = $prefixSum[$lastPosInArr + 1] - $prefixSum[$firstPosInArr];

            $result[] = ($x * ($sum % $mod)) % $mod;
        }

        return $result;
    }
}
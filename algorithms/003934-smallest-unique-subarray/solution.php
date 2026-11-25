<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function smallestUniqueSubarray(array $nums): int
    {
        $n = count($nums);

        $M1 = 1000000007;
        $M2 = 1000000009;
        $B = 911382323;

        $pow1 = array_fill(0, $n + 1, 1);
        $pow2 = array_fill(0, $n + 1, 1);
        $pre1 = array_fill(0, $n + 1, 0);
        $pre2 = array_fill(0, $n + 1, 0);

        for ($i = 0; $i < $n; $i++) {
            $v = $nums[$i] + 1; // avoid zero-value issues

            $pow1[$i + 1] = ($pow1[$i] * $B) % $M1;
            $pow2[$i + 1] = ($pow2[$i] * $B) % $M2;

            $pre1[$i + 1] = (($pre1[$i] * $B) + $v) % $M1;
            $pre2[$i + 1] = (($pre2[$i] * $B) + $v) % $M2;
        }

        $hasUnique = function (int $len) use (
            $n, $pre1, $pre2, $pow1, $pow2, $M1, $M2
        ): bool {
            $freq = [];
            $uniqueCount = 0;

            for ($i = 0; $i + $len <= $n; $i++) {
                $h1 = ($pre1[$i + $len] - (($pre1[$i] * $pow1[$len]) % $M1)) % $M1;
                if ($h1 < 0) {
                    $h1 += $M1;
                }

                $h2 = ($pre2[$i + $len] - (($pre2[$i] * $pow2[$len]) % $M2)) % $M2;
                if ($h2 < 0) {
                    $h2 += $M2;
                }

                $key = $h1 * $M2 + $h2;

                if (!isset($freq[$key])) {
                    $freq[$key] = 1;
                    $uniqueCount++;
                } else {
                    if ($freq[$key] === 1) {
                        $uniqueCount--;
                    }
                    $freq[$key]++;
                }
            }

            return $uniqueCount > 0;
        };

        $left = 1;
        $right = $n;
        $answer = $n;

        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);

            if ($hasUnique($mid)) {
                $answer = $mid;
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }

        return $answer;
    }
}
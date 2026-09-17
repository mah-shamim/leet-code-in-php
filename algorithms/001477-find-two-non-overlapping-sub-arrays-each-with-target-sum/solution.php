<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $target
     * @return Integer
     */
    function minSumOfLengths(array $arr, int $target): int
    {
        $n = count($arr);
        $INF = PHP_INT_MAX;

        // bestEnd[i] = minimum length of a target-sum subarray ending at i
        // bestStart[i] = minimum length of a target-sum subarray starting at i
        $bestEnd = array_fill(0, $n, $INF);
        $bestStart = array_fill(0, $n, $INF);

        $left = 0;
        $sum = 0;

        for ($right = 0; $right < $n; $right++) {
            $sum += $arr[$right];

            while ($left <= $right && $sum > $target) {
                $sum -= $arr[$left];
                $left++;
            }

            if ($sum === $target) {
                $len = $right - $left + 1;
                $bestEnd[$right] = min($bestEnd[$right], $len);
                $bestStart[$left] = min($bestStart[$left], $len);
            }
        }

        // pref[i] = minimum length of target-sum subarray ending at or before i
        $pref = array_fill(0, $n, $INF);
        $cur = $INF;
        for ($i = 0; $i < $n; $i++) {
            $cur = min($cur, $bestEnd[$i]);
            $pref[$i] = $cur;
        }

        // suff[i] = minimum length of target-sum subarray starting at or after i
        $suff = array_fill(0, $n, $INF);
        $cur = $INF;
        for ($i = $n - 1; $i >= 0; $i--) {
            $cur = min($cur, $bestStart[$i]);
            $suff[$i] = $cur;
        }

        $ans = $INF;

        // First subarray ends at or before i, second starts at or after i + 1
        for ($i = 0; $i < $n - 1; $i++) {
            if ($pref[$i] !== $INF && $suff[$i + 1] !== $INF) {
                $ans = min($ans, $pref[$i] + $suff[$i + 1]);
            }
        }

        return $ans === $INF ? -1 : $ans;
    }
}
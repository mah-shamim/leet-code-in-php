<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k1
     * @param Integer $k2
     * @return Integer
     */
    function minSumSquareDiff(array $nums1, array $nums2, int $k1, int $k2): int
    {
        $n = count($nums1);
        $d = [];
        $maxD = 0;

        // k1 and k2 are equivalent: both can reduce an absolute difference by 1.
        $K = $k1 + $k2;

        for ($i = 0; $i < $n; $i++) {
            $diff = abs($nums1[$i] - $nums2[$i]);
            $d[] = $diff;
            $maxD = max($maxD, $diff);
        }

        // Binary search the smallest possible maximum remaining difference.
        $lo = 0;
        $hi = $maxD;

        while ($lo < $hi) {
            $mid = intdiv($lo + $hi, 2);
            $cost = 0;

            foreach ($d as $x) {
                if ($x > $mid) {
                    $cost += $x - $mid;
                    if ($cost > $K) {
                        break;
                    }
                }
            }

            if ($cost <= $K) {
                $hi = $mid;
            } else {
                $lo = $mid + 1;
            }
        }

        $m = $lo;

        // All differences can be reduced to 0.
        if ($m == 0) {
            return 0;
        }

        // Cost to reduce all differences greater than $m down to $m.
        $cost = 0;
        foreach ($d as $x) {
            if ($x > $m) {
                $cost += $x - $m;
            }
        }

        $remain = $K - $cost;
        $ans = 0;

        foreach ($d as $x) {
            if ($x > $m) {
                $ans += $m * $m;
            } else {
                $ans += $x * $x;
            }
        }

        // Remaining operations reduce some values from $m to $m - 1.
        // Decrease in square: m^2 - (m - 1)^2 = 2m - 1.
        $ans -= $remain * (2 * $m - 1);

        return $ans;
    }
}
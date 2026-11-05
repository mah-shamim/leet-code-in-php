<?php

class Solution {

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @param Integer $d
     * @return Integer
     */
    function findTheDistanceValue(array $arr1, array $arr2, int $d): int
    {
        sort($arr2);
        $n = count($arr2);
        $distanceValue = 0;

        foreach ($arr1 as $x) {
            $left = 0;
            $right = $n - 1;
            $pos = $n; // first index where arr2[pos] >= x

            while ($left <= $right) {
                $mid = intdiv($left + $right, 2);

                if ($arr2[$mid] >= $x) {
                    $pos = $mid;
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            }

            $valid = true;

            // Check the closest element on the right side.
            if ($pos < $n && abs($x - $arr2[$pos]) <= $d) {
                $valid = false;
            }

            // Check the closest element on the left side.
            if ($valid && $pos > 0 && abs($x - $arr2[$pos - 1]) <= $d) {
                $valid = false;
            }

            if ($valid) {
                $distanceValue++;
            }
        }

        return $distanceValue;
    }
}
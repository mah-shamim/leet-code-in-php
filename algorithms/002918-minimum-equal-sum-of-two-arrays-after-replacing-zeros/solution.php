<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function minSum($nums1, $nums2) {
        $sum1 = 0;
        $zeros1 = 0;
        foreach ($nums1 as $num) {
            if ($num == 0) {
                $zeros1++;
            } else {
                $sum1 += $num;
            }
        }

        $sum2 = 0;
        $zeros2 = 0;
        foreach ($nums2 as $num) {
            if ($num == 0) {
                $zeros2++;
            } else {
                $sum2 += $num;
            }
        }

        $min1 = ($zeros1 > 0) ? ($sum1 + $zeros1) : $sum1;
        $min2 = ($zeros2 > 0) ? ($sum2 + $zeros2) : $sum2;

        if ($zeros1 > 0 && $zeros2 > 0) {
            return max($min1, $min2);
        } elseif ($zeros1 == 0 && $zeros2 == 0) {
            return ($sum1 == $sum2) ? $sum1 : -1;
        } else {
            if ($zeros1 == 0) {
                $s_fixed = $sum1;
                $other_min = $min2;
            } else {
                $s_fixed = $sum2;
                $other_min = $min1;
            }
            return ($s_fixed >= $other_min) ? $s_fixed : -1;
        }
    }
}
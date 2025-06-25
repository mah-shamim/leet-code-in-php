<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer
     */
    function kthSmallestProduct($nums1, $nums2, $k) {
        $A1 = []; $A2 = [];
        $B1 = []; $B2 = [];

        $this->separate($nums1, $A1, $A2);
        $this->separate($nums2, $B1, $B2);

        $negCount = count($A1) * count($B2) + count($A2) * count($B1);
        $sign = 1;

        if ($k > $negCount) {
            $k -= $negCount;
        } else {
            $k = $negCount - $k + 1;
            $sign = -1;
            list($B1, $B2) = [$B2, $B1];
        }

        $left = 0;
        $right = 10000000000;

        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            $count1 = $this->numProductNoGreaterThan($A1, $B1, $mid);
            $count2 = $this->numProductNoGreaterThan($A2, $B2, $mid);
            $total = $count1 + $count2;
            if ($total >= $k) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }

        return $sign * $left;
    }

    /**
     * @param $arr
     * @param $neg
     * @param $nonNeg
     * @return void
     */
    function separate($arr, &$neg, &$nonNeg) {
        foreach ($arr as $num) {
            if ($num < 0) {
                $neg[] = -$num;
            } else {
                $nonNeg[] = $num;
            }
        }
        $neg = array_reverse($neg);
    }

    /**
     * @param $A
     * @param $B
     * @param $m
     * @return int
     */
    function numProductNoGreaterThan($A, $B, $m) {
        if (empty($A) || empty($B)) {
            return 0;
        }
        $count = 0;
        $j = count($B) - 1;
        foreach ($A as $a) {
            while ($j >= 0 && $a * $B[$j] > $m) {
                $j--;
            }
            $count += $j + 1;
        }
        return $count;
    }
}
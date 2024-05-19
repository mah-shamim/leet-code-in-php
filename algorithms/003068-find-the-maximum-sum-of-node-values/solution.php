<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer[][] $edges
     * @return Integer
     */
    function maximumValueSum($nums, $k, $edges) {
        $maxSum = 0;
        $changedCount = 0;
        $minChangeDiff = PHP_INT_MAX;

        foreach ($nums as $num) {
            $maxSum += max($num, $num ^ $k);
            $changedCount += (($num ^ $k) > $num) ? 1 : 0;
            $minChangeDiff = min($minChangeDiff, abs($num - ($num ^ $k)));
        }

        if ($changedCount % 2 == 0)
            return $maxSum;
        return $maxSum - $minChangeDiff;
    }
}
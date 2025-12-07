<?php

class Solution {

    /**
     * @param Integer $low
     * @param Integer $high
     * @return Integer
     */
    function countOdds($low, $high) {
        // Count odds from 0 to high minus odds from 0 to low-1
        $countToHigh = (int)(($high + 1) / 2);
        $countToLowMinusOne = (int)($low / 2);

        return $countToHigh - $countToLowMinusOne;
    }
}
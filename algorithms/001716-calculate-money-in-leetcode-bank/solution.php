<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function totalMoney($n) {
        $total = 0;
        $weeks = (int)($n / 7);
        $remainingDays = $n % 7;

        for ($week = 0; $week < $weeks; $week++) {
            $start = $week + 1;
            $end = $start + 6;
            $total += (int)(($start + $end) * 7 / 2);
        }

        if ($remainingDays > 0) {
            $start = $weeks + 1;
            $end = $start + $remainingDays - 1;
            $total += (int)(($start + $end) * $remainingDays / 2);
        }

        return $total;
    }
}
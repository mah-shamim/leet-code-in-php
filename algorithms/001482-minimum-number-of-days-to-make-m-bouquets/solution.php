<?php

class Solution {

    /**
     * @param Integer[] $bloomDay
     * @param Integer $m
     * @param Integer $k
     * @return Integer
     */
    function minDays($bloomDay, $m, $k) {
        if (($m * $k) > count($bloomDay)) {
            return -1;
        }

        $start = 0;
        $end = max($bloomDay);
        $minDays = -1;

        while ($start <= $end) {
            $mid = ceil(($start + $end) / 2);

            if ($this->canMakeBouquets($bloomDay, $mid, $k) >= $m) {
                $minDays = $mid;
                $end = $mid - 1;
            } else {
                $start = $mid + 1;
            }
        }

        return $minDays;
    }

    /**
     * @param Integer[] $bloomDay
     * @param Float $mid
     * @param Integer $k
     * @return Integer
     */
    function canMakeBouquets($bloomDay, $mid, $k) {
        $bouquetsMade  = 0;
        $flowersCollected  = 0;

        foreach ($bloomDay as $day) {
            // If the flower is bloomed, add to the set. Else reset the count.
            if ($day <= $mid) {
                $flowersCollected  += 1;
            } else {
                $flowersCollected  = 0;
            }

            if ($flowersCollected  == $k) {
                $bouquetsMade  += 1;
                $flowersCollected  = 0;
            }
        }

        return $bouquetsMade ;
    }
}
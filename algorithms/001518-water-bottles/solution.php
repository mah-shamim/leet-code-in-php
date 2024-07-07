<?php

class Solution {

    /**
     * @param Integer $numBottles
     * @param Integer $numExchange
     * @return Integer
     */
    function numWaterBottles($numBottles, $numExchange) {
        $totalDrunk = 0;
        $emptyBottles = 0;

        while ($numBottles > 0) {
            // Drink all the current full bottles
            $totalDrunk += $numBottles;

            // Collect the empty bottles
            $emptyBottles += $numBottles;

            // Exchange the empty bottles for new full ones
            $numBottles = floor($emptyBottles / $numExchange);
            $emptyBottles = $emptyBottles % $numExchange;
        }

        return $totalDrunk;
    }
}
<?php

class Solution {

    /**
     * @param Integer $numBottles
     * @param Integer $numExchange
     * @return Integer
     */
    function maxBottlesDrunk($numBottles, $numExchange) {
        $totalDrunk = 0;
        $emptyBottles = 0;
        $currentExchange = $numExchange;

        while ($numBottles > 0) {
            // Drink all current full bottles
            $totalDrunk += $numBottles;
            $emptyBottles += $numBottles;
            $numBottles = 0;

            // Exchange empty bottles for full ones if possible
            while ($emptyBottles >= $currentExchange) {
                $emptyBottles -= $currentExchange;
                $numBottles++;
                $currentExchange++;
            }
        }

        return $totalDrunk;
    }
}
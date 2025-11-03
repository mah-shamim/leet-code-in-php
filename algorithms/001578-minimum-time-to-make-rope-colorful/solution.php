<?php

class Solution {

    /**
     * @param String $colors
     * @param Integer[] $neededTime
     * @return Integer
     */
    function minCost($colors, $neededTime) {
        $n = strlen($colors);
        $totalTime = 0;
        $i = 0;

        while ($i < $n) {
            $currentColor = $colors[$i];
            $currentMax = $neededTime[$i];
            $currentSum = $neededTime[$i];
            $j = $i + 1;

            while ($j < $n && $colors[$j] == $currentColor) {
                $currentSum += $neededTime[$j];
                if ($neededTime[$j] > $currentMax) {
                    $currentMax = $neededTime[$j];
                }
                $j++;
            }

            $totalTime += $currentSum - $currentMax;
            $i = $j;
        }

        return $totalTime;
    }
}
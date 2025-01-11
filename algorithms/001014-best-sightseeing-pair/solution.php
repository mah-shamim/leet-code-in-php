<?php

class Solution {

    /**
     * @param Integer[] $values
     * @return Integer
     */
    function maxScoreSightseeingPair($values) {
        $maxScore = 0;
        $maxI = $values[0]; // Track the maximum values[i] + i

        for ($j = 1; $j < count($values); $j++) {
            // Calculate the score for the current pair
            $maxScore = max($maxScore, $maxI + $values[$j] - $j);

            // Update maxI to track the best values[i] + i for the next iteration
            $maxI = max($maxI, $values[$j] + $j);
        }

        return $maxScore;
    }
}
<?php

class Solution {

    /**
     * @param Integer[] $score
     * @return String[]
     */
    function findRelativeRanks($score) {
        $n = count($score);
        $ranked = $score;

        // Step 1: Sort the scores in descending order while keeping track of original indices
        arsort($ranked);

        // Step 2: Assign ranks
        $ranks = array();
        $index = 0;

        foreach ($ranked as $originalIndex => $value) {
            $index++;
            if ($index == 1) {
                $ranks[$originalIndex] = "Gold Medal";
            } elseif ($index == 2) {
                $ranks[$originalIndex] = "Silver Medal";
            } elseif ($index == 3) {
                $ranks[$originalIndex] = "Bronze Medal";
            } else {
                $ranks[$originalIndex] = (string)$index;
            }
        }

        // Step 3: Prepare the result array based on the original scores' indices
        $result = array();
        for ($i = 0; $i < $n; $i++) {
            $result[$i] = $ranks[$i];
        }

        return $result;

    }
}
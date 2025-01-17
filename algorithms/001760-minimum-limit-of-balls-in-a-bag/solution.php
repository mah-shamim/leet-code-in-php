<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $maxOperations
     * @return Integer
     */
    function minimumSize($nums, $maxOperations) {
        $low = 1; // Minimum possible penalty
        $high = max($nums); // Maximum possible penalty

        while ($low < $high) {
            $mid = intval(($low + $high) / 2);

            if ($this->canAchievePenalty($nums, $maxOperations, $mid)) {
                $high = $mid; // Try smaller penalties
            } else {
                $low = $mid + 1; // Increase penalty
            }
        }

        return $low; // Minimum penalty that satisfies the condition
    }

    /**
     * Helper function to check if a penalty is feasible
     *
     * @param $nums
     * @param $maxOperations
     * @param $penalty
     * @return bool
     */
    function canAchievePenalty($nums, $maxOperations, $penalty) {
        $operations = 0;
        foreach ($nums as $balls) {
            if ($balls > $penalty) {
                // Calculate the number of splits needed
                $operations += ceil($balls / $penalty) - 1;
                if ($operations > $maxOperations) {
                    return false;
                }
            }
        }
        return true;
    }
}
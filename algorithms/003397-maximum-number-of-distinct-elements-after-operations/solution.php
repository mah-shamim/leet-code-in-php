<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxDistinctElements($nums, $k) {
        sort($nums);
        $lastAssigned = -PHP_INT_MAX;
        $count = 0;

        foreach ($nums as $num) {
            // Calculate the minimum value we can assign to this element
            // It should be at least (lastAssigned + 1) and at least (num - k)
            $minCandidate = max($lastAssigned + 1, $num - $k);

            // If the minimum candidate is within the allowed range, we can assign it
            if ($minCandidate <= $num + $k) {
                $lastAssigned = $minCandidate;
                $count++;
            }
        }

        return $count;
    }
}
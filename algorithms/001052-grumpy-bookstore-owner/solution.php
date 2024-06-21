<?php

class Solution {

    /**
     * @param Integer[] $customers
     * @param Integer[] $grumpy
     * @param Integer $minutes
     * @return Integer
     */
    function maxSatisfied($customers, $grumpy, $minutes) {
        $satisfied = 0;
        $madeSatisfied = 0;
        $windowSatisfied = 0;

        for ($i = 0; $i < count($customers); ++$i) {
            if ($grumpy[$i] == 0)
                $satisfied += $customers[$i];
            else
                $windowSatisfied += $customers[$i];
            if ($i >= $minutes && $grumpy[$i - $minutes] == 1)
                $windowSatisfied -= $customers[$i - $minutes];
            $madeSatisfied = max($madeSatisfied, $windowSatisfied);
        }

        return $satisfied + $madeSatisfied;
    }
}
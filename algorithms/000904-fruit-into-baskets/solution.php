<?php

class Solution {

    /**
     * @param Integer[] $fruits
     * @return Integer
     */
    function totalFruit($fruits) {
        $n = count($fruits);
        $left = 0;
        $maxFruits = 0;
        $countMap = [];

        for ($right = 0; $right < $n; $right++) {
            $fruit = $fruits[$right];
            if (!isset($countMap[$fruit])) {
                $countMap[$fruit] = 0;
            }
            $countMap[$fruit]++;

            while (count($countMap) > 2) {
                $leftFruit = $fruits[$left];
                $countMap[$leftFruit]--;
                if ($countMap[$leftFruit] == 0) {
                    unset($countMap[$leftFruit]);
                }
                $left++;
            }

            $windowSize = $right - $left + 1;
            if ($windowSize > $maxFruits) {
                $maxFruits = $windowSize;
            }
        }

        return $maxFruits;
    }
}
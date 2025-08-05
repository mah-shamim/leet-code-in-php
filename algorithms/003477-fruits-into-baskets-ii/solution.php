<?php

class Solution {

    /**
     * @param Integer[] $fruits
     * @param Integer[] $baskets
     * @return Integer
     */
    function numOfUnplacedFruits($fruits, $baskets) {
        $n = count($fruits);
        $taken = array_fill(0, $n, false);
        $unplaced = 0;

        foreach ($fruits as $fruit) {
            $found = false;
            for ($j = 0; $j < $n; $j++) {
                if (!$taken[$j] && $baskets[$j] >= $fruit) {
                    $taken[$j] = true;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $unplaced++;
            }
        }

        return $unplaced;
    }
}
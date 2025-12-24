<?php

class Solution {

    /**
     * @param Integer[] $apple
     * @param Integer[] $capacity
     * @return Integer
     */
    function minimumBoxes($apple, $capacity) {
        $totalApples = array_sum($apple);

        // Sort in descending order
        rsort($capacity);

        $sum = 0;
        for ($i = 0; $i < count($capacity); $i++) {
            $sum += $capacity[$i];
            if ($sum >= $totalApples) {
                return $i + 1;
            }
        }

        return count($capacity);
    }
}
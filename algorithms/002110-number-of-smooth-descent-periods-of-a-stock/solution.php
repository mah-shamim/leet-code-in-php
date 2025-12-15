<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function getDescentPeriods($prices) {
        $n = count($prices);
        if ($n == 0) return 0;

        $total = 1; // Start with first day
        $current = 1; // Length of current smooth descent ending at current position

        for ($i = 1; $i < $n; $i++) {
            if ($prices[$i] == $prices[$i - 1] - 1) {
                // Continue the smooth descent
                $current++;
            } else {
                // Start a new descent
                $current = 1;
            }

            // Add all periods ending at current position
            $total += $current;
        }

        return $total;
    }
}
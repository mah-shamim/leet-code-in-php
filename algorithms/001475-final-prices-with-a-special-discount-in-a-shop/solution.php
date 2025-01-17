<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer[]
     */
    function finalPrices($prices) {
        $n = count($prices);
        $answer = $prices;  // Initialize answer array with the original prices
        $stack = [];

        for ($i = 0; $i < $n; $i++) {
            // While the stack is not empty and the current price is less than or equal to the price at the top of the stack
            while (!empty($stack) && $prices[$stack[count($stack) - 1]] >= $prices[$i]) {
                $index = array_pop($stack);  // Pop the index from the stack
                $answer[$index] = $prices[$index] - $prices[$i];  // Apply the discount
            }
            array_push($stack, $i);  // Push the current index onto the stack
        }

        return $answer;
    }
}
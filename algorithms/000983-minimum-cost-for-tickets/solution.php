<?php

class Solution {

    /**
     * @param Integer[] $days
     * @param Integer[] $costs
     * @return Integer
     */
    function mincostTickets($days, $costs) {
        // Initialize the dp array where dp[i] represents the minimum cost up to day i.
        $dp = array_fill(0, 366, PHP_INT_MAX); // dp[0] = 0 by default
        $dp[0] = 0; // Base case: no cost if we haven't traveled yet

        // Set a set of days for faster lookup
        $travelDays = array_flip($days); // Flip days to make it O(1) lookup

        // Loop over all days from 1 to 365
        for ($i = 1; $i <= 365; $i++) {
            if (isset($travelDays[$i])) { // If we travel on this day
                // 1-day pass: add the cost of a 1-day pass
                $dp[$i] = min($dp[$i], $dp[$i-1] + $costs[0]);

                // 7-day pass: add the cost of a 7-day pass (look up to day i-7)
                $dp[$i] = min($dp[$i], $dp[max(0, $i-7)] + $costs[1]);

                // 30-day pass: add the cost of a 30-day pass (look up to day i-30)
                $dp[$i] = min($dp[$i], $dp[max(0, $i-30)] + $costs[2]);
            } else {
                // If we don't travel on this day, just carry forward the previous cost
                $dp[$i] = $dp[$i-1];
            }
        }

        // The answer will be the cost to cover all days, which is dp[365]
        return $dp[365];
    }
}
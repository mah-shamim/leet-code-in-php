<?php

class Solution {

    /**
     * @param String $ring
     * @param String $key
     * @return Integer
     */
    function findRotateSteps($ring, $key) {
        $len_key = strlen($key);
        $len_ring = strlen($ring);

        // Create an array to store the positions of each character in the ring
        $char_positions = array();
        for ($index = 0; $index < $len_ring; $index++) {
            $char = $ring[$index];
            $char_positions[$char][] = $index;
        }

        // DP array to store the minimum steps required
        $dp = array_fill(0, $len_key, array_fill(0, $len_ring, INF));

        // Initialize the dp for the first character in key
        foreach ($char_positions[$key[0]] as $j) {
            $dp[0][$j] = min($j, $len_ring - $j) + 1; // +1 for pressing the button
        }

        // DP processing for each subsequent character in key
        for ($i = 1; $i < $len_key; $i++) {
            foreach ($char_positions[$key[$i]] as $j) {
                foreach ($char_positions[$key[$i - 1]] as $k) {
                    // Calculate the minimum steps to move from position k to j
                    $distance = min(abs($j - $k), $len_ring - abs($j - $k));
                    $dp[$i][$j] = min($dp[$i][$j], $dp[$i - 1][$k] + $distance + 1);
                }
            }
        }

        // Find the minimum steps to spell the entire key
        $min_steps = INF;
        foreach ($char_positions[$key[$len_key - 1]] as $j) {
            $min_steps = min($min_steps, $dp[$len_key - 1][$j]);
        }

        return $min_steps;
    }
}
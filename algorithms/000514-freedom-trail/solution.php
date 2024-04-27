<?php

class Solution
{

    /**
     * @param String $ring
     * @param String $key
     * @return Integer
     */
    function findRotateSteps(string $ring, string $key): int
    {
        // Initialize lengths for ring and key

        $len_key = strlen($key);
        $len_ring = strlen($ring);

        // Default dictionary to keep track of positions for each character

        $char_positions = array();

        // Fill char_positions with indices for each character in ring

        for ($index = 0; $index < $len_ring; $index++) {
            $char = $ring[$index];
            $char_positions[$char][] = $index;
        }

        // Initialize the DP array with infinity

        $dp = array_fill(0, $len_key, array_fill(0, $len_ring, INF));

        // Base case for the first character in key

        foreach ($char_positions[$key[0]] as $j) {
            $dp[0][$j] = min($j, $len_ring - $j) + 1;
        }

        // Iterate through remaining characters in key

        for ($i = 1; $i < $len_key; $i++) {
            foreach ($char_positions[$key[$i]] as $j) {
                foreach ($char_positions[$key[$i - 1]] as $k) {
                    // Calculate the minimum steps to rotate from character key[i-1] to key[i]

                    // Considering the circular nature of the ring

                    $dp[$i][$j] = min($dp[$i][$j], $dp[$i - 1][$k] + min(abs($j - $k), $len_ring - abs($j - $k)) + 1);
                }
            }
        }

        // Return the minimum steps to spell the key last character

        $min_steps = INF;
        foreach ($char_positions[$key[$len_key - 1]] as $j) {
            $min_steps = min($min_steps, $dp[$len_key - 1][$j]);
        }

        return $min_steps;
    }
}
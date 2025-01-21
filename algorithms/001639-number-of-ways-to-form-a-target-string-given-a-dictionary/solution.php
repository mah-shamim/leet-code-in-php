<?php

class Solution {
    const MOD = 1000000007;
    /**
     * @param String[] $words
     * @param String $target
     * @return Integer
     */
    function numWays($words, $target) {
        $wordLength = strlen($words[0]);
        $targetLength = strlen($target);

        // Precompute character frequencies for each column
        $counts = array_fill(0, $wordLength, array_fill(0, 26, 0));
        foreach ($words as $word) {
            for ($j = 0; $j < $wordLength; $j++) {
                $counts[$j][ord($word[$j]) - ord('a')]++;
            }
        }

        // Memoization table
        $memo = array_fill(0, $targetLength, array_fill(0, $wordLength, -1));

        return $this->dp(0, 0, $counts, $target, $memo);
    }

    /**
     * Helper function for DP
     *
     * @param $i
     * @param $j
     * @param $counts
     * @param $target
     * @param $memo
     * @return float|int|mixed
     */
    private function dp($i, $j, $counts, $target, &$memo) {
        if ($i == strlen($target)) return 1; // Entire target formed
        if ($j == count($counts)) return 0; // Out of bounds
        if ($memo[$i][$j] != -1) return $memo[$i][$j];

        $ways = $this->dp($i, $j + 1, $counts, $target, $memo); // Skip this column
        $charIndex = ord($target[$i]) - ord('a');

        if ($counts[$j][$charIndex] > 0) {
            $ways += $this->dp($i + 1, $j + 1, $counts, $target, $memo) * $counts[$j][$charIndex];
            $ways %= Solution::MOD;
        }

        return $memo[$i][$j] = $ways;
    }
}
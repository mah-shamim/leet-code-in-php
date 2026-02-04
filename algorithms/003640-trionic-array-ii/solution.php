<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSumTrionic(array $nums): int
    {
        $n = count($nums);
        if ($n < 4) return 0;

        // Initialize DP arrays with negative infinity
        $INF = 10 ** 18;
        $negINF = -$INF;

        $dp0 = array_fill(0, $n, $negINF);
        $dp1 = array_fill(0, $n, $negINF);
        $dp2 = array_fill(0, $n, $negINF);
        $dp3 = array_fill(0, $n, $negINF);

        // Base case: start at index 0
        $dp0[0] = $nums[0];

        for ($i = 1; $i < $n; $i++) {
            // State 0: just starting (can always start fresh or continue if increasing)
            $dp0[$i] = $nums[$i];
            if ($nums[$i] > $nums[$i - 1]) {
                $dp0[$i] = max($dp0[$i], $dp0[$i - 1] + $nums[$i]);
            }

            // State 1: completed first increasing phase
            if ($nums[$i] > $nums[$i - 1]) {
                // Can continue from state 0 or state 1
                $valFromDp0 = $dp0[$i - 1] !== $negINF ? $dp0[$i - 1] + $nums[$i] : $negINF;
                $valFromDp1 = $dp1[$i - 1] !== $negINF ? $dp1[$i - 1] + $nums[$i] : $negINF;
                $dp1[$i] = max($valFromDp0, $valFromDp1);
            }

            // State 2: completed decreasing phase
            if ($nums[$i] < $nums[$i - 1]) {
                // Can continue from state 1 or state 2
                $valFromDp1 = $dp1[$i - 1] !== $negINF ? $dp1[$i - 1] + $nums[$i] : $negINF;
                $valFromDp2 = $dp2[$i - 1] !== $negINF ? $dp2[$i - 1] + $nums[$i] : $negINF;
                $dp2[$i] = max($valFromDp1, $valFromDp2);
            }

            // State 3: completed second increasing phase
            if ($nums[$i] > $nums[$i - 1]) {
                // Can continue from state 2 or state 3
                $valFromDp2 = $dp2[$i - 1] !== $negINF ? $dp2[$i - 1] + $nums[$i] : $negINF;
                $valFromDp3 = $dp3[$i - 1] !== $negINF ? $dp3[$i - 1] + $nums[$i] : $negINF;
                $dp3[$i] = max($valFromDp2, $valFromDp3);
            }
        }

        // Find maximum in dp3 (state where we've completed all phases)
        $maxSum = $negINF;
        for ($i = 0; $i < $n; $i++) {
            if ($dp3[$i] > $maxSum) {
                $maxSum = $dp3[$i];
            }
        }

        return $maxSum;
    }
}
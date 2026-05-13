<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $limit
     * @return Integer
     */
    function minMoves(array $nums, int $limit): int
    {
        $n = count($nums);
        $totalPairs = $n / 2;
        $maxSum = 2 * $limit;

        // diff[S] will store the change in moves when S increases
        $diff = array_fill(0, $maxSum + 2, 0);

        for ($i = 0; $i < $totalPairs; $i++) {
            $a = $nums[$i];
            $b = $nums[$n - 1 - $i];

            $lo = min($a, $b);
            $hi = max($a, $b);

            // start cost = 2
            // At S = 1+lo, cost -= 1
            $diff[2] += 2;

            $diff[1 + $lo] += -1;
            $diff[$a + $b] += -1;
            $diff[$a + $b + 1] += 1;
            $diff[$limit + $hi + 1] += 1;
        }

        $current = 0;
        $minMoves = PHP_INT_MAX;

        for ($S = 2; $S <= $maxSum; $S++) {
            $current += $diff[$S];
            $minMoves = min($minMoves, $current);
        }

        return $minMoves;
    }
}
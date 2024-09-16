<?php

class Solution {

    /**
     * @param Integer[] $piles
     * @return Integer
     */
    function stoneGameII($piles) {
        $n = count($piles);
        $suffix = $piles;
        $mem = array_fill(0, $n, array_fill(0, $n + 1, 0));

        // Compute suffix sums
        for ($i = $n - 2; $i >= 0; --$i) {
            $suffix[$i] += $suffix[$i + 1];
        }

        return $this->stoneGameIIHelper($suffix, 0, 1, $mem);
    }

    /**
     * @param $suffix
     * @param $i
     * @param $M
     * @param $mem
     * @return mixed
     */
    private function stoneGameIIHelper($suffix, $i, $M, &$mem) {
        $n = count($suffix);

        // Base case: If we can take all remaining piles
        if ($i + 2 * $M >= $n) {
            return $suffix[$i];
        }

        // Check memoization
        if ($mem[$i][$M] > 0) {
            return $mem[$i][$M];
        }

        $opponent = $suffix[$i];

        // Recursive case: Minimize the maximum stones opponent can take
        for ($X = 1; $X <= 2 * $M; ++$X) {
            if ($i + $X < $n) {
                $opponent = min($opponent, $this->stoneGameIIHelper($suffix, $i + $X, max($M, $X), $mem));
            }
        }

        // Memoize and return the result
        $mem[$i][$M] = $suffix[$i] - $opponent;
        return $mem[$i][$M];
    }
}
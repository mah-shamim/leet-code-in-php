<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @param Integer[] $strategy
     * @param Integer $k
     * @return Integer
     */
    function maxProfit($prices, $strategy, $k) {
        $n = count($prices);
        $baseProfit = 0;
        $prefixPrices = array_fill(0, $n + 1, 0);
        $prefixSp = array_fill(0, $n + 1, 0); // prefix of strategy[i] * prices[i]

        // Build prefix arrays and compute base profit
        for ($i = 0; $i < $n; $i++) {
            $baseProfit += $strategy[$i] * $prices[$i];
            $prefixPrices[$i + 1] = $prefixPrices[$i] + $prices[$i];
            $prefixSp[$i + 1] = $prefixSp[$i] + $strategy[$i] * $prices[$i];
        }

        $maxDelta = 0;
        $half = $k / 2; // k is even

        // Try every possible modification window
        for ($l = 0; $l <= $n - $k; $l++) {
            $sumPricesSecondHalf = $prefixPrices[$l + $k] - $prefixPrices[$l + $half];
            $sumOldSegment = $prefixSp[$l + $k] - $prefixSp[$l];
            $delta = $sumPricesSecondHalf - $sumOldSegment;
            if ($delta > $maxDelta) {
                $maxDelta = $delta;
            }
        }

        return $baseProfit + $maxDelta;
    }
}
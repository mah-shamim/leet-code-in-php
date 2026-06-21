<?php

class Solution {

    /**
     * @param Integer[] $costs
     * @param Integer $coins
     * @return Integer
     */
    function maxIceCream(array $costs, int $coins): int
    {
        $maxCost = max($costs);
        $freq = array_fill(0, $maxCost + 1, 0);

        // Count frequencies
        foreach ($costs as $price) {
            $freq[$price]++;
        }

        $count = 0;
        for ($price = 1; $price <= $maxCost; $price++) {
            if ($freq[$price] == 0) continue;

            // Maximum number we can buy at this price
            $canBuy = min($freq[$price], intdiv($coins, $price));
            $count += $canBuy;
            $coins -= $canBuy * $price;

            if ($coins < $price) {
                // Cannot afford the next price
                break;
            }
        }

        return $count;
    }
}
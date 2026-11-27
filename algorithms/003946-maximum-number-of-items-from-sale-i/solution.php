<?php

class Solution {

    /**
     * @param Integer[][] $items
     * @param Integer $budget
     * @return Integer
     */
    function maximumSaleItems(array $items, int $budget): int
    {
        $maxFactor = 1500;

        // cntDiv[f] = number of items whose factor is divisible by f
        $cntDiv = array_fill(0, $maxFactor + 1, 0);

        foreach ($items as $item) {
            $factor = $item[0];

            for ($d = 1; $d * $d <= $factor; $d++) {
                if ($factor % $d === 0) {
                    $cntDiv[$d]++;

                    $other = intdiv($factor, $d);
                    if ($other !== $d) {
                        $cntDiv[$other]++;
                    }
                }
            }
        }

        // dp[b] = maximum total copies obtainable using at most b budget
        $dp = array_fill(0, $budget + 1, 0);

        foreach ($items as $item) {
            $factor = $item[0];
            $price = $item[1];

            // Buying the first copy of this item gives:
            // 1 purchased copy + all free copies activated by its factor.
            $freeCopies = $cntDiv[$factor] - 1;

            $newDp = $dp; // Option: skip this item

            // Buy the first copy
            for ($b = $price; $b <= $budget; $b++) {
                $candidate = $dp[$b - $price] + 1 + $freeCopies;
                if ($candidate > $newDp[$b]) {
                    $newDp[$b] = $candidate;
                }
            }

            // Buy additional copies; each extra copy adds exactly 1 item copy
            for ($b = $price; $b <= $budget; $b++) {
                $candidate = $newDp[$b - $price] + 1;
                if ($candidate > $newDp[$b]) {
                    $newDp[$b] = $candidate;
                }
            }

            $dp = $newDp;
        }

        return $dp[$budget];
    }
}
<?php

class Solution {

    /**
     * @param Integer[][] $cost
     * @return Integer
     */
    function connectTwoGroups($cost) {
        $size1 = count($cost);
        $size2 = count($cost[0]);

        // Initialize the dp table with a large number (infinity substitute)
        $dp = array_fill(0, $size1 + 1, array_fill(0, 1 << $size2, PHP_INT_MAX));
        $dp[0][0] = 0;

        // Fill the dp table
        for ($i = 0; $i < $size1; $i++) {
            for ($mask = 0; $mask < (1 << $size2); $mask++) {
                for ($j = 0; $j < $size2; $j++) {
                    $newMask = $mask | (1 << $j);
                    $dp[$i + 1][$newMask] = min(
                        $dp[$i + 1][$newMask],
                        $dp[$i][$mask] + $cost[$i][$j]
                    );
                }
            }
        }

        // Ensure all points in the second group are connected
        $finalCost = PHP_INT_MAX;
        for ($mask = 0; $mask < (1 << $size2); $mask++) {
            $currentCost = $dp[$size1][$mask];
            for ($j = 0; $j < $size2; $j++) {
                if (!($mask & (1 << $j))) {
                    $minConnectionCost = PHP_INT_MAX;
                    for ($i = 0; $i < $size1; $i++) {
                        $minConnectionCost = min($minConnectionCost, $cost[$i][$j]);
                    }
                    $currentCost += $minConnectionCost;
                }
            }
            $finalCost = min($finalCost, $currentCost);
        }

        return $finalCost;

    }
}
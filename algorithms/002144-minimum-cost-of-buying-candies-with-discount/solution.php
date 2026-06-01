<?php

class Solution {

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minimumCost(array $cost): int
    {
        // Sort in descending order
        rsort($cost);

        $total = 0;
        $n = count($cost);

        for ($i = 0; $i < $n; $i++) {
            // Take every 3rd candy for free (starting from index 2)
            if ($i % 3 != 2) {
                $total += $cost[$i];
            }
        }

        return $total;
    }
}
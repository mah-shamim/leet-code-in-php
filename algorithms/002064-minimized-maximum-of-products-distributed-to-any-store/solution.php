<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[] $quantities
     * @return Integer
     */
    function minimizedMaximum($n, $quantities) {
        // Binary search on the possible values of `x`
        $left = 1;
        $right = max($quantities);

        while ($left < $right) {
            $mid = intval(($left + $right) / 2);

            if ($this->canDistribute($mid, $quantities, $n)) {
                // If possible to distribute with `mid` as the maximum, try smaller values
                $right = $mid;
            } else {
                // Otherwise, increase `mid`
                $left = $mid + 1;
            }
        }

        return $left;
    }

    /**
     * Helper function to check if we can distribute products with maximum `x` per store
     *
     * @param $x
     * @param $quantities
     * @param $n
     * @return bool
     */
    function canDistribute($x, $quantities, $n) {
        $requiredStores = 0;

        foreach ($quantities as $quantity) {
            // Calculate minimum stores needed for this product type
            $requiredStores += ceil($quantity / $x);
            // If we need more stores than available, return false
            if ($requiredStores > $n) {
                return false;
            }
        }

        return $requiredStores <= $n;
    }
}
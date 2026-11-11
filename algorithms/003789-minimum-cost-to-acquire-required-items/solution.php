<?php

class Solution {

    /**
     * @param Integer $cost1
     * @param Integer $cost2
     * @param Integer $costBoth
     * @param Integer $need1
     * @param Integer $need2
     * @return Integer
     */
    function minimumCost(int $cost1, int $cost2, int $costBoth, int $need1, int $need2): int
    {
        // Satisfy the common part using the cheaper option:
        // either two separate items or one type-3 item.
        $common = min($need1, $need2);
        $ans = $common * min($costBoth, $cost1 + $cost2);

        // Remaining requirements can also be satisfied by type-3 items
        // if that is cheaper than the corresponding single-type item.
        $remaining1 = $need1 - $common;
        $remaining2 = $need2 - $common;

        $ans += $remaining1 * min($costBoth, $cost1);
        $ans += $remaining2 * min($costBoth, $cost2);

        return $ans;
    }
}
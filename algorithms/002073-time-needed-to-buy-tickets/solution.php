<?php
class Solution {

    /**
     * @param Integer[] $tickets
     * @param Integer $k
     * @return Integer
     */
    function timeRequiredToBuy(array $tickets, int $k): int
    {
        $ans = 0;

        foreach ($tickets as $i => $ticket) {
            if ($i <= $k) {
                $ans += min($ticket, $tickets[$k]);
            } else {
                $ans += min($ticket, $tickets[$k] - 1);
            }
        }

        return $ans;
    }
}
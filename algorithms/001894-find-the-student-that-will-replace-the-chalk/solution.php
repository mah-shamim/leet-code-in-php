<?php

class Solution {

    /**
     * @param Integer[] $chalk
     * @param Integer $k
     * @return Integer
     */
    function chalkReplacer($chalk, $k) {
        $total_chalk = array_sum($chalk);

        // Reduce k to a manageable size
        $k %= $total_chalk;

        // Find the student who runs out of chalk
        for ($i = 0; $i < count($chalk); $i++) {
            if ($k < $chalk[$i]) {
                return $i;
            }
            $k -= $chalk[$i];
        }

        return -1;  // This return is more of a safety check; the function will return within the loop.

    }
}
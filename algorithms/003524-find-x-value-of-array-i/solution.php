<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function resultArray(array $nums, int $k): array
    {
        $ans = array_fill(0, $k, 0);
        $dp = array_fill(0, $k, 0);

        foreach ($nums as $num) {
            $m = $num % $k;
            $next = array_fill(0, $k, 0);

            // Subarray consisting only of the current element.
            $next[$m] += 1;

            // Extend every subarray ending at the previous position.
            for ($r = 0; $r < $k; $r++) {
                if ($dp[$r] === 0) {
                    continue;
                }

                $nr = ($r * $m) % $k;
                $next[$nr] += $dp[$r];
            }

            // Add all subarrays ending at the current position.
            for ($r = 0; $r < $k; $r++) {
                $ans[$r] += $next[$r];
            }

            $dp = $next;
        }

        return $ans;
    }
}
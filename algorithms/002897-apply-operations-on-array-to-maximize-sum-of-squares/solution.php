<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxSum(array $nums, int $k): int
    {
        $MOD = 1000000007;

        // Count how many numbers contain each bit.
        $cnt = array_fill(0, 31, 0);

        foreach ($nums as $num) {
            for ($b = 0; $b < 31; $b++) {
                if (($num >> $b) & 1) {
                    $cnt[$b]++;
                }
            }
        }

        $ans = 0;

        // Build the k largest possible numbers.
        for ($i = 0; $i < $k; $i++) {
            $val = 0;

            for ($b = 0; $b < 31; $b++) {
                if ($cnt[$b] > 0) {
                    $val |= (1 << $b);
                    $cnt[$b]--;
                }
            }

            $ans = ($ans + $val * $val) % $MOD;
        }

        return $ans;
    }
}
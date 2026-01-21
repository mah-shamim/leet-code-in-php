<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function minBitwiseArray(array $nums): array
    {
        $ans = [];
        foreach ($nums as $p) {
            // Even prime (2) has no solution
            if ($p == 2) {
                $ans[] = -1;
                continue;
            }

            // Check if p is of the form 2^t - 1 (all 1s in binary)
            if (($p & ($p + 1)) == 0) {
                // Smallest x is (p-1)/2
                $ans[] = (int)(($p - 1) / 2);
                continue;
            }

            // Find the position m of the least significant 0 bit (0-indexed from right)
            $mask = 1;
            $m = 0;
            while (($p & $mask) != 0) {
                $mask <<= 1;
                $m++;
            }
            // Now m is the index of the first 0 from the right.
            // The answer is p - (1 << (m-1))
            $ans[] = $p - (1 << ($m - 1));
        }
        return $ans;
    }
}
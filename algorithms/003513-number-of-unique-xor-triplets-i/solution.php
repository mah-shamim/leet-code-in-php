<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function uniqueXorTriplets(array $nums): int
    {
        $n = count($nums);

        if ($n == 1) return 1;
        if ($n == 2) return 2;

        // find most significant bit position
        $msb = 0;
        $temp = $n;
        while ($temp > 0) {
            $msb++;
            $temp >>= 1;
        }
        // $msb is now the bit length; max value = 2^msb - 1, count = 2^msb
        return 1 << $msb;
    }
}
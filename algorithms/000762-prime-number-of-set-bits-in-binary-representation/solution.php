<?php

class Solution {

    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function countPrimeSetBits(int $left, int $right): int
    {
        // Pre‑defined primes within the possible bit‑count range (1 … 20)
        $primes = [2, 3, 5, 7, 11, 13, 17, 19];
        // Use a hash map for O(1) prime checks
        $primeMap = array_flip($primes);

        $result = 0;
        for ($num = $left; $num <= $right; $num++) {
            // Count set bits (popcount) manually
            $bits = 0;
            $n = $num;
            while ($n > 0) {
                $bits += $n & 1;   // add 1 if lowest bit is set
                $n >>= 1;          // shift right
            }

            // If the bit count is prime, increment the counter
            if (isset($primeMap[$bits])) {
                $result++;
            }
        }

        return $result;
    }
}
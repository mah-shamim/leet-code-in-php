<?php

class Solution {

    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer[]
     */
    function closestPrimes($left, $right) {
        if ($right < 2) {
            return array(-1, -1);
        }

        // Initialize sieve of Eratosthenes
        $sieve = array_fill(0, $right + 1, true);
        $sieve[0] = $sieve[1] = false;
        for ($i = 2; $i * $i <= $right; $i++) {
            if ($sieve[$i]) {
                for ($j = $i * $i; $j <= $right; $j += $i) {
                    $sieve[$j] = false;
                }
            }
        }

        // Collect primes in the range [left, right]
        $primes = array();
        for ($i = max($left, 2); $i <= $right; $i++) {
            if ($sieve[$i]) {
                $primes[] = $i;
            }
        }

        // Check if there are at least two primes
        if (count($primes) < 2) {
            return array(-1, -1);
        }

        $min_diff = PHP_INT_MAX;
        $result = array();

        // Find the pair with the smallest difference
        for ($i = 0; $i < count($primes) - 1; $i++) {
            $diff = $primes[$i + 1] - $primes[$i];
            if ($diff < $min_diff) {
                $min_diff = $diff;
                $result = array($primes[$i], $primes[$i + 1]);
            }
        }

        return $result;
    }
}
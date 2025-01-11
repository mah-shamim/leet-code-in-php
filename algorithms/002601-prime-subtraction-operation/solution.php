<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function primeSubOperation($nums) {
        $maxNum = 1000;
        $primes = $this->sieveEratosthenes($maxNum);

        $prevNum = 0;
        foreach ($nums as &$num) {
            // Find the largest prime `p` that makes `num - p > prevNum`
            $prime = $this->findLargestPrimeLessThan($primes, $num - $prevNum);
            if ($prime !== null) {
                $num -= $prime;
            }

            // Check if the current number is greater than the previous number
            if ($num <= $prevNum) {
                return false;
            }

            $prevNum = $num;
        }

        return true;
    }

    /**
     * Helper function to generate all primes up to n using Sieve of Eratosthenes
     *
     * @param $n
     * @return array
     */
    private function sieveEratosthenes($n) {
        $isPrime = array_fill(0, $n + 1, true);
        $isPrime[0] = $isPrime[1] = false;
        $primes = [];

        for ($i = 2; $i <= $n; $i++) {
            if ($isPrime[$i]) {
                $primes[] = $i;
                for ($j = $i * $i; $j <= $n; $j += $i) {
                    $isPrime[$j] = false;
                }
            }
        }

        return $primes;
    }

    /**
     * Helper function to find the largest prime less than a given limit using binary search
     *
     * @param $primes
     * @param $limit
     * @return mixed|null
     */
    private function findLargestPrimeLessThan($primes, $limit) {
        $left = 0;
        $right = count($primes) - 1;

        while ($left <= $right) {
            $mid = $left + (int)(($right - $left) / 2);
            if ($primes[$mid] < $limit) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $right >= 0 ? $primes[$right] : null;
    }
}
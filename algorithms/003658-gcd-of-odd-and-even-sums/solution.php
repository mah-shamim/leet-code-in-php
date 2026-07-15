<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function gcdOfOddEvenSums(int $n): int
    {
        // sum of first n odd numbers = n^2
        // sum of first n even numbers = n * (n + 1)
        // gcd(n^2, n(n+1)) = n * gcd(n, n+1) = n * 1 = n
        return $n;
    }
}
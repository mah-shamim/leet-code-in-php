<?php

class Solution {

    /**
     * @param String[] $words
     * @param String $target
     * @param Integer $startIndex
     * @return Integer
     */
    function closestTarget(array $words, string $target, int $startIndex): int
    {
        $n = count($words);
        $minDistance = PHP_INT_MAX;

        for ($i = 0; $i < $n; $i++) {
            if ($words[$i] === $target) {
                $forward = ($i - $startIndex + $n) % $n;
                $backward = ($startIndex - $i + $n) % $n;
                $distance = min($forward, $backward);
                $minDistance = min($minDistance, $distance);
            }
        }

        return $minDistance === PHP_INT_MAX ? -1 : $minDistance;
    }
}
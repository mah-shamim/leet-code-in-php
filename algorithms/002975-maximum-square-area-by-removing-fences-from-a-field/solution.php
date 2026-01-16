<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer[] $hFences
     * @param Integer[] $vFences
     * @return Integer
     */
    function maximizeSquareArea(int $m, int $n, array $hFences, array $vFences): int
    {
        // Add boundary fences
        $hLines = array_merge([1, $m], $hFences);
        $vLines = array_merge([1, $n], $vFences);

        // Remove duplicates and sort
        sort($hLines);
        sort($vLines);

        // Compute all possible horizontal distances (differences between x-coordinates)
        $hDistances = [];
        $hCount = count($hLines);
        for ($i = 0; $i < $hCount; $i++) {
            for ($j = $i + 1; $j < $hCount; $j++) {
                $diff = $hLines[$j] - $hLines[$i];
                $hDistances[$diff] = true;
            }
        }

        // Find the maximum common distance in vertical differences
        $maxSide = 0;
        $vCount = count($vLines);
        for ($i = 0; $i < $vCount; $i++) {
            for ($j = $i + 1; $j < $vCount; $j++) {
                $diff = $vLines[$j] - $vLines[$i];
                if (isset($hDistances[$diff]) && $diff > $maxSide) {
                    $maxSide = $diff;
                }
            }
        }

        if ($maxSide == 0) {
            return -1;
        }

        $mod = 1000000007;
        return (($maxSide % $mod) * ($maxSide % $mod)) % $mod;
    }
}
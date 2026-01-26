<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer[][]
     */
    function minimumAbsDifference(array $arr): array
    {
        // Sort the array
        sort($arr);

        $minDiff = PHP_INT_MAX;
        $n = count($arr);
        $result = [];

        // Single pass to find minDiff and collect pairs
        for ($i = 1; $i < $n; $i++) {
            $diff = $arr[$i] - $arr[$i - 1];

            if ($diff < $minDiff) {
                // Found a new minimum, reset result
                $minDiff = $diff;
                $result = [[$arr[$i - 1], $arr[$i]]];
            } elseif ($diff === $minDiff) {
                // Same minimum, add to result
                $result[] = [$arr[$i - 1], $arr[$i]];
            }
        }

        return $result;
    }
}
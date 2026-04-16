<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[] $queries
     * @return Integer[]
     */
    function solveQueries(array $nums, array $queries): array
    {
        $n = count($nums);
        $valueToIndices = [];

        // Group indices by their values
        for ($i = 0; $i < $n; $i++) {
            $value = $nums[$i];
            if (!isset($valueToIndices[$value])) {
                $valueToIndices[$value] = [];
            }
            $valueToIndices[$value][] = $i;
        }

        $result = [];

        // Process each query
        foreach ($queries as $queryIndex) {
            $value = $nums[$queryIndex];
            $indices = $valueToIndices[$value];
            $m = count($indices);

            // If only one occurrence of this value
            if ($m <= 1) {
                $result[] = -1;
                continue;
            }

            // Binary search to find the position of queryIndex in the sorted indices list
            $pos = $this->binarySearch($indices, $queryIndex);

            $minDistance = PHP_INT_MAX;

            // Check both adjacent indices (previous and next), handling circularity
            $prevIdx = ($pos - 1 + $m) % $m;
            $nextIdx = ($pos + 1) % $m;

            $distanceToPrev = $this->circularDistance($queryIndex, $indices[$prevIdx], $n);
            $distanceToNext = $this->circularDistance($queryIndex, $indices[$nextIdx], $n);

            $minDistance = min($distanceToPrev, $distanceToNext);

            $result[] = $minDistance;
        }

        return $result;
    }

    /**
     * Binary search to find the exact position or insertion point
     *
     * @param $arr
     * @param $target
     * @return mixed
     */
    function binarySearch($arr, $target): mixed
    {
        $left = 0;
        $right = count($arr) - 1;

        while ($left <= $right) {
            $mid = $left + (($right - $left) >> 1);
            if ($arr[$mid] == $target) {
                return $mid;
            } else if ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $left;
    }

    /**
     * Calculate circular distance between two indices
     *
     * @param $i
     * @param $j
     * @param $n
     * @return mixed
     */
    function circularDistance($i, $j, $n): mixed
    {
        $direct = abs($i - $j);
        return min($direct, $n - $direct);
    }
}
<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[] $nums
     * @param Integer $maxDiff
     * @param Integer[][] $queries
     * @return Boolean[]
     */
    function pathExistenceQueries(int $n, array $nums, int $maxDiff, array $queries): array
    {
        // Array to store component ID for each node
        $component = array_fill(0, $n, -1);
        $compId = 0;

        // Find connected components
        $i = 0;
        while ($i < $n) {
            // Start a new component
            $component[$i] = $compId;
            $j = $i;

            // Extend the component as long as consecutive elements are within maxDiff
            while ($j + 1 < $n && abs($nums[$j + 1] - $nums[$j]) <= $maxDiff) {
                $j++;
                $component[$j] = $compId;
            }

            $compId++;
            $i = $j + 1;
        }

        // Process queries
        $result = [];
        foreach ($queries as $query) {
            $u = $query[0];
            $v = $query[1];
            $result[] = ($component[$u] === $component[$v]);
        }

        return $result;
    }
}
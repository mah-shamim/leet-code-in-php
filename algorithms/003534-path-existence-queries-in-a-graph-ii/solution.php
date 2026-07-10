<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[] $nums
     * @param Integer $maxDiff
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function pathExistenceQueries(int $n, array $nums, int $maxDiff, array $queries): array
    {
        // Step 1: Sort nodes by nums values with original indices
        $sortedPairs = [];
        for ($i = 0; $i < $n; $i++) {
            $sortedPairs[] = [$nums[$i], $i];
        }
        usort($sortedPairs, function($a, $b) {
            return $a[0] - $b[0];
        });

        $sortedNums = [];
        $indexMap = [];
        foreach ($sortedPairs as $i => $pair) {
            [$num, $origIndex] = $pair;
            $sortedNums[] = $num;
            $indexMap[$origIndex] = $i;
        }

        // Step 2: Build binary lifting table
        $maxLevel = (int) (log($n, 2)) + 2; // enough levels for 2^level jumps
        $jump = array_fill(0, $n, array_fill(0, $maxLevel, 0));

        // Compute jump[i][0]: farthest reachable sorted index in one jump from i
        $right = 0;
        for ($i = 0; $i < $n; $i++) {
            while ($right + 1 < $n && $sortedNums[$right + 1] - $sortedNums[$i] <= $maxDiff) {
                $right++;
            }
            $jump[$i][0] = $right;
        }

        // Fill binary lifting table
        for ($level = 1; $level < $maxLevel; $level++) {
            for ($i = 0; $i < $n; $i++) {
                $mid = $jump[$i][$level - 1];
                $jump[$i][$level] = $jump[$mid][$level - 1];
            }
        }

        // Step 3: Process queries
        $answer = [];
        foreach ($queries as $query) {
            [$u, $v] = $query;
            if ($u === $v) {
                $answer[] = 0;
                continue;
            }

            $uIdx = $indexMap[$u];
            $vIdx = $indexMap[$v];
            $start = min($uIdx, $vIdx);
            $end = max($uIdx, $vIdx);

            $dist = $this->minJumps($jump, $start, $end, $maxLevel - 1);
            $answer[] = ($dist === PHP_INT_MAX) ? -1 : $dist;
        }

        return $answer;
    }

    /**
     * @param array $jump
     * @param int $start
     * @param int $end
     * @param int $level
     * @return int
     */
    private function minJumps(array $jump, int $start, int $end, int $level): int
    {
        if ($start === $end) {
            return 0;
        }
        if ($jump[$start][0] >= $end) {
            return 1;
        }
        if ($jump[$start][$level] < $end) {
            return PHP_INT_MAX;
        }

        // Find highest level where we don't overshoot
        for ($j = $level; $j >= 0; $j--) {
            if ($jump[$start][$j] < $end) {
                $newStart = $jump[$start][$j];
                $steps = (1 << $j);
                $remaining = $this->minJumps($jump, $newStart, $end, $j);
                if ($remaining === PHP_INT_MAX) {
                    return PHP_INT_MAX;
                }
                return $steps + $remaining;
            }
        }

        // Fallback: shouldn't reach here
        return PHP_INT_MAX;
    }
}
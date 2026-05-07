<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function maxValue(array $nums): array
    {
        $n = count($nums);
        $prefixMax = array_fill(0, $n, 0);
        $suffixMin = array_fill(0, $n, 0);

        $prefixMax[0] = $nums[0];
        for ($i = 1; $i < $n; $i++) {
            $prefixMax[$i] = max($prefixMax[$i-1], $nums[$i]);
        }

        $suffixMin[$n-1] = $nums[$n-1];
        for ($i = $n-2; $i >= 0; $i--) {
            $suffixMin[$i] = min($suffixMin[$i+1], $nums[$i]);
        }

        $segments = [];
        $start = 0;
        for ($i = 0; $i < $n-1; $i++) {
            if ($prefixMax[$i] <= $suffixMin[$i+1]) {
                $segments[] = [$start, $i];
                $start = $i + 1;
            }
        }
        $segments[] = [$start, $n-1];

        $ans = array_fill(0, $n, 0);
        foreach ($segments as $seg) {
            $maxVal = max(array_slice($nums, $seg[0], $seg[1] - $seg[0] + 1));
            for ($i = $seg[0]; $i <= $seg[1]; $i++) {
                $ans[$i] = $maxVal;
            }
        }

        return $ans;
    }
}
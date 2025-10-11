<?php

class Solution {

    /**
     * @param Integer[] $power
     * @return Integer
     */
    function maximumTotalDamage($power) {
        if (empty($power)) return 0;

        // Count frequency of each damage
        $freq = [];
        foreach ($power as $p) {
            $freq[$p] = isset($freq[$p]) ? $freq[$p] + 1 : 1;
        }

        // Get unique damages and sort
        $unique = array_keys($freq);
        sort($unique);
        $n = count($unique);

        // DP array: dp[i] = max damage using first i unique damages
        $dp = array_fill(0, $n, 0);

        // For each unique damage
        for ($i = 0; $i < $n; $i++) {
            $currentDamage = $unique[$i];
            $currentTotal = $currentDamage * $freq[$currentDamage];

            // Option 1: Skip current damage
            $skip = ($i > 0) ? $dp[$i - 1] : 0;

            // Option 2: Take current damage, find max from allowed previous damages
            $take = $currentTotal;

            // Find the largest index j where unique[j] <= currentDamage - 3
            // This ensures we don't conflict with currentDamage-2, currentDamage-1
            $left = 0;
            $right = $i - 1;
            $prevIndex = -1;

            while ($left <= $right) {
                $mid = (int)(($left + $right) / 2);
                if ($unique[$mid] <= $currentDamage - 3) {
                    $prevIndex = $mid;
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }

            if ($prevIndex != -1) {
                $take += $dp[$prevIndex];
            }

            $dp[$i] = max($skip, $take);
        }

        return $dp[$n - 1];
    }
}
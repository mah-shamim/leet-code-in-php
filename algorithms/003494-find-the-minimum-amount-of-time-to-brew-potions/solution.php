<?php

class Solution {

    /**
     * @param Integer[] $skill
     * @param Integer[] $mana
     * @return Integer
     */
    function minTime($skill, $mana) {
        $n = count($skill);
        $m = count($mana);

        // Prefix sum of skills - time needed for first i wizards
        $prefix = array_fill(0, $n + 1, 0);
        for ($i = 1; $i <= $n; $i++) {
            $prefix[$i] = $prefix[$i - 1] + $skill[$i - 1];
        }

        // Track earliest available time for each wizard
        $freeTime = array_fill(0, $n, 0);

        foreach ($mana as $x) {
            // Find earliest start time for current potion
            $start = $freeTime[0];

            // Check constraints from all subsequent wizards
            for ($i = 1; $i < $n; $i++) {
                // Potion reaches wizard i at: start + prefix[i] * x
                // Wizard i becomes free at: freeTime[i]
                // We need: start + prefix[i] * x >= freeTime[i]
                $requiredStart = $freeTime[$i] - $prefix[$i] * $x;
                if ($requiredStart > $start) {
                    $start = $requiredStart;
                }
            }

            // Update free times for all wizards
            for ($i = 0; $i < $n; $i++) {
                $freeTime[$i] = $start + $prefix[$i + 1] * $x;
            }
        }

        return $freeTime[$n - 1];
    }
}
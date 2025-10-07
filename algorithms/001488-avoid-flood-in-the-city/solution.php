<?php

class Solution {

    /**
     * @param Integer[] $rains
     * @return Integer[]
     */
    function avoidFlood($rains) {
        $n = count($rains);
        $ans = array_fill(0, $n, -1);
        $lastRain = []; // Tracks last occurrence of rain for each lake
        $dryDays = new SplMinHeap(); // Min-heap to store available dry days

        for ($i = 0; $i < $n; $i++) {
            if ($rains[$i] == 0) {
                // Store dry day index
                $dryDays->insert($i);
                // Temporarily mark as 1 (can be changed later)
                $ans[$i] = 1;
            } else {
                $lake = $rains[$i];
                if (isset($lastRain[$lake])) {
                    // Need to find a dry day between last rain and current rain
                    $candidates = [];
                    $found = false;

                    // Find the earliest dry day after last rain on this lake
                    while (!$dryDays->isEmpty()) {
                        $dryIndex = $dryDays->extract();
                        if ($dryIndex > $lastRain[$lake]) {
                            // Found a valid dry day
                            $ans[$dryIndex] = $lake;
                            $found = true;
                            break;
                        } else {
                            // Store candidates that are too early
                            $candidates[] = $dryIndex;
                        }
                    }

                    // Push back candidates that were too early
                    foreach ($candidates as $candidate) {
                        $dryDays->insert($candidate);
                    }

                    if (!$found) {
                        return [];
                    }
                }
                // Update last rain day for this lake
                $lastRain[$lake] = $i;
            }
        }

        return $ans;
    }
}
<?php

class Solution {

    /**
     * @param Integer[][] $img1
     * @param Integer[][] $img2
     * @return Integer
     */
    function largestOverlap(array $img1, array $img2): int
    {
        $n = count($img1);
        $ones1 = [];
        $ones2 = [];

        // Collect all positions of 1s in both images
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($img1[$i][$j] == 1) {
                    $ones1[] = [$i, $j];
                }
                if ($img2[$i][$j] == 1) {
                    $ones2[] = [$i, $j];
                }
            }
        }

        // Count overlaps for each translation vector
        $overlapCount = [];
        $maxOverlap = 0;

        foreach ($ones1 as $pos1) {
            foreach ($ones2 as $pos2) {
                // Calculate translation vector
                $dx = $pos2[0] - $pos1[0];
                $dy = $pos2[1] - $pos1[1];
                $key = $dx . "," . $dy;

                if (!isset($overlapCount[$key])) {
                    $overlapCount[$key] = 0;
                }
                $overlapCount[$key]++;
                $maxOverlap = max($maxOverlap, $overlapCount[$key]);
            }
        }

        return $maxOverlap;
    }
}
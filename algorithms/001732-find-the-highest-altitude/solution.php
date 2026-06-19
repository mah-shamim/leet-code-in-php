<?php

class Solution {

    /**
     * @param Integer[] $gain
     * @return Integer
     */
    function largestAltitude(array $gain): int
    {
        $currentAltitude = 0;
        $maxAltitude = 0;

        foreach ($gain as $g) {
            $currentAltitude += $g;
            if ($currentAltitude > $maxAltitude) {
                $maxAltitude = $currentAltitude;
            }
        }

        return $maxAltitude;
    }
}
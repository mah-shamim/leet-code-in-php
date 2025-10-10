<?php

class Solution {

    /**
     * @param Integer[] $energy
     * @param Integer $k
     * @return Integer
     */
    function maximumEnergy($energy, $k) {
        $n = count($energy);
        $dp = array_fill(0, $n, 0);
        $maxEnergy = PHP_INT_MIN;

        for ($i = $n - 1; $i >= 0; $i--) {
            $dp[$i] = $energy[$i];
            if ($i + $k < $n) {
                $dp[$i] += $dp[$i + $k];
            }
            if ($dp[$i] > $maxEnergy) {
                $maxEnergy = $dp[$i];
            }
        }

        return $maxEnergy;
    }
}
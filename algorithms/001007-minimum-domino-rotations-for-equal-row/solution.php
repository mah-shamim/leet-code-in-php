<?php

class Solution {

    /**
     * @param Integer[] $tops
     * @param Integer[] $bottoms
     * @return Integer
     */
    function minDominoRotations($tops, $bottoms) {
        $n = count($tops);
        $candidates = array($tops[0], $bottoms[0]);
        $candidates = array_unique($candidates);
        $min_rotations = PHP_INT_MAX;

        foreach ($candidates as $x) {
            $valid = true;
            $rot_top = 0;
            $rot_bottom = 0;
            for ($i = 0; $i < $n; $i++) {
                $t = $tops[$i];
                $b = $bottoms[$i];
                if ($t != $x && $b != $x) {
                    $valid = false;
                    break;
                }
                if ($t != $x) {
                    $rot_top++;
                }
                if ($b != $x) {
                    $rot_bottom++;
                }
            }
            if ($valid) {
                $current_min = min($rot_top, $rot_bottom);
                if ($current_min < $min_rotations) {
                    $min_rotations = $current_min;
                }
            }
        }

        return $min_rotations != PHP_INT_MAX ? $min_rotations : -1;
    }
}
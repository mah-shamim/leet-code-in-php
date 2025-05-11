<?php

class Solution {

    /**
     * @param String $dominoes
     * @return String
     */
    function pushDominoes($dominoes) {
        $n = strlen($dominoes);
        $forceR = array_fill(0, $n, 1000000000);
        $forceL = array_fill(0, $n, 1000000000);

        // Left to right pass for R forces
        $current_force = -1;
        for ($i = 0; $i < $n; $i++) {
            $c = $dominoes[$i];
            if ($c == 'R') {
                $current_force = 0;
            } elseif ($c == 'L') {
                $current_force = -1;
            } else {
                if ($current_force != -1) {
                    $current_force++;
                    $forceR[$i] = $current_force;
                } else {
                    $forceR[$i] = 1000000000;
                }
            }
        }

        // Right to left pass for L forces
        $current_force = -1;
        for ($i = $n - 1; $i >= 0; $i--) {
            $c = $dominoes[$i];
            if ($c == 'L') {
                $current_force = 0;
            } elseif ($c == 'R') {
                $current_force = -1;
            } else {
                if ($current_force != -1) {
                    $current_force++;
                    $forceL[$i] = $current_force;
                } else {
                    $forceL[$i] = 1000000000;
                }
            }
        }

        // Build the result
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            $c = $dominoes[$i];
            if ($c != '.') {
                $result[] = $c;
            } else {
                $r = $forceR[$i];
                $l = $forceL[$i];
                if ($r < $l) {
                    $result[] = 'R';
                } elseif ($l < $r) {
                    $result[] = 'L';
                } else {
                    $result[] = '.';
                }
            }
        }

        return implode('', $result);
    }
}
<?php

class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function numberOfPairs($points) {
        $n = count($points);
        $count = 0;
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i == $j) {
                    continue;
                }
                $A = $points[$i];
                $B = $points[$j];
                if ($A[0] <= $B[0] && $A[1] >= $B[1] && ($A[0] < $B[0] || $A[1] > $B[1])) {
                    $valid = true;
                    for ($k = 0; $k < $n; $k++) {
                        if ($k == $i || $k == $j) {
                            continue;
                        }
                        $C = $points[$k];
                        if ($C[0] >= $A[0] && $C[0] <= $B[0] && $C[1] >= $B[1] && $C[1] <= $A[1]) {
                            $valid = false;
                            break;
                        }
                    }
                    if ($valid) {
                        $count++;
                    }
                }
            }
        }
        return $count;
    }
}
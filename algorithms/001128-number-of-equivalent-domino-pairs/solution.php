<?php

class Solution {

    /**
     * @param Integer[][] $dominoes
     * @return Integer
     */
    function numEquivDominoPairs($dominoes) {
        $freq = array();
        foreach ($dominoes as $d) {
            $min = min($d[0], $d[1]);
            $max = max($d[0], $d[1]);
            $key = "$min,$max";
            if (isset($freq[$key])) {
                $freq[$key]++;
            } else {
                $freq[$key] = 1;
            }
        }
        $total = 0;
        foreach ($freq as $count) {
            if ($count >= 2) {
                $total += $count * ($count - 1) / 2;
            }
        }
        return $total;
    }
}
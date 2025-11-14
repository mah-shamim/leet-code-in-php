<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $queries
     * @return Integer[][]
     */
    function rangeAddQueries($n, $queries) {
        $mat = array_fill(0, $n, array_fill(0, $n, 0));
        $diff = array_fill(0, $n, array_fill(0, $n + 1, 0));

        foreach ($queries as $q) {
            list($r1, $c1, $r2, $c2) = $q;
            for ($i = $r1; $i <= $r2; $i++) {
                $diff[$i][$c1] += 1;
                if ($c2 + 1 < $n) {
                    $diff[$i][$c2 + 1] -= 1;
                }
            }
        }

        for ($i = 0; $i < $n; $i++) {
            $current = 0;
            for ($j = 0; $j < $n; $j++) {
                $current += $diff[$i][$j];
                $mat[$i][$j] = $current;
            }
        }

        return $mat;
    }
}
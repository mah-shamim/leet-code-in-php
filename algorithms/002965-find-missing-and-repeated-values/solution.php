<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[]
     */
    function findMissingAndRepeatedValues($grid) {
        $sum = 0;
        $counts = array();
        foreach ($grid as $row) {
            foreach ($row as $num) {
                $sum += $num;
                if (isset($counts[$num])) {
                    $counts[$num]++;
                } else {
                    $counts[$num] = 1;
                }
            }
        }

        $a = 0;
        foreach ($counts as $num => $cnt) {
            if ($cnt == 2) {
                $a = $num;
                break;
            }
        }

        $n = count($grid);
        $max = $n * $n;
        $S = $max * ($max + 1) / 2;
        $b = $a + ($S - $sum);

        return array($a, $b);
    }
}
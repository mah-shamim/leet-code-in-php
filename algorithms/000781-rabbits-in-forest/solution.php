<?php

class Solution {

    /**
     * @param Integer[] $answers
     * @return Integer
     */
    function numRabbits($answers) {
        $freq = array();
        foreach ($answers as $ans) {
            if (isset($freq[$ans])) {
                $freq[$ans]++;
            } else {
                $freq[$ans] = 1;
            }
        }
        $total = 0;
        foreach ($freq as $x => $cnt) {
            if ($x == 0) {
                $total += $cnt;
            } else {
                $denominator = $x + 1;
                $groups = (int)(($cnt + $x) / $denominator);
                $total += $groups * $denominator;
            }
        }
        return $total;
    }
}
<?php

class Solution {

    /**
     * @param String $formula
     * @return String
     */
    function countOfAtoms($formula) {
        $len = strlen($formula);
        $i = 0;
        $stack = [];
        $counter = [];

        while ($i < $len) {
            if ($formula[$i] === '(') {
                array_push($stack, $counter);
                $counter = [];
                $i++;
            } elseif ($formula[$i] === ')') {
                $i++;
                $multiplier = 0;
                while ($i < $len && is_numeric($formula[$i])) {
                    $multiplier = $multiplier * 10 + intval($formula[$i]);
                    $i++;
                }
                if ($multiplier == 0) {
                    $multiplier = 1;
                }
                foreach ($counter as $atom => $count) {
                    $counter[$atom] = $count * $multiplier;
                }
                $topCounter = array_pop($stack);
                foreach ($counter as $atom => $count) {
                    if (isset($topCounter[$atom])) {
                        $topCounter[$atom] += $count;
                    } else {
                        $topCounter[$atom] = $count;
                    }
                }
                $counter = $topCounter;
            } else {
                $start = $i;
                $i++;
                while ($i < $len && ctype_lower($formula[$i])) {
                    $i++;
                }
                $atom = substr($formula, $start, $i - $start);
                $start = $i;
                while ($i < $len && is_numeric($formula[$i])) {
                    $i++;
                }
                $count = $i > $start ? intval(substr($formula, $start, $i - $start)) : 1;
                if (isset($counter[$atom])) {
                    $counter[$atom] += $count;
                } else {
                    $counter[$atom] = $count;
                }
            }
        }

        ksort($counter);
        $result = '';
        foreach ($counter as $atom => $count) {
            $result .= $atom;
            if ($count > 1) {
                $result .= $count;
            }
        }

        return $result;
    }
}
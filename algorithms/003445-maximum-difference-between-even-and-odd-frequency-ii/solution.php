<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxDifference($s, $k) {
        $chars = array('0', '1', '2', '3', '4');
        $permutations = array();
        foreach ($chars as $a) {
            foreach ($chars as $b) {
                if ($a != $b) {
                    $permutations[] = array($a, $b);
                }
            }
        }

        $ans = PHP_INT_MIN;
        $n = strlen($s);

        foreach ($permutations as $pair) {
            $a = $pair[0];
            $b = $pair[1];
            $prefixA = array(0);
            $prefixB = array(0);
            $minDiff = array(
                array(PHP_INT_MAX, PHP_INT_MAX),
                array(PHP_INT_MAX, PHP_INT_MAX)
            );
            $l = 0;

            for ($r = 0; $r < $n; $r++) {
                $lastA = end($prefixA);
                $lastB = end($prefixB);
                $char = $s[$r];
                $nextA = $lastA + ($char == $a ? 1 : 0);
                $nextB = $lastB + ($char == $b ? 1 : 0);
                array_push($prefixA, $nextA);
                array_push($prefixB, $nextB);

                while (($r - $l + 1) >= $k &&
                    $prefixA[$l] < end($prefixA) &&
                    $prefixB[$l] < end($prefixB)) {
                    $pA = $prefixA[$l] % 2;
                    $pB = $prefixB[$l] % 2;
                    $diff = $prefixA[$l] - $prefixB[$l];
                    if ($diff < $minDiff[$pA][$pB]) {
                        $minDiff[$pA][$pB] = $diff;
                    }
                    $l++;
                }

                $curA = end($prefixA);
                $curB = end($prefixB);
                $stateA = 1 - ($curA % 2);
                $stateB = $curB % 2;
                $candidate = ($curA - $curB) - $minDiff[$stateA][$stateB];
                if ($candidate > $ans) {
                    $ans = $candidate;
                }
            }
        }

        return $ans;
    }
}
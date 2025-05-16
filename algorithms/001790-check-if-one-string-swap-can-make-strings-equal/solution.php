<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function areAlmostEqual($s1, $s2) {
        if ($s1 === $s2) {
            return true;
        }

        $diff = [];
        for ($i = 0; $i < strlen($s1); $i++) {
            if ($s1[$i] != $s2[$i]) {
                array_push($diff, $i);
            }
            if (count($diff) > 2) {
                return false;
            }
        }

        if (count($diff) != 2) {
            return false;
        }

        $i = $diff[0];
        $j = $diff[1];
        return ($s1[$i] == $s2[$j] && $s1[$j] == $s2[$i]);
    }
}
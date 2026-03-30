<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkStrings(string $s1, string $s2): bool
    {
        $even1 = array_fill(0, 26, 0);
        $odd1 = array_fill(0, 26, 0);
        $even2 = array_fill(0, 26, 0);
        $odd2 = array_fill(0, 26, 0);

        $len = strlen($s1);
        for ($i = 0; $i < $len; $i++) {
            $c1 = ord($s1[$i]) - ord('a');
            $c2 = ord($s2[$i]) - ord('a');
            if ($i % 2 == 0) {
                $even1[$c1]++;
                $even2[$c2]++;
            } else {
                $odd1[$c1]++;
                $odd2[$c2]++;
            }
        }

        return $even1 == $even2 && $odd1 == $odd2;
    }
}
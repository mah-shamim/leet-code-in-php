<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function reverseDegree(string $s): int
    {
        $sum = 0;
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            $positionInString = $i + 1;
            $positionInReversedAlphabet = 26 - (ord($s[$i]) - ord('a'));

            $sum += $positionInString * $positionInReversedAlphabet;
        }

        return $sum;
    }
}
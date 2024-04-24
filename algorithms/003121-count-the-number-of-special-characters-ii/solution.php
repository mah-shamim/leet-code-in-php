<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function numberOfSpecialChars(string $word): int
    {
        $first = array_fill(0, ord('z') + 1, 0);
        $last = array_fill(0, ord('z') + 1, 0);
        for ($i = 1; $i <= strlen($word); ++$i) {
            $j = ord($word[$i - 1]);
            if ($first[$j] == 0) {
                $first[$j] = $i;
            }
            $last[$j] = $i;
        }
        $ans = 0;
        for ($i = 0; $i < 26; ++$i) {
            if ($last[ord('a') + $i] && $first[ord('A') + $i] && $last[ord('a') + $i] < $first[ord('A') + $i]) {
                ++$ans;
            }
        }
        return $ans;
    }
}
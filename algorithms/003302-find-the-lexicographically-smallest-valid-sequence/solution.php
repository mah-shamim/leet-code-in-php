<?php

class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer[]
     */
    function validSequence(string $word1, string $word2): array
    {
        $n = strlen($word1);
        $m = strlen($word2);
        $ans = array_fill(0, $m, 0);

        // last[j] := the index i of the last occurrence in word1,
        // where word1[i] == word2[j]
        $last = array_fill(0, $m, -1);

        $i = $n - 1;
        $j = $m - 1;
        while ($i >= 0 && $j >= 0) {
            if ($word1[$i] == $word2[$j]) {
                $last[$j] = $i;
                $j--;
            }
            $i--;
        }

        $canSkip = true;
        $j = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($j == $m) {
                break;
            }
            if ($word1[$i] == $word2[$j]) {
                $ans[$j] = $i;
                $j++;
            } else if ($canSkip && ($j == $m - 1 || $i < $last[$j + 1])) {
                $canSkip = false;
                $ans[$j] = $i;
                $j++;
            }
        }

        return $j == $m ? $ans : [];
    }
}
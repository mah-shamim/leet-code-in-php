<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function minimumDistance(string $word): int
    {
        $n = strlen($word);
        if ($n == 0) return 0;

        // Precompute distances between letters
        $dist = array_fill(0, 26, array_fill(0, 26, 0));
        for ($i = 0; $i < 26; $i++) {
            $xi = intdiv($i, 6);
            $yi = $i % 6;
            for ($j = 0; $j < 26; $j++) {
                $xj = intdiv($j, 6);
                $yj = $j % 6;
                $dist[$i][$j] = abs($xi - $xj) + abs($yi - $yj);
            }
        }

        $lastChar = ord($word[0]) - ord('A');

        // dp[f] = min distance with one finger at word[i-1] and the other at f
        $dp = array_fill(0, 26, 0);

        for ($i = 1; $i < $n; $i++) {
            $currChar = ord($word[$i]) - ord('A');
            $nextDp = array_fill(0, 26, PHP_INT_MAX);

            for ($f = 0; $f < 26; $f++) {
                if ($dp[$f] == PHP_INT_MAX) continue;

                // Case 1: Use finger at lastChar to type currChar
                $cost1 = $dp[$f] + $dist[$lastChar][$currChar];
                $nextDp[$f] = min($nextDp[$f], $cost1);

                // Case 2: Use finger at f to type currChar
                $cost2 = $dp[$f] + $dist[$f][$currChar];
                $nextDp[$lastChar] = min($nextDp[$lastChar], $cost2);
            }

            $dp = $nextDp;
            $lastChar = $currChar;
        }

        return min($dp);
    }
}
<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestBalanced(string $s): int
    {
        $n = strlen($s);
        $maxLen = 0;

        for ($i = 0; $i < $n; $i++) {
            $freq = array_fill(0, 26, 0);
            for ($j = $i; $j < $n; $j++) {
                $idx = ord($s[$j]) - ord('a');
                $freq[$idx]++;

                // Find min and max frequency among characters that appear
                $minF = PHP_INT_MAX;
                $maxF = 0;
                $hasAny = false;
                for ($k = 0; $k < 26; $k++) {
                    if ($freq[$k] > 0) {
                        $hasAny = true;
                        if ($freq[$k] < $minF) $minF = $freq[$k];
                        if ($freq[$k] > $maxF) $maxF = $freq[$k];
                    }
                }

                // All distinct characters appear the same number of times
                if ($hasAny && $minF == $maxF) {
                    $maxLen = max($maxLen, $j - $i + 1);
                }
            }
        }

        return $maxLen;
    }
}
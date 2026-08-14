<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maximumLengthSubstring(string $s): int
    {
        $maxLen = 0;
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            $freq = array_fill(0, 26, 0);
            for ($j = $i; $j < $n; $j++) {
                $index = ord($s[$j]) - ord('a');
                $freq[$index]++;
                if ($freq[$index] > 2) {
                    break;
                }
                $maxLen = max($maxLen, $j - $i + 1);
            }
        }

        return $maxLen;
    }
}
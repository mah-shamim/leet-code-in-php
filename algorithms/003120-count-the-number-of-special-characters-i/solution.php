<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function numberOfSpecialChars(string $word): int
    {
        $lower = array_fill(0, 26, false);
        $upper = array_fill(0, 26, false);

        // Mark presence of lowercase and uppercase letters
        for ($i = 0; $i < strlen($word); $i++) {
            $ch = $word[$i];
            if (ctype_lower($ch)) {
                $lower[ord($ch) - ord('a')] = true;
            } else {
                $upper[ord($ch) - ord('A')] = true;
            }
        }

        // Count how many letters appear in both cases
        $count = 0;
        for ($i = 0; $i < 26; $i++) {
            if ($lower[$i] && $upper[$i]) {
                $count++;
            }
        }

        return $count;
    }
}
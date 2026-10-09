<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minInsertions(string $s): int
    {
        $n = strlen($s);
        $open = 0;   // unmatched '('
        $ans = 0;    // minimum insertions

        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] === '(') {
                $open++;
            } else {
                // Current char is ')'
                if ($i + 1 < $n && $s[$i + 1] === ')' && $open > 0) {
                    // Use one '(' to match "))"
                    $open--;
                    $i++; // consume the second ')'
                } elseif ($open > 0) {
                    // Only one ')' available for an unmatched '('
                    // Insert one more ')' to make "))"
                    $ans++;
                    $open--;
                } else {
                    // No unmatched '(' available
                    if ($i + 1 < $n && $s[$i + 1] === ')') {
                        // Insert '(' before "))"
                        $ans++;
                        $i++; // consume the second ')'
                    } else {
                        // Single ')' with no '('
                        // Need to insert '(' and one more ')'
                        $ans += 2;
                    }
                }
            }
        }

        // Each remaining '(' needs two ')'
        $ans += $open * 2;

        return $ans;
    }
}
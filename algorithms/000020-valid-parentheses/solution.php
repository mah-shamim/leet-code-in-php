<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid(string $s): bool
    {
        $stack = [];

        // Map each closing bracket to its matching opening bracket.
        $pairs = [
            ')' => '(',
            ']' => '[',
            '}' => '{',
        ];

        for ($i = 0, $length = strlen($s); $i < $length; $i++) {
            $char = $s[$i];

            if ($char === '(' || $char === '[' || $char === '{') {
                // Opening bracket: store it for later matching.
                $stack[] = $char;
            } else {
                // Closing bracket without a corresponding opening bracket.
                if (empty($stack)) {
                    return false;
                }

                $openingBracket = array_pop($stack);

                // The most recent opening bracket must match this closing bracket.
                if ($openingBracket !== $pairs[$char]) {
                    return false;
                }
            }
        }

        // Any remaining opening brackets were never closed.
        return empty($stack);
    }
}
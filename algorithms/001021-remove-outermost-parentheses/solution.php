<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeOuterParentheses(string $s): string
    {
        $result = '';
        $depth = 0;
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] === '(') {
                // Skip the outermost '(' of each primitive part
                if ($depth > 0) {
                    $result .= '(';
                }
                $depth++;
            } else {
                $depth--;

                // Skip the outermost ')' of each primitive part
                if ($depth > 0) {
                    $result .= ')';
                }
            }
        }

        return $result;
    }
}
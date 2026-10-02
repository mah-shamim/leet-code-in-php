<?php

class Solution {

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis(int $n): array
    {
        $result = [];
        $this->backtrack($n, '', 0, 0, $result);
        return $result;
    }

    /**
     * @param int $n
     * @param string $current
     * @param int $open
     * @param int $close
     * @param array $result
     * @return void
     */
    private function backtrack(int $n, string $current, int $open, int $close, array &$result): void {
        // If the string has used all 2*n parentheses
        if (strlen($current) === 2 * $n) {
            $result[] = $current;
            return;
        }

        // We can add '(' if we haven't used all opening brackets
        if ($open < $n) {
            $this->backtrack($n, $current . '(', $open + 1, $close, $result);
        }

        // We can add ')' only if it won't make the sequence invalid
        if ($close < $open) {
            $this->backtrack($n, $current . ')', $open, $close + 1, $result);
        }
    }
}
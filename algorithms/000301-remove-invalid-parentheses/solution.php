<?php

class Solution {

    /**
     * @param String $s
     * @return String[]
     */
    function removeInvalidParentheses(string $s): array
    {
        $leftRem = 0;
        $rightRem = 0;
        $balance = 0;
        $n = strlen($s);

        // Count minimum parentheses that must be removed.
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] === '(') {
                $balance++;
            } elseif ($s[$i] === ')') {
                if ($balance > 0) {
                    $balance--;
                } else {
                    $rightRem++;
                }
            }
        }
        $leftRem = $balance;

        $result = [];
        $this->dfs($s, $n, 0, $leftRem, $rightRem, 0, '', $result);

        return array_keys($result);
    }

    /**
     * @param $s
     * @param $n
     * @param $i
     * @param $leftRem
     * @param $rightRem
     * @param $balance
     * @param $path
     * @param $result
     * @return void
     */
    private function dfs($s, $n, $i, $leftRem, $rightRem, $balance, $path, &$result): void
    {
        if ($i === $n) {
            if ($leftRem === 0 && $rightRem === 0 && $balance === 0) {
                $result[$path] = true;
            }
            return;
        }

        $ch = $s[$i];

        if ($ch === '(') {
            // Remove this '('
            if ($leftRem > 0) {
                $this->dfs($s, $n, $i + 1, $leftRem - 1, $rightRem, $balance, $path, $result);
            }

            // Keep this '('
            $this->dfs($s, $n, $i + 1, $leftRem, $rightRem, $balance + 1, $path . '(', $result);
        } elseif ($ch === ')') {
            // Remove this ')'
            if ($rightRem > 0) {
                $this->dfs($s, $n, $i + 1, $leftRem, $rightRem - 1, $balance, $path, $result);
            }

            // Keep this ')' only if it can match an opening bracket
            if ($balance > 0) {
                $this->dfs($s, $n, $i + 1, $leftRem, $rightRem, $balance - 1, $path . ')', $result);
            }
        } else {
            // Keep letters
            $this->dfs($s, $n, $i + 1, $leftRem, $rightRem, $balance, $path . $ch, $result);
        }
    }
}
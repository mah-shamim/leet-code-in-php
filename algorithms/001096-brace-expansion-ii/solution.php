<?php

class Solution {
    private string $s;
    private int $n;

    /**
     * @param String $expression
     * @return String[]
     */
    function braceExpansionII(string $expression): array
    {
        $this->s = $expression;
        $this->n = strlen($expression);

        $i = 0;
        $ans = $this->parseAlternative($i);

        sort($ans);

        return $ans;
    }

    /**
     * Parse a concatenated expression until ',' or '}' or end of string.
     *
     * @param int $i
     * @return string[]
     */
    private function parseAlternative(int &$i): array {
        // Empty string is the identity for concatenation.
        $set = ['' => true];

        while ($i < $this->n) {
            $c = $this->s[$i];

            if ($c === ',' || $c === '}') {
                break;
            }

            if ($c === '{') {
                $i++; // skip '{'

                $termSet = [];

                while (true) {
                    $alternative = $this->parseAlternative($i);

                    foreach ($alternative as $word) {
                        $termSet[$word] = true;
                    }

                    if ($i < $this->n && $this->s[$i] === ',') {
                        $i++;
                        continue;
                    }

                    break;
                }

                if ($i < $this->n && $this->s[$i] === '}') {
                    $i++; // skip '}'
                }

                $term = array_keys($termSet);
            } else {
                $term = [$c];
                $i++;
            }

            $next = [];

            foreach (array_keys($set) as $left) {
                foreach ($term as $right) {
                    $next[$left . $right] = true;
                }
            }

            $set = $next;
        }

        return array_keys($set);
    }
}
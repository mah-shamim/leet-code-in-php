<?php

class Solution {

    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */
    function generateString(string $str1, string $str2): string
    {
        $n = strlen($str1);
        $m = strlen($str2);

        $N = $n + $m - 1;

        // Initialize word with '$'
        $word = array_fill(0, $N, '$');
        $canChange = array_fill(0, $N, false);

        // Process 'T'
        for ($i = 0; $i < $n; $i++) {
            if ($str1[$i] === 'T') {
                $i_ = $i;

                for ($j = 0; $j < $m; $j++) {
                    if ($word[$i_] !== '$' && $word[$i_] !== $str2[$j]) {
                        return "";
                    }

                    $word[$i_] = $str2[$j];
                    $i_++;
                }
            }
        }

        // Fill remaining spaces with 'a'
        for ($i = 0; $i < $N; $i++) {
            if ($word[$i] === '$') {
                $word[$i] = 'a';
                $canChange[$i] = true;
            }
        }

        // Process 'F'
        // T.C : O(n * m)
        // S.C : O(N)
        for ($i = 0; $i < $n; $i++) {
            if ($str1[$i] === 'F') {

                if ($this->isSame($word, $str2, $i, $m)) {

                    $changed = false;

                    for ($k = $i + $m - 1; $k >= $i; $k--) {
                        if ($canChange[$k] === true) {
                            $word[$k] = 'b';
                            $changed = true;
                            break;
                        }
                    }

                    if ($changed === false) {
                        return "";
                    }
                }
            }
        }

        return implode('', $word);
    }

    /**
     * @param $word
     * @param $str2
     * @param $i
     * @param $m
     * @return bool
     */
    private function isSame(&$word, $str2, $i, $m): bool
    {
        for ($j = 0; $j < $m; $j++) {
            if ($word[$i] !== $str2[$j]) {
                return false;
            }
            $i++;
        }
        return true;
    }
}
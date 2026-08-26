<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function shortestBeautifulSubstring(string $s, int $k): string
    {
        $n = strlen($s);
        $best = null;
        $bestLen = PHP_INT_MAX;

        for ($i = 0; $i < $n; $i++) {
            $ones = 0;
            for ($j = $i; $j < $n; $j++) {
                if ($s[$j] == '1') $ones++;
                if ($ones > $k) break;
                if ($ones == $k) {
                    $len = $j - $i + 1;
                    $sub = substr($s, $i, $len);
                    if ($len < $bestLen) {
                        $bestLen = $len;
                        $best = $sub;
                    } elseif ($len == $bestLen && $sub < $best) {
                        $best = $sub;
                    }
                    break; // shortest for this i
                }
            }
        }

        return $best ?? "";
    }
}
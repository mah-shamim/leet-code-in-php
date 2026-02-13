<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestBalanced($s): int
    {
        $n = strlen($s);
        // Case 1: longest run of the same character
        $max1 = 1;
        $cur = 1;
        for ($i = 1; $i < $n; $i++) {
            if ($s[$i] == $s[$i - 1]) {
                $cur++;
                if ($cur > $max1) $max1 = $cur;
            } else {
                $cur = 1;
            }
        }

        // Helper for case 2: longest substring containing only $x and $y (no $z)
        // with equal counts of $x and $y.
        $longestTwo = function($s, $x, $y, $z) {
            $n = strlen($s);
            $maxLen = 0;
            $i = 0;
            while ($i < $n) {
                // skip all $z characters
                while ($i < $n && $s[$i] == $z) $i++;
                if ($i >= $n) break;

                $start = $i;                 // beginning of a segment without $z
                $prefix = 0;
                $map = [0 => $start - 1];    // prefix value => first index (before segment)
                $j = $start;

                while ($j < $n && $s[$j] != $z) {
                    if ($s[$j] == $x) {
                        $prefix++;
                    } else { // must be $y
                        $prefix--;
                    }

                    if (isset($map[$prefix])) {
                        $len = $j - $map[$prefix];
                        if ($len > $maxLen) $maxLen = $len;
                    } else {
                        $map[$prefix] = $j;
                    }
                    $j++;
                }

                // next starting point
                $i = ($j < $n) ? $j + 1 : $n;
            }
            return $maxLen;
        };

        // Case 2: handle the three possible pairs
        $max2 = 0;
        $pairs = [
            ['a', 'b', 'c'],
            ['a', 'c', 'b'],
            ['b', 'c', 'a']
        ];
        foreach ($pairs as $pair) {
            list($x, $y, $z) = $pair;
            $max2 = max($max2, $longestTwo($s, $x, $y, $z));
        }

        // Case 3: all three characters appear equally often
        $max3 = 0;
        $map3 = ["0,0" => -1];   // (count_a - count_b, count_a - count_c) -> first index
        $ca = $cb = $cc = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] == 'a') $ca++;
            elseif ($s[$i] == 'b') $cb++;
            else $cc++; // 'c'

            $dx = $ca - $cb;
            $dy = $ca - $cc;
            $key = $dx . ',' . $dy;

            if (isset($map3[$key])) {
                $len = $i - $map3[$key];
                if ($len > $max3) $max3 = $len;
            } else {
                $map3[$key] = $i;
            }
        }

        return max($max1, $max2, $max3);
    }
}
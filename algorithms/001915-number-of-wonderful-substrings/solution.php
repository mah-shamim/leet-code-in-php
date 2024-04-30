<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function wonderfulSubstrings(string $word): int
    {
        $ans = 0;
        $prefix = 0;           // the binary prefix
        $count = array_fill(0, 1024, 0);  // the binary prefix count
        $count[0] = 1;             // the empty string ""

        foreach(str_split($word) as $c) {
            $prefix ^= 1 << ord($c) - ord('a');
            // All the letters occur even number of times.
            $ans += $count[$prefix];
            // ('a' + i) occurs odd number of times.
            for ($i = 0; $i < 10; ++$i)
                $ans += $count[$prefix ^ 1 << $i];
            ++$count[$prefix];
        }

        return $ans;
    }
}
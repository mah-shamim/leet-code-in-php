<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function possibleStringCount($word) {
        $n = strlen($word);
        $total = 1;
        $i = 0;
        while ($i < $n) {
            $j = $i;
            while ($j < $n && $word[$j] == $word[$i]) {
                $j++;
            }
            $len = $j - $i;
            $total += $len - 1;
            $i = $j;
        }
        return $total;
    }
}
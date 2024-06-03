<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Integer
     */
    function appendCharacters($s, $t) {
        $i = 0;  // t's index

        foreach(str_split($s) as $c) {
            if ($c == $t[$i]) {
                if (++$i == strlen($t)) {
                    return 0;
                }
            }
        }

        return strlen($t) - $i;
    }
}
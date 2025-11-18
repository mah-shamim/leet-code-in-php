<?php

class Solution {

    /**
     * @param Integer[] $bits
     * @return Boolean
     */
    function isOneBitCharacter($bits) {
        $i = 0;
        $n = count($bits);
        while ($i < $n - 1) {
            if ($bits[$i] == 1) {
                $i += 2;
            } else {
                $i += 1;
            }
        }
        return $i == $n - 1;
    }
}
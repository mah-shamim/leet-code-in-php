<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function minimumOneBitOperations($n) {
        $result = 0;
        while ($n) {
            $result ^= $n;
            $n >>= 1;
        }
        return $result;
    }
}
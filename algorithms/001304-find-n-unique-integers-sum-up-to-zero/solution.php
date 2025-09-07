<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function sumZero($n) {
        $result = [];
        if ($n % 2 != 0) {
            $result[] = 0;
            $n--;
        }
        for ($i = 1; $i <= $n / 2; $i++) {
            $result[] = $i;
            $result[] = -$i;
        }
        return $result;
    }
}
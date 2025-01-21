<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function getLucky($s, $k) {
        // Step 1: Convert the string into an integer
        $numStr = '';
        for ($i = 0; $i < strlen($s); $i++) {
            $numStr .= (ord($s[$i]) - ord('a') + 1);
        }

        // Step 2: Transform the integer by summing its digits k times
        for ($i = 0; $i < $k; $i++) {
            $sum = 0;
            for ($j = 0; $j < strlen($numStr); $j++) {
                $sum += intval($numStr[$j]);
            }
            $numStr = strval($sum);
        }

        return intval($numStr);
    }
}
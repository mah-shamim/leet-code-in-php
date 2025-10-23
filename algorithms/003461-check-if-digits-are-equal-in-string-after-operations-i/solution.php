<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function hasSameDigits($s) {
        while (strlen($s) > 2) {
            $new_s = '';
            for ($i = 0; $i < strlen($s) - 1; $i++) {
                $sum = (intval($s[$i]) + intval($s[$i + 1])) % 10;
                $new_s .= strval($sum);
            }
            $s = $new_s;
        }
        return $s[0] == $s[1];
    }
}
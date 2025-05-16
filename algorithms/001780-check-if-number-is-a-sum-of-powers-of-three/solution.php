<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function checkPowersOfThree($n) {
        while ($n > 0) {
            $remainder = $n % 3;
            if ($remainder == 2) {
                return false;
            }
            $n = (int) ($n / 3);
        }
        return true;
    }
}
<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function getNoZeroIntegers($n) {
        for ($i = 1; $i <= $n / 2; $i++) {
            if (isNoZero($i) && isNoZero($n - $i)) {
                return [$i, $n - $i];
            }
        }
        return [];
    }

    /**
     * @param $num
     * @return bool
     */
    function isNoZero($num) {
        while ($num > 0) {
            if ($num % 10 == 0) {
                return false;
            }
            $num = (int)($num / 10);
        }
        return true;
    }
}
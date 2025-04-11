<?php

class Solution {

    /**
     * @param Integer $low
     * @param Integer $high
     * @return Integer
     */
    function countSymmetricIntegers($low, $high) {
        $count = 0;
        for ($num = $low; $num <= $high; $num++) {
            $s = (string)$num;
            $len = strlen($s);
            if ($len % 2 != 0) {
                continue;
            }
            $half = $len / 2;
            $sum1 = 0;
            for ($i = 0; $i < $half; $i++) {
                $sum1 += intval($s[$i]);
            }
            $sum2 = 0;
            for ($i = $half; $i < $len; $i++) {
                $sum2 += intval($s[$i]);
            }
            if ($sum1 == $sum2) {
                $count++;
            }
        }
        return $count;
    }
}
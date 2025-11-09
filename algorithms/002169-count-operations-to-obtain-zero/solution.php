<?php

class Solution {

    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function countOperations($num1, $num2) {
        $count = 0;
        while ($num1 > 0 && $num2 > 0) {
            if ($num1 >= $num2) {
                $count += intdiv($num1, $num2);
                $num1 %= $num2;
            } else {
                $count += intdiv($num2, $num1);
                $num2 %= $num1;
            }
        }
        return $count;
    }
}
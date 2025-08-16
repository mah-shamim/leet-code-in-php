<?php

class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function maximum69Number ($num) {
        $str = (string)$num;
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            if ($str[$i] == '6') {
                $str[$i] = '9';
                break;
            }
        }
        return (int)$str;
    }
}
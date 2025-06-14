<?php

class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function minMaxDifference($num) {
        $s = (string)$num;
        $n = strlen($s);
        $max_str = $s;
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] != '9') {
                $d = $s[$i];
                $max_str = str_replace($d, '9', $s);
                break;
            }
        }
        $d0 = $s[0];
        $min_str = str_replace($d0, '0', $s);
        $max_val = (int)$max_str;
        $min_val = (int)$min_str;
        return $max_val - $min_val;
    }
}
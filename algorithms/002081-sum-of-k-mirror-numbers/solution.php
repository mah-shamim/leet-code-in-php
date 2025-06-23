<?php

class Solution {

    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer
     */
    function kMirror($k, $n) {
        $res = array();
        $L = 1;
        while (count($res) < $n) {
            if ($L % 2 == 0) {
                $d = $L / 2;
                $start = (int)pow(10, $d-1);
                $end = (int)(pow(10, $d) - 1);
                for ($x = $start; $x <= $end; $x++) {
                    $s = (string)$x;
                    $num_str = $s . strrev($s);
                    $num_val = (int)$num_str;
                    if ($this->is_basek_palindrome($num_val, $k)) {
                        $res[] = $num_val;
                        if (count($res) == $n) {
                            break 2;
                        }
                    }
                }
            } else {
                $d = (int)(($L+1)/2);
                $start = (int)pow(10, $d-1);
                $end = (int)(pow(10, $d) - 1);
                for ($x = $start; $x <= $end; $x++) {
                    $s = (string)$x;
                    $rev = strrev($s);
                    $num_str = $s . substr($rev, 1);
                    $num_val = (int)$num_str;
                    if ($this->is_basek_palindrome($num_val, $k)) {
                        $res[] = $num_val;
                        if (count($res) == $n) {
                            break 2;
                        }
                    }
                }
            }
            $L++;
        }
        return array_sum($res);
    }

    /**
     * @param $num
     * @param $k
     * @return bool
     */
    function is_basek_palindrome($num, $k) {
        if ($num == 0) {
            return true;
        }
        $s = '';
        $n = $num;
        while ($n > 0) {
            $r = $n % $k;
            $s = (string)$r . $s;
            $n = (int)($n / $k);
        }
        return $s === strrev($s);
    }
}
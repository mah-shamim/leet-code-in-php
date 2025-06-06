<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function robotWithString($s) {
        $n = strlen($s);
        if ($n == 0) {
            return "";
        }
        $min_right = array_fill(0, $n + 1, '');
        $min_right[$n] = chr(ord('z') + 1);

        for ($i = $n - 1; $i >= 0; $i--) {
            $min_right[$i] = min($s[$i], $min_right[$i + 1]);
        }

        $stack = array();
        $res = array();

        for ($i = 0; $i < $n; $i++) {
            array_push($stack, $s[$i]);
            while (!empty($stack)) {
                $top = end($stack);
                if ($top <= $min_right[$i + 1]) {
                    array_pop($stack);
                    $res[] = $top;
                } else {
                    break;
                }
            }
        }

        return implode('', $res);
    }
}
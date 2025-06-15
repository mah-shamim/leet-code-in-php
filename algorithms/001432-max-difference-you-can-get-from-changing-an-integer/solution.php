<?php

class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function maxDiff($num) {
        $s = (string)$num;
        $len = strlen($s);
        $set = array();

        for ($x = 0; $x < 10; $x++) {
            $x_str = (string)$x;
            for ($y = 0; $y < 10; $y++) {
                $y_str = (string)$y;
                $candidate = '';
                for ($i = 0; $i < $len; $i++) {
                    if ($s[$i] === $x_str) {
                        $candidate .= $y_str;
                    } else {
                        $candidate .= $s[$i];
                    }
                }
                if (strlen($candidate) > 1 && $candidate[0] === '0') {
                    continue;
                }
                if ($candidate === "0") {
                    continue;
                }
                $num_val = intval($candidate);
                $set[$num_val] = true;
            }
        }

        if (count($set) == 0) {
            return 0;
        }
        $min_val = min(array_keys($set));
        $max_val = max(array_keys($set));
        return $max_val - $min_val;
    }
}
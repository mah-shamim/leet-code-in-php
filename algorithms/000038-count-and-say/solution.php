<?php

class Solution {

    /**
     * @param Integer $n
     * @return String
     */
    function countAndSay($n) {
        if ($n == 1) {
            return "1";
        }
        $current = "1";
        for ($i = 2; $i <= $n; $i++) {
            $next = "";
            $len = strlen($current);
            $currentChar = $current[0];
            $count = 1;
            for ($j = 1; $j < $len; $j++) {
                if ($current[$j] == $currentChar) {
                    $count++;
                } else {
                    $next .= $count . $currentChar;
                    $currentChar = $current[$j];
                    $count = 1;
                }
            }
            $next .= $count . $currentChar;
            $current = $next;
        }
        return $current;
    }
}
<?php

class Solution {

    /**
     * @param Integer $k
     * @return String
     */
    function kthCharacter($k) {
        $s = "a";
        while (strlen($s) < $k) {
            $t = '';
            $len = strlen($s);
            for ($i = 0; $i < $len; $i++) {
                $c = $s[$i];
                if ($c == 'z') {
                    $t .= 'a';
                } else {
                    $t .= chr(ord($c) + 1);
                }
            }
            $s .= $t;
        }
        return $s[$k - 1];
    }
}
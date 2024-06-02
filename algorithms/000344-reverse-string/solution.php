<?php

class Solution {

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {
        $l = 0;
        $r = count($s) - 1;

        while ($l < $r) {
            list($s[$l], $s[$r]) = array($s[$r], $s[$l]);
            $l++;
            $r--;
        }
    }
}
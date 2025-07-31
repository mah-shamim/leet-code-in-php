<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function subarrayBitwiseORs($arr) {
        $ans = array();
        $cur = array();

        foreach ($arr as $x) {
            $next_cur = array();
            $next_cur[$x] = true;

            foreach ($cur as $key => $dummy) {
                $val = $key | $x;
                $next_cur[$val] = true;
            }

            $cur = $next_cur;

            foreach ($cur as $key => $dummy) {
                $ans[$key] = true;
            }
        }

        return count($ans);
    }
}
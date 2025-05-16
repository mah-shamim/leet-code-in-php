<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function getHappyString($n, $k) {
        $result = array();
        $this->generate("", $n, null, $result);
        return (count($result) >= $k) ? $result[$k - 1] : "";
    }

    /**
     * @param $current
     * @param $remaining
     * @param $last_char
     * @param $result
     * @return void
     */
    function generate($current, $remaining, $last_char, &$result) {
        if ($remaining == 0) {
            array_push($result, $current);
            return;
        }
        $chars = array('a', 'b', 'c');
        foreach ($chars as $c) {
            if ($last_char === null || $c != $last_char) {
                $this->generate($current . $c, $remaining - 1, $c, $result);
            }
        }
    }
}
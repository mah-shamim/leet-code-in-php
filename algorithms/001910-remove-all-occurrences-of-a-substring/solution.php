<?php

class Solution {

    /**
     * @param String $s
     * @param String $part
     * @return String
     */
    function removeOccurrences($s, $part) {
        $partLength = strlen($part);
        if ($partLength == 0) {
            return $s;
        }

        while (true) {
            $pos = strpos($s, $part);
            if ($pos === false) {
                break;
            }
            $s = substr($s, 0, $pos) . substr($s, $pos + $partLength);
        }

        return $s;
    }
}
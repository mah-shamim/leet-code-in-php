<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @param String $fill
     * @return String[]
     */
    function divideString($s, $k, $fill) {
        $n = strlen($s);
        $result = array();
        for ($i = 0; $i < $n; $i += $k) {
            $chunk = substr($s, $i, $k);
            if (strlen($chunk) < $k) {
                $chunk = str_pad($chunk, $k, $fill, STR_PAD_RIGHT);
            }
            $result[] = $chunk;
        }
        return $result;
    }
}
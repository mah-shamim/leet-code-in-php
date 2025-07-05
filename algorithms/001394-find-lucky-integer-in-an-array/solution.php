<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function findLucky($arr) {
        $count = array_fill(0, 501, 0);
        foreach ($arr as $num) {
            $count[$num]++;
        }
        for ($i = 500; $i >= 1; $i--) {
            if ($count[$i] == $i) {
                return $i;
            }
        }
        return -1;
    }
}
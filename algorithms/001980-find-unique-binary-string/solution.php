<?php

class Solution {

    /**
     * @param String[] $nums
     * @return String
     */
    function findDifferentBinaryString($nums) {
        $n = count($nums);
        $result = '';
        for ($i = 0; $i < $n; $i++) {
            $s = $nums[$i];
            $c = $s[$i];
            $result .= ($c === '0' ? '1' : '0');
        }
        return $result;
    }
}
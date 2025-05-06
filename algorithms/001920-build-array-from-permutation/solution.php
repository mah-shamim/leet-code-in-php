<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function buildArray($nums) {
        $ans = array();
        for ($i = 0; $i < count($nums); $i++) {
            $ans[$i] = $nums[$nums[$i]];
        }
        return $ans;
    }
}
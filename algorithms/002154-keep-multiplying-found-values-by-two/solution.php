<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $original
     * @return Integer
     */
    function findFinalValue($nums, $original) {
        $set = array_flip($nums);
        while (isset($set[$original])) {
            $original *= 2;
        }
        return $original;
    }
}
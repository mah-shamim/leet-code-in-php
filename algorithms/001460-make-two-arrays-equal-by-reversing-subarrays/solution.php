<?php

class Solution {

    /**
     * @param Integer[] $target
     * @param Integer[] $arr
     * @return Boolean
     */
    function canBeEqual($target, $arr) {
        // Sort both arrays
        sort($target);
        sort($arr);

        // Compare the sorted arrays
        return $target == $arr;
    }
}
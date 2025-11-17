<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function kLengthApart($nums, $k) {
        $lastOneIndex = -1;
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] == 1) {
                if ($lastOneIndex != -1 && $i - $lastOneIndex - 1 < $k) {
                    return false;
                }
                $lastOneIndex = $i;
            }
        }
        return true;
    }
}
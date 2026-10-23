<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function sortPermutation(array $nums): int
    {
        $n = count($nums);
        $ans = -1;
        $sorted = true;

        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] !== $i) {
                $sorted = false;
                if ($ans === -1) {
                    $ans = $i;
                } else {
                    $ans &= $i;
                }
            }
        }

        return $sorted ? 0 : $ans;
    }
}
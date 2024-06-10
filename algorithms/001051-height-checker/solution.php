<?php

class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function heightChecker($heights) {
        $ans = 0;
        $currentHeight = 1;
        $count = array_fill(0, 101, 0);

        foreach ($heights as $height) {
            $count[$height]++;
        }

        foreach ($heights as $height) {
            while ($count[$currentHeight] == 0) {
                $currentHeight++;
            }
            if ($height != $currentHeight) {
                $ans++;
            }
            $count[$currentHeight]--;
        }

        return $ans;
    }
}
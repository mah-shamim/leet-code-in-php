<?php

class Solution {

    /**
     * @param Integer[] $target
     * @return Integer
     */
    function minNumberOperations($target) {
        $operations = $target[0];
        $n = count($target);
        for ($i = 1; $i < $n; $i++) {
            if ($target[$i] > $target[$i - 1]) {
                $operations += $target[$i] - $target[$i - 1];
            }
        }
        return $operations;
    }
}



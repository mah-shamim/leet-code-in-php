<?php

class Solution {

    /**
     * @param String[] $operations
     * @return Integer
     */
    function finalValueAfterOperations($operations) {
        $x = 0;
        foreach ($operations as $op) {
            if ($op[1] == '+') {
                $x++;
            } else {
                $x--;
            }
        }
        return $x;
    }
}

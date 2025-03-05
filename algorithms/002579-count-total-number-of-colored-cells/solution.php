<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function coloredCells($n) {
        return 2 * $n * $n - 2 * $n + 1;
    }
}
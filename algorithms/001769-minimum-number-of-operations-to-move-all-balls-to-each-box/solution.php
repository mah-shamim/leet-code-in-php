<?php

class Solution {

    /**
     * @param String $boxes
     * @return Integer[]
     */
    function minOperations($boxes) {
        $n = strlen($boxes);
        $answer = array_fill(0, $n, 0);

        // Left-to-right pass
        $leftMoves = 0;
        $leftCount = 0;
        for ($i = 0; $i < $n; $i++) {
            $answer[$i] += $leftMoves;
            if ($boxes[$i] == '1') {
                $leftCount++;
            }
            $leftMoves += $leftCount;
        }

        // Right-to-left pass
        $rightMoves = 0;
        $rightCount = 0;
        for ($i = $n - 1; $i >= 0; $i--) {
            $answer[$i] += $rightMoves;
            if ($boxes[$i] == '1') {
                $rightCount++;
            }
            $rightMoves += $rightCount;
        }

        return $answer;
    }
}
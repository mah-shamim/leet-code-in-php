<?php

class Solution {

    /**
     * @param String $seq
     * @return Integer[]
     */
    function maxDepthAfterSplit(string $seq): array
    {
        $n = strlen($seq);
        $ans = [];
        $depth = 0;

        for ($i = 0; $i < $n; $i++) {
            if ($seq[$i] === '(') {
                // Assign based on current nesting depth parity.
                $ans[$i] = $depth % 2;
                $depth++;
            } else {
                // For ')', first reduce depth, then assign parity.
                $depth--;
                $ans[$i] = $depth % 2;
            }
        }

        return $ans;
    }
}
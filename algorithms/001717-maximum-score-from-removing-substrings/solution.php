<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $x
     * @param Integer $y
     * @return Integer
     */
    function maximumGain($s, $x, $y) {
        if ($x < $y) {
            // Swap the operations to always handle the higher value first
            $temp = $x;
            $x = $y;
            $y = $temp;
            $s = str_replace('a', 'temp', $s);
            $s = str_replace('b', 'a', $s);
            $s = str_replace('temp', 'b', $s);
        }

        // Remove 'ab' first since x >= y
        list($score1, $remainingStr) = $this->calculatePoints($s, 'ab', $x);

        // Remove 'ba' from the remaining string
        list($score2, $remainingStr) = $this->calculatePoints($remainingStr, 'ba', $y);

        return $score1 + $score2;
    }

    // Function to calculate points for the given string and operations
    function calculatePoints($s, $sub, $points) {
        $stack = [];
        $score = 0;

        foreach (str_split($s) as $char) {
            if (!empty($stack) && $char == $sub[1] && end($stack) == $sub[0]) {
                array_pop($stack);
                $score += $points;
            } else {
                $stack[] = $char;
            }
        }

        return [$score, implode('', $stack)];
    }
}
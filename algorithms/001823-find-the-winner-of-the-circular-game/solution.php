<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function findTheWinner($n, $k) {
        // Josephus problem implementation
        $winner = 0;
        for ($i = 1; $i <= $n; $i++) {
            $winner = ($winner + $k) % $i;
        }
        return $winner + 1; // +1 because array index starts from 0
    }
}
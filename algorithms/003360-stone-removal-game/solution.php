<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function canAliceWin(int $n): bool
    {
        $remove = 10;
        $aliceTurn = true;

        while ($n >= $remove) {
            $n -= $remove;
            $remove--;
            $aliceTurn = !$aliceTurn;
        }

        // If it is Alice's turn now, she cannot move and loses.
        // If it is Bob's turn, Bob cannot move, so Alice wins.
        return !$aliceTurn;
    }
}
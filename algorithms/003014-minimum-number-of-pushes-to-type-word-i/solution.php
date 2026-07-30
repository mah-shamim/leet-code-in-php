<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function minimumPushes(string $word): float|int
    {
        $n = strlen($word);

        // We have 8 keys (2 to 9)
        $keys = 8;
        $pushes = 0;
        $pressCount = 1;

        // Distribute letters evenly among keys
        while ($n > 0) {
            // Number of letters we can place on current press level
            $canPlace = min($n, $keys);
            $pushes += $canPlace * $pressCount;
            $n -= $canPlace;
            $pressCount++;
        }

        return $pushes;
    }
}
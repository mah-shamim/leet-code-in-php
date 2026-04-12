<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function minTimeToType(string $word): int
    {
        $totalTime = 0;
        $currentChar = 'a';

        for ($i = 0; $i < strlen($word); $i++) {
            $targetChar = $word[$i];

            // Convert characters to positions (0-25)
            $currentPos = ord($currentChar) - ord('a');
            $targetPos = ord($targetChar) - ord('a');

            // Calculate clockwise and counterclockwise distances
            $clockwise = abs($targetPos - $currentPos);
            $counterclockwise = 26 - $clockwise;

            // Add the minimum movement time + 1 second for typing
            $totalTime += min($clockwise, $counterclockwise) + 1;

            // Update current position
            $currentChar = $targetChar;
        }

        return $totalTime;
    }
}
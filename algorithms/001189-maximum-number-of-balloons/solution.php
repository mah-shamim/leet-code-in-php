<?php

class Solution {

    /**
     * @param String $text
     * @return Integer
     */
    function maxNumberOfBalloons(string $text): int
    {
        // Count frequency of each character in text
        $freq = array_count_values(str_split($text));

        // Required letters for "balloon"
        $required = [
            'b' => 1,
            'a' => 1,
            'l' => 2,
            'o' => 2,
            'n' => 1
        ];

        $maxInstances = PHP_INT_MAX;

        foreach ($required as $char => $count) {
            if (!isset($freq[$char])) {
                return 0;
            }
            $maxInstances = min($maxInstances, intdiv($freq[$char], $count));
        }

        return $maxInstances;
    }
}
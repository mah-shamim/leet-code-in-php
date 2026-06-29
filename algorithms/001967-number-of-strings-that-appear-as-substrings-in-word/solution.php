<?php

class Solution {

    /**
     * @param String[] $patterns
     * @param String $word
     * @return Integer
     */
    function numOfStrings(array $patterns, string $word): int
    {
        $count = 0;
        foreach ($patterns as $pattern) {
            if (str_contains($word, $pattern)) {
                $count++;
            }
        }
        return $count;
    }
}
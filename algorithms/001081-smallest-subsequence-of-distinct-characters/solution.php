<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function smallestSubsequence(string $s): string
    {
        // Step 1: Count frequency of each character
        $lastOccurrence = array_fill(0, 26, -1);
        $len = strlen($s);

        for ($i = 0; $i < $len; $i++) {
            $lastOccurrence[ord($s[$i]) - ord('a')] = $i;
        }

        // Step 2: Use a stack and visited array
        $stack = [];
        $visited = array_fill(0, 26, false);

        for ($i = 0; $i < $len; $i++) {
            $char = $s[$i];
            $charIndex = ord($char) - ord('a');

            // If already in stack, skip
            if ($visited[$charIndex]) {
                continue;
            }

            // While stack not empty and current char is smaller than stack top
            // and stack top appears later, pop it
            while (!empty($stack) &&
                $char < $stack[count($stack) - 1] &&
                $lastOccurrence[ord($stack[count($stack) - 1]) - ord('a')] > $i) {
                $popped = array_pop($stack);
                $visited[ord($popped) - ord('a')] = false;
            }

            // Add current character
            $stack[] = $char;
            $visited[$charIndex] = true;
        }

        return implode('', $stack);
    }
}
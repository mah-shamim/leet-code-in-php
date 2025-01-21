<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $repeatLimit
     * @return String
     */
    function repeatLimitedString($s, $repeatLimit) {
        // Step 1: Count frequency of each character
        $freq = array_fill(0, 26, 0);
        $n = strlen($s);
        for ($i = 0; $i < $n; $i++) {
            $freq[ord($s[$i]) - ord('a')]++;
        }

        // Step 2: Initialize max heap (priority queue)
        $heap = new SplPriorityQueue();
        for ($i = 25; $i >= 0; $i--) {
            if ($freq[$i] > 0) {
                $heap->insert(chr($i + ord('a')), $i);
            }
        }

        $result = '';
        $lastChar = '';  // Last character added to result
        $lastCharCount = 0;  // Count of consecutive lastChar added

        while (!$heap->isEmpty()) {
            // Step 3: Get the current largest character
            $char = $heap->extract();
            $charFreq = $freq[ord($char) - ord('a')];

            if ($char == $lastChar && $lastCharCount == $repeatLimit) {
                // If current char is same as lastChar and repeatLimit is reached,
                // pick the next largest character
                if ($heap->isEmpty()) {
                    break; // No other character to use
                }
                $nextChar = $heap->extract();
                $result .= $nextChar; // Use the next largest char once
                $freq[ord($nextChar) - ord('a')]--;

                // Reinsert nextChar back into heap if it still has occurrences
                if ($freq[ord($nextChar) - ord('a')] > 0) {
                    $heap->insert($nextChar, ord($nextChar) - ord('a'));
                }

                // Reinsert the original char into heap for later use
                $heap->insert($char, ord($char) - ord('a'));

                // Reset lastChar tracking
                $lastChar = $nextChar;
                $lastCharCount = 1;

            } else {
                // Use the current largest character
                $useCount = min($repeatLimit, $charFreq);
                $result .= str_repeat($char, $useCount);
                $freq[ord($char) - ord('a')] -= $useCount;

                // Update lastChar tracking
                $lastChar = $char;
                $lastCharCount = $useCount;

                // Reinsert char back into heap if it still has occurrences
                if ($freq[ord($char) - ord('a')] > 0) {
                    $heap->insert($char, ord($char) - ord('a'));
                }
            }
        }

        return $result;
    }
}
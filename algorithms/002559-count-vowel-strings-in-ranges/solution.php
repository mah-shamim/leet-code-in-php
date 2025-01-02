<?php

class Solution {

    /**
     * @param String[] $words
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function vowelStrings($words, $queries) {
        // Step 1: Precompute prefix sums
        $n = count($words);
        $prefixSum = array_fill(0, $n + 1, 0);
        for ($i = 0; $i < $n; $i++) {
            $prefixSum[$i + 1] = $prefixSum[$i] + ($this->isVowelString($words[$i]) ? 1 : 0);
        }

        // Step 2: Answer queries using the prefix sum
        $result = [];
        foreach ($queries as $query) {
            list($l, $r) = $query;
            $result[] = $prefixSum[$r + 1] - $prefixSum[$l];
        }

        return $result;
    }

    /**
     * Helper function to check if a string starts and ends with a vowel
     *
     * @param $word
     * @return bool
     */
    function isVowelString($word) {
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $n = strlen($word);
        return in_array($word[0], $vowels) && in_array($word[$n - 1], $vowels);
    }
}
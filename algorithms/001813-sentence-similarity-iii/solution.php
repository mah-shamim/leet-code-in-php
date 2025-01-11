<?php

class Solution {

    /**
     * @param String $sentence1
     * @param String $sentence2
     * @return Boolean
     */
    function areSentencesSimilar($sentence1, $sentence2) {
        // Split both sentences into arrays of words
        $words1 = explode(" ", $sentence1);
        $words2 = explode(" ", $sentence2);

        $i = 0;
        $j = 0;

        $n1 = count($words1);
        $n2 = count($words2);

        // Compare the longest common prefix
        while ($i < $n1 && $i < $n2 && $words1[$i] == $words2[$i]) {
            $i++;
        }

        // Compare the longest common suffix
        while ($j < $n1 - $i && $j < $n2 - $i && $words1[$n1 - 1 - $j] == $words2[$n2 - 1 - $j]) {
            $j++;
        }

        // Check if the remaining unmatched parts form an empty array
        return $i + $j >= min($n1, $n2);
    }
}
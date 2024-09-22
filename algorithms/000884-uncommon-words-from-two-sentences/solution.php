<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return String[]
     */
    function uncommonFromSentences($s1, $s2) {
        // Split the sentences into words
        $words1 = explode(' ', $s1);
        $words2 = explode(' ', $s2);

        // Initialize an array to hold the frequency of each word
        $wordCount = array();

        // Count the occurrences of each word from both sentences
        foreach ($words1 as $word) {
            if (isset($wordCount[$word])) {
                $wordCount[$word]++;
            } else {
                $wordCount[$word] = 1;
            }
        }

        foreach ($words2 as $word) {
            if (isset($wordCount[$word])) {
                $wordCount[$word]++;
            } else {
                $wordCount[$word] = 1;
            }
        }

        // Collect the uncommon words (words that appear only once)
        $result = array();
        foreach ($wordCount as $word => $count) {
            if ($count == 1) {
                $result[] = $word;
            }
        }

        return $result;

    }
}
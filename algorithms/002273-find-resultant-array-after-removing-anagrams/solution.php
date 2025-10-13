<?php

class Solution {

    /**
     * @param String[] $words
     * @return String[]
     */
    function removeAnagrams($words) {
        $result = [];
        $prevSorted = '';

        foreach ($words as $word) {
            $sortedWord = $word;
            $chars = str_split($sortedWord);
            sort($chars);
            $sortedWord = implode('', $chars);

            if ($sortedWord !== $prevSorted) {
                $result[] = $word;
                $prevSorted = $sortedWord;
            }
        }

        return $result;
    }
}
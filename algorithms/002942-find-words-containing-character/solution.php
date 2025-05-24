<?php

class Solution {

    /**
     * @param String[] $words
     * @param String $x
     * @return Integer[]
     */
    function findWordsContaining($words, $x) {
        $result = array();
        foreach ($words as $index => $word) {
            if (strpos($word, $x) !== false) {
                array_push($result, $index);
            }
        }
        return $result;
    }
}
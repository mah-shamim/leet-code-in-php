<?php

class Solution {

    /**
     * @param String[] $words
     * @param Integer[] $groups
     * @return String[]
     */
    function getLongestSubsequence($words, $groups) {
        $n = count($words);
        if ($n == 0) {
            return [];
        }
        $result = array($words[0]);
        $lastGroup = $groups[0];

        for ($i = 1; $i < $n; $i++) {
            if ($groups[$i] != $lastGroup) {
                $result[] = $words[$i];
                $lastGroup = $groups[$i];
            }
        }

        return $result;
    }
}
<?php

class Solution {

    /**
     * @param String $word
     * @param Integer $numFriends
     * @return String
     */
    function answerString($word, $numFriends) {
        $n = strlen($word);
        if ($numFriends == 1) {
            return $word;
        }
        $maxLen = $n - $numFriends + 1;
        $candidate_start = 0;
        $candidate_len = min($maxLen, $n);

        for ($i = 1; $i < $n; $i++) {
            $len = min($maxLen, $n - $i);
            $min_len = min($len, $candidate_len);
            $j = 0;
            while ($j < $min_len) {
                if ($word[$i + $j] != $word[$candidate_start + $j]) {
                    break;
                }
                $j++;
            }
            if ($j < $min_len) {
                if ($word[$i + $j] > $word[$candidate_start + $j]) {
                    $candidate_start = $i;
                    $candidate_len = $len;
                }
            } else {
                if ($len > $candidate_len) {
                    $candidate_start = $i;
                    $candidate_len = $len;
                }
            }
        }
        return substr($word, $candidate_start, $candidate_len);
    }
}
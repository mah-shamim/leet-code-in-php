<?php

class Solution {

    /**
     * @param String[] $words
     * @param Integer[] $groups
     * @return String[]
     */
    function getWordsInLongestSubsequence($words, $groups) {
        $n = count($words);
        $dp = array_fill(0, $n, 1);
        $prev = array_fill(0, $n, -1);

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($groups[$i] == $groups[$j]) {
                    continue;
                }
                if (strlen($words[$i]) !== strlen($words[$j])) {
                    continue;
                }
                $diff = 0;
                $len = strlen($words[$i]);
                for ($k = 0; $k < $len; $k++) {
                    if ($words[$i][$k] != $words[$j][$k]) {
                        $diff++;
                        if ($diff > 1) {
                            break;
                        }
                    }
                }
                if ($diff == 1 && $dp[$j] + 1 > $dp[$i]) {
                    $dp[$i] = $dp[$j] + 1;
                    $prev[$i] = $j;
                }
            }
        }

        $max_len = max($dp);
        $current_index = -1;
        for ($i = $n - 1; $i >= 0; $i--) {
            if ($dp[$i] == $max_len) {
                $current_index = $i;
                break;
            }
        }

        $result = array();
        while ($current_index != -1) {
            array_unshift($result, $words[$current_index]);
            $current_index = $prev[$current_index];
        }

        return $result;
    }
}
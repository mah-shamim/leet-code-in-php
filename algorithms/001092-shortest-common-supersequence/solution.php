<?php

class Solution {

    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */
    function shortestCommonSupersequence($str1, $str2) {
        $m = strlen($str1);
        $n = strlen($str2);

        // Create a DP table to store lengths of the longest common subsequence.
        $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

        // Fill the DP table.
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($str1[$i - 1] == $str2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
                } else {
                    $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
                }
            }
        }

        $i = $m;
        $j = $n;
        $result = array();

        // Backtrack to build the shortest common supersequence.
        while ($i > 0 && $j > 0) {
            if ($str1[$i - 1] == $str2[$j - 1]) {
                array_push($result, $str1[$i - 1]);
                $i--;
                $j--;
            } else {
                if ($dp[$i - 1][$j] >= $dp[$i][$j - 1]) {
                    array_push($result, $str1[$i - 1]);
                    $i--;
                } else {
                    array_push($result, $str2[$j - 1]);
                    $j--;
                }
            }
        }

        // Add remaining characters from str1.
        while ($i > 0) {
            array_push($result, $str1[$i - 1]);
            $i--;
        }

        // Add remaining characters from str2.
        while ($j > 0) {
            array_push($result, $str2[$j - 1]);
            $j--;
        }

        // Reverse to get the correct order.
        $result = array_reverse($result);
        return implode('', $result);
    }
}
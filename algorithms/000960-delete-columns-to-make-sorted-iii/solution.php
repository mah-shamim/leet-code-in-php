<?php

class Solution {

    /**
     * @param String[] $strs
     * @return Integer
     */
    function minDeletionSize($strs) {
        $n = count($strs);
        $m = strlen($strs[0]);

        // dp[j] = max columns we can keep ending with column j
        $dp = array_fill(0, $m, 1);

        for ($j = 1; $j < $m; $j++) {
            for ($k = 0; $k < $j; $k++) {
                // Check if column k can be before column j for all rows
                $valid = true;
                for ($i = 0; $i < $n; $i++) {
                    if ($strs[$i][$k] > $strs[$i][$j]) {
                        $valid = false;
                        break;
                    }
                }
                if ($valid) {
                    $dp[$j] = max($dp[$j], $dp[$k] + 1);
                }
            }
        }

        $maxKept = max($dp);
        return $m - $maxKept;
    }
}
<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSelectedElements(array $nums): int
    {
        sort($nums);

        // dp[v] = maximum length of a consecutive selected sequence ending at value v
        $dp = [];
        $ans = 0;

        foreach ($nums as $x) {
            // Values before using current element
            $oldX = $dp[$x] ?? 0;
            $oldPrev = $dp[$x - 1] ?? 0;

            // Option 1: use current element as value x
            $newX = $oldPrev + 1;
            if ($newX > $oldX) {
                $dp[$x] = $newX;
            } else {
                $dp[$x] = $oldX;
            }

            // Option 2: use current element as value x + 1
            $oldNext = $dp[$x + 1] ?? 0;
            $newNext = $oldX + 1; // must use oldX before current is applied

            if ($newNext > $oldNext) {
                $dp[$x + 1] = $newNext;
            } else {
                $dp[$x + 1] = $oldNext;
            }

            $ans = max($ans, $dp[$x], $dp[$x + 1]);
        }

        return $ans;
    }
}
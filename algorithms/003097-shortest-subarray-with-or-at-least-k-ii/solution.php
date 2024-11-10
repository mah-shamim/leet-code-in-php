<?php

class Solution {
    const K_MAX_BIT = 30; // Maximum bit position we will check

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minimumSubarrayLength($nums, $k) {
        $n = count($nums);
        $ans = $n + 1;
        $ors = 0;
        $count = array_fill(0, self::K_MAX_BIT + 1, 0); // Array to keep track of bit counts

        $l = 0;
        for ($r = 0; $r < $n; $r++) {
            $ors = $this->orNum($ors, $nums[$r], $count);
            // Shrink window from the left as long as ors >= k
            while ($ors >= $k && $l <= $r) {
                $ans = min($ans, $r - $l + 1);
                $ors = $this->undoOrNum($ors, $nums[$l], $count);
                $l++;
            }
        }

        return ($ans == $n + 1) ? -1 : $ans;
    }

    /**
     * @param $ors
     * @param $num
     * @param $count
     * @return int
     */
    private function orNum($ors, $num, &$count) {
        // Update the ors value and count bits that are set
        for ($i = 0; $i < self::K_MAX_BIT; $i++) {
            if (($num >> $i) & 1) { // Check if the i-th bit is set
                $count[$i]++;
                if ($count[$i] == 1) { // Only add to ors if this bit is newly set in the window
                    $ors += (1 << $i); // Add this bit to the cumulative OR
                }
            }
        }
        return $ors;
    }

    /**
     * @param $ors
     * @param $num
     * @param $count
     * @return int
     */
    private function undoOrNum($ors, $num, &$count) {
        // Reverse the update on ors and count bits that are reset
        for ($i = 0; $i < self::K_MAX_BIT; $i++) {
            if (($num >> $i) & 1) { // Check if the i-th bit is set
                $count[$i]--;
                if ($count[$i] == 0) { // Only remove from ors if this bit is no longer set in the window
                    $ors -= (1 << $i); // Remove this bit from the cumulative OR
                }
            }
        }
        return $ors;
    }
}
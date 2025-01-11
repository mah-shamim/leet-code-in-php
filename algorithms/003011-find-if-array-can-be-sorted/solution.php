<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canSortArray($nums) {
        $prevSetBits = null;    // Track the set bits count of the previous segment
        $prevMax = PHP_INT_MIN; // Maximum value of the previous segment
        $currMax = PHP_INT_MIN; // Maximum value of the current segment
        $currMin = PHP_INT_MAX; // Minimum value of the current segment

        foreach ($nums as $num) {
            $setBits = $this->countSetBits($num);

            // If we're in a new segment (set bit count changed)
            if ($setBits !== $prevSetBits) {
                // Check if previous segment’s max is greater than current segment’s min
                if ($prevMax > $currMin) {
                    return false;
                }

                // Start a new segment
                $prevSetBits = $setBits;
                $prevMax = $currMax;
                $currMax = $num;
                $currMin = $num;
            } else {
                // Continue with the current segment
                $currMax = max($currMax, $num);
                $currMin = min($currMin, $num);
            }
        }

        // Final check: last segment's max should be <= last segment's min
        return $prevMax <= $currMin;
    }

    /**
     * Helper function to count set bits in a number
     *
     * @param $n
     * @return int
     */
    private function countSetBits($num) {
        $count = 0;
        while ($num > 0) {
            $count += $num & 1;
            $num >>= 1;
        }
        return $count;
    }
}
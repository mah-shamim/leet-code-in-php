<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countValidSelections($nums): int
    {
        $n = count($nums);
        $count = 0;

        // Try all possible starting positions that are initially zero
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] == 0) {
                // Try both directions
                foreach ([-1, 1] as $dir) {
                    if ($this->simulateProcess($nums, $i, $dir)) {
                        $count++;
                    }
                }
            }
        }

        return $count;
    }

    /**
     * Helper function to simulate the process
     *
     * @param $nums
     * @param $start
     * @param $dir
     * @return bool
     */
    private function simulateProcess($nums, $start, $dir): bool
    {
        $n = count($nums);
        $arr = $nums; // Work with a copy

        $curr = $start;

        while ($curr >= 0 && $curr < $n) {
            if ($arr[$curr] == 0) {
                // Move in current direction
                $curr += $dir;
            } else {
                // Decrement current element and reverse direction
                $arr[$curr]--;
                $dir = -$dir;
                $curr += $dir;
            }
        }

        // Check if all elements are zero
        for ($i = 0; $i < $n; $i++) {
            if ($arr[$i] != 0) {
                return false;
            }
        }

        return true;
    }
}
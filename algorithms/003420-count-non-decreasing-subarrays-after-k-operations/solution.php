<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countNonDecreasingSubarrays(array $nums, int $k): int
    {
        $n = count($nums);

        /*
         * For a fixed subarray nums[l..r], the cheapest way to make it
         * non-decreasing is:
         *
         *   b[l] = nums[l]
         *   b[i] = max(b[i-1], nums[i]) = max(nums[l..i])
         *
         * Therefore the cost is:
         *
         *   sum(max(nums[l..i]) - nums[i])
         *
         * We maintain this cost for a right-to-left sliding window.
         *
         * The deque stores block starts of the prefix-maximum profile.
         * Front  -> rightmost block
         * Back   -> leftmost block
         */
        $dq   = array_fill(0, $n, 0);
        $head = 0;
        $tail = -1;

        $right    = $n - 1;
        $cost     = 0;
        $answer   = 0;

        for ($left = $n - 1; $left >= 0; --$left) {
            $x = $nums[$left];

            /*
             * Adding nums[left] raises all smaller prefix maxima on its right
             * up to x.
             */
            while ($head <= $tail && $nums[$dq[$tail]] <= $x) {
                $start = $dq[$tail];
                --$tail;

                // Exclusive end of this block.
                $end = ($head <= $tail) ? $dq[$tail] : $right + 1;

                $cost += ($end - $start) * ($x - $nums[$start]);
            }

            $dq[++$tail] = $left;

            /*
             * If the window is too expensive, remove elements from the right.
             *
             * The rightmost element belongs to the block at deque front.
             * Removing it decreases the prefix-maximum sum by the block's
             * maximum, not necessarily by nums[right].
             */
            while ($cost > $k) {
                $blockMax = $nums[$dq[$head]];
                $cost -= $blockMax - $nums[$right];

                if ($dq[$head] === $right) {
                    ++$head;
                }

                --$right;
            }

            /*
             * All subarrays starting at $left and ending in
             * [$left, $right] are valid.
             */
            $answer += $right - $left + 1;
        }

        return $answer;
    }
}
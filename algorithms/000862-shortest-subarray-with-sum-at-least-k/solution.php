<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function shortestSubarray($nums, $k) {
        $n = count($nums);

        // Initialize prefix_sum array.
        $prefix_sum = array_fill(0, $n + 1, 0);

        // Compute the prefix sum array.
        for ($i = 0; $i < $n; $i++) {
            $prefix_sum[$i + 1] = $prefix_sum[$i] + $nums[$i];
        }

        // Monotonic queue to store indices of the prefix_sum array.
        $deque = [];
        $minLength = PHP_INT_MAX;

        // Iterate over the prefix_sum array.
        for ($i = 0; $i < $n + 1; $i++) {
            // Remove elements from deque that do not form a valid subarray.
            while (count($deque) > 0 && $prefix_sum[$i] - $prefix_sum[$deque[0]] >= $k) {
                $minLength = min($minLength, $i - $deque[0]);
                array_shift($deque);  // Remove the front of the queue.
            }

            // Maintain the deque: remove all indices where prefix_sum[i] is less than the current value.
            while (count($deque) > 0 && $prefix_sum[$i] <= $prefix_sum[$deque[count($deque) - 1]]) {
                array_pop($deque);  // Remove the back of the queue.
            }

            // Add current index to the deque.
            array_push($deque, $i);
        }

        return $minLength == PHP_INT_MAX ? -1 : $minLength;
    }
}
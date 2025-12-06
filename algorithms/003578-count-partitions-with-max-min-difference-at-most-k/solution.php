<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countPartitions($nums, $k) {
        $MOD = 1000000007;
        $n = count($nums);

        // dp[i] = number of partitions ending at index i
        $dp = array_fill(0, $n, 0);
        // prefix sum of dp for O(1) range sum queries
        $prefixSum = array_fill(0, $n + 1, 0);
        $prefixSum[0] = 1; // base case: empty prefix has 1 way

        // Two deques: one for min, one for max (store indices)
        $minDeque = new SplDoublyLinkedList();
        $maxDeque = new SplDoublyLinkedList();

        $left = 0; // left boundary of current valid window

        for ($right = 0; $right < $n; $right++) {
            // Maintain min deque (increasing order)
            while (!$minDeque->isEmpty() && $nums[$minDeque->top()] >= $nums[$right]) {
                $minDeque->pop();
            }
            $minDeque->push($right);

            // Maintain max deque (decreasing order)
            while (!$maxDeque->isEmpty() && $nums[$maxDeque->top()] <= $nums[$right]) {
                $maxDeque->pop();
            }
            $maxDeque->push($right);

            // Shrink window from left until condition is satisfied
            while ($nums[$maxDeque->bottom()] - $nums[$minDeque->bottom()] > $k) {
                if ($minDeque->bottom() == $left) {
                    $minDeque->shift();
                }
                if ($maxDeque->bottom() == $left) {
                    $maxDeque->shift();
                }
                $left++;
            }

            // dp[right] = sum(dp[left-1] ... dp[right-1])
            // Using prefix sums: sum = prefixSum[right] - prefixSum[left-1]
            $sum = ($prefixSum[$right] - ($left > 0 ? $prefixSum[$left - 1] : 0) + $MOD) % $MOD;
            $dp[$right] = $sum;

            // Update prefix sum
            $prefixSum[$right + 1] = ($prefixSum[$right] + $dp[$right]) % $MOD;
        }

        return $dp[$n - 1] % $MOD;
    }
}
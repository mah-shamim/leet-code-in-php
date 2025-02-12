<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumSum($nums) {
        // Hash table to group numbers by their sum of digits
        $digitSumMap = [];

        // Fill the hash table with numbers grouped by their sum of digits
        foreach ($nums as $num) {
            $sum = $this->sumOfDigits($num);
            if (!isset($digitSumMap[$sum])) {
                $digitSumMap[$sum] = [];
            }
            // Add the number to the corresponding group
            $digitSumMap[$sum][] = $num;
        }

        $maxSum = -1;

        // For each group of numbers with the same sum of digits
        foreach ($digitSumMap as $numbers) {
            // Sort the group in descending order
            rsort($numbers);

            // If there are at least two numbers, calculate the sum of the largest two
            if (count($numbers) > 1) {
                $currentSum = $numbers[0] + $numbers[1];
                // Update maxSum if we found a larger sum
                $maxSum = max($maxSum, $currentSum);
            }
        }

        return $maxSum;
    }

    /**
     * Helper function to calculate the sum of digits of a number
     *
     * @param $num
     * @return int
     */
    function sumOfDigits($num) {
        $sum = 0;
        while ($num > 0) {
            $sum += $num % 10;
            $num = (int)($num / 10);
        }
        return $sum;
    }
}
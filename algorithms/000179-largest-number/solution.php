<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return String
     */
    function largestNumber($nums) {
        // Custom comparison function for sorting
        usort($nums, function($a, $b) {
            $order1 = $a . $b;
            $order2 = $b . $a;
            return strcmp($order2, $order1);  // Sort in descending order based on concatenation
        });

        // Join the sorted numbers into a single string
        $result = implode('', $nums);

        // Handle the case where the largest number is "0"
        return $result[0] === '0' ? '0' : $result;
    }
}
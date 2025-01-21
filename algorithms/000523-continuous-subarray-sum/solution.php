<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function checkSubarraySum($nums, $k) {
        // Initialize a hashmap to store the remainder of prefix sums
        $mod_map = array(0 => -1); // Initialize with 0 mod value at index -1 for convenience
        $sum = 0;

        // Iterate through the array
        for ($i = 0; $i < count($nums); $i++) {
            $sum += $nums[$i];

            // Calculate the remainder of the sum when divided by k
            if ($k != 0) {
                $sum %= $k;
            }

            // If the same remainder has been seen before, we have a subarray sum that is divisible by k
            if (isset($mod_map[$sum])) {
                // Ensure the subarray length is at least 2
                if ($i - $mod_map[$sum] > 1) {
                    return true;
                }
            } else {
                // Store the index of this remainder in the hashmap
                $mod_map[$sum] = $i;
            }
        }

        // No such subarray found
        return false;

    }
}
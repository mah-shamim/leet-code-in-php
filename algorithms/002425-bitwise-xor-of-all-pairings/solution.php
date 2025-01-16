<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function xorAllNums($nums1, $nums2) {
        $m = count($nums1); // length of nums1
        $n = count($nums2); // length of nums2
        $result = 0;

        // Iterate over all 32 possible bit positions (0 to 31)
        for ($bit = 0; $bit < 32; $bit++) {
            $count1 = 0; // Count of 1's in the $bit-th position in nums1
            $count2 = 0; // Count of 1's in the $bit-th position in nums2

            // Count 1's in nums1 for the $bit-th position
            foreach ($nums1 as $num) {
                if (($num >> $bit) & 1) {
                    $count1++;
                }
            }

            // Count 1's in nums2 for the $bit-th position
            foreach ($nums2 as $num) {
                if (($num >> $bit) & 1) {
                    $count2++;
                }
            }

            // Calculate the number of 1's in the $bit-th position in nums3
            $totalCount = $count1 * $n + $count2 * $m;

            // If totalCount is odd, set the $bit-th bit in result
            if ($totalCount % 2 == 1) {
                $result |= (1 << $bit);
            }
        }

        return $result;
    }
}
<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function singleNumber($nums) {
        // Step 1: XOR all elements
        $xor = 0;
        foreach ($nums as $num) {
            $xor ^= $num;
        }

        // Step 2: Find a set bit (rightmost set bit in this case)
        $rightmost_set_bit = $xor & (-$xor);

        // Step 3: Partition the array into two groups and XOR them
        $num1 = 0;
        $num2 = 0;
        foreach ($nums as $num) {
            if (($num & $rightmost_set_bit) == 0) {
                $num1 ^= $num;
            } else {
                $num2 ^= $num;
            }
        }

        return [$num1, $num2];

    }
}
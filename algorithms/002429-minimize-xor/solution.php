<?php

class Solution {

    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function minimizeXor($num1, $num2) {
        // Count the number of set bits in num2
        $setBitsCount = $this->countSetBits($num2);

        // Create the result x
        $x = 0;

        // Preserve the most significant bits from num1
        for ($i = 31; $i >= 0 && $setBitsCount > 0; $i--) {
            if (($num1 & (1 << $i)) != 0) {
                $x |= (1 << $i);
                $setBitsCount--;
            }
        }

        // If there are still bits to set, set them from the least significant bit
        for ($i = 0; $i <= 31 && $setBitsCount > 0; $i++) {
            if (($x & (1 << $i)) == 0) {
                $x |= (1 << $i);
                $setBitsCount--;
            }
        }

        return $x;
    }

    /**
     * Helper function to count the number of set bits in a number
     *
     * @param $num
     * @return int
     */
    function countSetBits($num) {
        $count = 0;
        while ($num > 0) {
            $count += $num & 1;
            $num >>= 1;
        }
        return $count;
    }
}
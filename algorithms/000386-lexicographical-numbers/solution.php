<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function lexicalOrder($n) {
        $result = [];
        $current = 1;

        // Loop to collect all numbers in lexicographical order
        for ($i = 0; $i < $n; $i++) {
            $result[] = (int)$current;

            // Try to go deeper in the tree by multiplying by 10
            if ($current * 10 <= $n) {
                $current *= 10;
            } else {
                // If we can't go deeper, try to increment the current number
                if ($current >= $n) {
                    $current /= 10;
                }
                $current++;
                while ($current % 10 == 0) {
                    $current /= 10;
                }
            }
        }

        return $result;
    }
}
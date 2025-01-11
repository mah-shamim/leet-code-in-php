<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minSwaps($s) {
        $balance = 0;
        $max_imbalance = 0;

        // Traverse through the string
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '[') {
                $balance++;
            } else {
                $balance--;
            }

            // Track the maximum imbalance
            if ($balance < 0) {
                $max_imbalance = max($max_imbalance, -$balance);
            }
        }

        // Calculate the number of swaps needed
        return (int)(($max_imbalance + 1) / 2);
    }
}
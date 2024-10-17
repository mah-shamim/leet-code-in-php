<?php

class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function maximumSwap($num) {
        // Convert the number into an array of characters (digits)
        $numStr = strval($num);
        $numArr = str_split($numStr);
        $n = count($numArr);

        // Array to store the last occurrence of each digit (0-9)
        $last = array_fill(0, 10, -1);

        // Populate the last occurrence array
        for ($i = 0; $i < $n; $i++) {
            $last[$numArr[$i]] = $i;
        }

        // Traverse the digits to find the best place to swap
        for ($i = 0; $i < $n; $i++) {
            // Check for a larger digit that appears later
            for ($d = 9; $d > $numArr[$i]; $d--) {
                if ($last[$d] > $i) {
                    // Swap digits
                    $temp = $numArr[$i];
                    $numArr[$i] = $numArr[$last[$d]];
                    $numArr[$last[$d]] = $temp;

                    // Convert back to an integer and return
                    return intval(implode('', $numArr));
                }
            }
        }

        // If no swap was made, return the original number
        return $num;
    }
}
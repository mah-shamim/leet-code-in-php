<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function separateDigits(array $nums): array
    {
        $answer = [];

        foreach ($nums as $num) {
            // Convert the number to a string to easily access each digit
            $digits = str_split((string)$num);

            // Add each digit to the answer array
            foreach ($digits as $digit) {
                $answer[] = (int)$digit; // Cast back to integer
            }
        }

        return $answer;
    }
}
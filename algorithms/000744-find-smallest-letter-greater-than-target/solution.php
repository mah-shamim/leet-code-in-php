<?php

class Solution {

    /**
     * @param String[] $letters
     * @param String $target
     * @return String
     */
    function nextGreatestLetter(array $letters, string $target): string
    {
        $left = 0;
        $right = count($letters) - 1;
        $result = $letters[0]; // Default to first character if no greater found

        while ($left <= $right) {
            $mid = (int) (($left + $right) / 2);

            if ($letters[$mid] <= $target) {
                // Move right, as we need a character greater than target
                $left = $mid + 1;
            } else {
                // Found a potential result, store it and move left
                $result = $letters[$mid];
                $right = $mid - 1;
            }
        }

        return $result;
    }
}
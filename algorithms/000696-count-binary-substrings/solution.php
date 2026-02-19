<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countBinarySubstrings(string $s): int
    {
        $length = strlen($s);
        if ($length < 2) {
            return 0;
        }

        $prevGroupLength = 0;
        $currentGroupLength = 1;
        $result = 0;

        for ($i = 1; $i < $length; $i++) {
            if ($s[$i] == $s[$i - 1]) {
                // Still in the same group of consecutive characters
                $currentGroupLength++;
            } else {
                // Character changed – we have completed a group
                $result += min($prevGroupLength, $currentGroupLength);
                // Move current group to previous and start a new group
                $prevGroupLength = $currentGroupLength;
                $currentGroupLength = 1;
            }
        }

        // Add the contribution of the last pair of groups
        $result += min($prevGroupLength, $currentGroupLength);

        return $result;
    }
}
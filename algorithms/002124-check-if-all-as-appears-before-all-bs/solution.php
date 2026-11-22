<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function checkString(string $s): bool
    {
        // If "ba" exists, a 'b' appears before an 'a', so return false.
        return strpos($s, 'ba') === false;
    }
}
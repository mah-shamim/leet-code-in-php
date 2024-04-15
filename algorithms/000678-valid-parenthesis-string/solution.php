<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function checkValidString(string $s): bool
    {
        $lower = 0;
        $upper = 0;  // keep lower bound and upper bound of '(' counts
        for ($i = 0; $i < strlen($s); $i++) {
            $lower += ($s[$i] == '(') ? 1 : -1;
            $upper -= ($s[$i] == ')') ? 1 : -1;
            if ($upper < 0) break;
            $lower = max($lower, 0);
        }
        return $lower == 0;  // range of '(' count is valid
    }
}
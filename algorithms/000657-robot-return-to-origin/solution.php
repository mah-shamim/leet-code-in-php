<?php

class Solution {

    /**
     * @param String $moves
     * @return Boolean
     */
    function judgeCircle(string $moves): bool
    {
        $count = array_count_values(str_split($moves));
        return ($count['U'] ?? 0) == ($count['D'] ?? 0) && ($count['L'] ?? 0) == ($count['R'] ?? 0);
    }
}
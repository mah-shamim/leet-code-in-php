<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function sortByBits(array $arr): array
    {
        // Compute the number of 1 bit for each element
        $bits = array_map(function($num) {
            return substr_count(decbin($num), '1');
        }, $arr);

        // Sort $arr by $bits ascending, then by $arr ascending
        array_multisort($bits, SORT_ASC, $arr, SORT_ASC, $arr);

        return $arr;
    }
}
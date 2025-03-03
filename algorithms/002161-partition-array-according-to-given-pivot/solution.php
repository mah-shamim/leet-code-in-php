<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $pivot
     * @return Integer[]
     */
    function pivotArray($nums, $pivot) {
        $less = [];
        $equal = [];
        $greater = [];

        // Categorize numbers
        foreach ($nums as $num) {
            if ($num < $pivot) {
                array_push($less, $num);
            } elseif ($num == $pivot) {
                array_push($equal, $num);
            } else {
                array_push($greater, $num);
            }
        }

        // Merge the partitions while maintaining relative order
        return array_merge($less, $equal, $greater);
    }
}
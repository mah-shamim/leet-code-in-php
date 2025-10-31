<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function getSneakyNumbers($nums) {
        $n = count($nums) - 2;
        $freq = array_fill(0, $n, 0);
        $result = [];

        // Count frequency of each number
        foreach ($nums as $num) {
            $freq[$num]++;
        }

        // Find numbers that appear twice
        for ($i = 0; $i < $n; $i++) {
            if ($freq[$i] == 2) {
                $result[] = $i;
            }
        }

        return $result;
    }
}
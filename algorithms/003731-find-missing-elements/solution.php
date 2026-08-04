<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findMissingElements(array $nums): array
    {
        $min = min($nums);
        $max = max($nums);
        $present = array_flip($nums);
        $missing = [];

        for ($i = $min; $i <= $max; $i++) {
            if (!isset($present[$i])) {
                $missing[] = $i;
            }
        }

        return $missing;
    }
}
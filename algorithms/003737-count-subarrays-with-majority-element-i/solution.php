<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function countMajoritySubarrays(array $nums, int $target): int
    {
        $count = 0;
        $n = count($nums);

        for ($i = 0; $i < $n; $i++) {
            $targetCount = 0;
            $length = 0;

            for ($j = $i; $j < $n; $j++) {
                $length++;

                if ($nums[$j] == $target) {
                    $targetCount++;
                }

                // Check if target is majority: appears strictly more than half
                if ($targetCount * 2 > $length) {
                    $count++;
                }
            }
        }

        return $count;
    }
}
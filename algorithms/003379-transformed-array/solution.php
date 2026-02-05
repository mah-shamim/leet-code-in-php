<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function constructTransformedArray(array $nums): array
    {
        $n = count($nums);
        $result = [];

        for ($i = 0; $i < $n; $i++) {
            $value = $nums[$i];

            if ($value == 0) {
                $result[$i] = 0;
                continue;
            }

            if ($value > 0) {
                // Move right
                $targetIndex = ($i + $value) % $n;
            } else {
                // Move left - using abs() and ensure positive result
                $targetIndex = ($i + $value) % $n;
                if ($targetIndex < 0) {
                    $targetIndex += $n;
                }
            }

            $result[$i] = $nums[$targetIndex];
        }

        return $result;
    }
}
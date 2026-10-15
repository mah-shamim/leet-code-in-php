<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function sumCounts(array $nums): int
    {
        $n = count($nums);
        $answer = 0;

        for ($i = 0; $i < $n; $i++) {
            $seen = [];
            $distinct = 0;

            for ($j = $i; $j < $n; $j++) {
                if (!isset($seen[$nums[$j]])) {
                    $seen[$nums[$j]] = true;
                    $distinct++;
                }

                $answer += $distinct * $distinct;
            }
        }

        return $answer;
    }
}
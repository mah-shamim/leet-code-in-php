<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function targetIndices(array $nums, int $target): array
    {
        $less = 0;
        $equal = 0;

        foreach ($nums as $num) {
            if ($num < $target) {
                $less++;
            } elseif ($num === $target) {
                $equal++;
            }
        }

        $result = [];
        for ($i = 0; $i < $equal; $i++) {
            $result[] = $less + $i;
        }

        return $result;
    }
}
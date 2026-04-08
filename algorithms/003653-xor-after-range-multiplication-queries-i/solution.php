<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[][] $queries
     * @return Integer
     */
    function xorAfterQueries(array $nums, array $queries): int
    {
        $MOD = 1000000007;

        foreach ($queries as $query) {
            $l = $query[0];
            $r = $query[1];
            $k = $query[2];
            $v = $query[3];

            for ($idx = $l; $idx <= $r; $idx += $k) {
                $nums[$idx] = ($nums[$idx] * $v) % $MOD;
            }
        }

        $result = 0;
        foreach ($nums as $val) {
            $result ^= $val;
        }

        return $result;
    }
}
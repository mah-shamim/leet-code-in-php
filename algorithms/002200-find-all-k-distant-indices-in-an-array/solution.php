<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $key
     * @param Integer $k
     * @return Integer[]
     */
    function findKDistantIndices($nums, $key, $k) {
        $n = count($nums);
        $diff = array_fill(0, $n + 1, 0);

        for ($j = 0; $j < $n; $j++) {
            if ($nums[$j] == $key) {
                $start = max(0, $j - $k);
                $end = min($n - 1, $j + $k);
                $diff[$start] += 1;
                $diff[$end + 1] -= 1;
            }
        }

        $curr = 0;
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            $curr += $diff[$i];
            if ($curr > 0) {
                $result[] = $i;
            }
        }

        return $result;
    }
}
<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer $x
     * @return Integer[]
     */
    function findXSum($nums, $k, $x) {
        $n = count($nums);
        $result = [];
        $freq = [];

        for ($i = 0; $i < $k; $i++) {
            $freq[$nums[$i]] = isset($freq[$nums[$i]]) ? $freq[$nums[$i]] + 1 : 1;
        }

        for ($i = 0; $i <= $n - $k; $i++) {
            $heap = new SplMaxHeap();
            foreach ($freq as $num => $count) {
                if ($count > 0) {
                    $heap->insert([$count, $num]);
                }
            }

            $sum = 0;
            $take = min($x, $heap->count());
            for ($j = 0; $j < $take; $j++) {
                list($count, $num) = $heap->extract();
                $sum += $count * $num;
            }
            $result[] = $sum;

            if ($i < $n - $k) {
                $freq[$nums[$i]]--;
                $freq[$nums[$i + $k]] = isset($freq[$nums[$i + $k]]) ? $freq[$nums[$i + $k]] + 1 : 1;
            }
        }

        return $result;
    }
}
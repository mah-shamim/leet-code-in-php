<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minOperations($nums, $k) {
        $heap = new SplMinHeap();
        foreach ($nums as $num) {
            $heap->insert($num);
        }

        $count = 0;
        while ($heap->count() >= 2) {
            if ($heap->top() >= $k) {
                break;
            }
            $x = $heap->extract();
            $y = $heap->extract();
            $new_val = 2 * $x + $y;
            $heap->insert($new_val);
            $count++;
        }

        return $count;
    }
}
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function minOperations($nums, $k) {
    $heap = new SplMinHeap();
    foreach ($nums as $num) {
        $heap->insert($num);
    }

    $count = 0;
    while ($heap->count() >= 2) {
        if ($heap->top() >= $k) {
            break;
        }
        $x = $heap->extract();
        $y = $heap->extract();
        $new_val = 2 * $x + $y;
        $heap->insert($new_val);
        $count++;
    }

    return $count;
}
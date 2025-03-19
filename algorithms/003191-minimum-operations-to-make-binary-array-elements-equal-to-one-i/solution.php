<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) {
        $n = count($nums);
        $queue = array();
        $start = 0;
        $operations = 0;

        for ($i = 0; $i < $n; $i++) {
            // Remove flips that no longer affect the current position
            while ($start < count($queue) && ($queue[$start] + 2 < $i)) {
                $start++;
            }
            $currentFlips = (count($queue) - $start) % 2;
            $currentBit = $nums[$i] ^ $currentFlips;

            if ($currentBit == 0) {
                if ($i > $n - 3) {
                    return -1;
                }
                array_push($queue, $i);
                $operations++;
            }
        }

        return $operations;
    }
}
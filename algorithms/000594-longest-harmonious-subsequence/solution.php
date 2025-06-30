<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findLHS($nums) {
        $freq = array_count_values($nums);
        $maxLen = 0;
        foreach ($freq as $num => $count) {
            $next = $num + 1;
            if (isset($freq[$next])) {
                $currentLen = $count + $freq[$next];
                if ($currentLen > $maxLen) {
                    $maxLen = $currentLen;
                }
            }
        }
        return $maxLen;
    }
}
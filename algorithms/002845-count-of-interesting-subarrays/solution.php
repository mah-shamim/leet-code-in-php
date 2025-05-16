<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $modulo
     * @param Integer $k
     * @return Integer
     */
    function countInterestingSubarrays($nums, $modulo, $k) {
        $map = array();
        $map[0] = 1;
        $current_count = 0;
        $result = 0;
        foreach ($nums as $num) {
            if ($num % $modulo == $k) {
                $current_count++;
            }
            $target = (($current_count - $k) % $modulo + $modulo) % $modulo;
            if (isset($map[$target])) {
                $result += $map[$target];
            }
            $current_mod = $current_count % $modulo;
            if (isset($map[$current_mod])) {
                $map[$current_mod]++;
            } else {
                $map[$current_mod] = 1;
            }
        }
        return $result;
    }
}
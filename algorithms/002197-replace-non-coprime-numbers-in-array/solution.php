<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function replaceNonCoprimes($nums) {
        $stack = [];
        foreach ($nums as $num) {
            $current = $num;
            while (!empty($stack)) {
                $top = end($stack);
                $g = $this->gcd($current, $top);
                if ($g == 1) break;
                array_pop($stack);
                $current = ($current * $top) / $g;
            }
            $stack[] = $current;
        }
        return $stack;
    }

    /**
     * @param $a
     * @param $b
     * @return int|mixed
     */
    function gcd($a, $b) {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }
}
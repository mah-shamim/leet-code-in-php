<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumIndex($nums) {
        $n = count($nums);
        if ($n < 2) {
            return -1;
        }

        $x = $this->findDominant($nums);
        $total_x = 0;
        foreach ($nums as $num) {
            if ($num == $x) {
                $total_x++;
            }
        }

        $prefix = array();
        $current = 0;
        foreach ($nums as $num) {
            if ($num == $x) {
                $current++;
            }
            $prefix[] = $current;
        }

        for ($i = 0; $i < $n - 1; $i++) {
            $left_count = $prefix[$i];
            $right_count = $total_x - $left_count;
            $left_length = $i + 1;
            $right_length = $n - $i - 1;
            if (($left_count * 2 > $left_length) && ($right_count * 2 > $right_length)) {
                return $i;
            }
        }

        return -1;
    }

    /**
     * @param $nums
     * @return mixed|null
     */
    function findDominant($nums) {
        $count = 0;
        $candidate = null;
        foreach ($nums as $num) {
            if ($count == 0) {
                $candidate = $num;
                $count = 1;
            } else {
                $count += ($num == $candidate) ? 1 : -1;
            }
        }
        return $candidate;
    }
}
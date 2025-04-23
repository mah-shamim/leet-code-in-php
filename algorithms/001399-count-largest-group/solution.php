<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function countLargestGroup($n) {
        $counts = array();
        for ($i = 1; $i <= $n; $i++) {
            $s = $this->digitSum($i);
            if (isset($counts[$s])) {
                $counts[$s]++;
            } else {
                $counts[$s] = 1;
            }
        }
        $max = max($counts);
        $result = 0;
        foreach ($counts as $cnt) {
            if ($cnt == $max) {
                $result++;
            }
        }
        return $result;
    }

    /**
     * @param $num
     * @return int
     */
    function digitSum($num) {
        $sum = 0;
        while ($num != 0) {
            $sum += $num % 10;
            $num = (int) ($num / 10);
        }
        return $sum;
    }
}
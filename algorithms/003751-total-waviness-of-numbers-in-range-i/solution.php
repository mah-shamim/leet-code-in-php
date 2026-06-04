<?php

class Solution {

    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function totalWaviness(int $num1, int $num2): int
    {
        $total = 0;

        for ($n = $num1; $n <= $num2; $n++) {
            $total += $this->wavinessOfNumber($n);
        }

        return $total;
    }

    /**
     * @param $num
     * @return int
     */
    private function wavinessOfNumber($num): int
    {
        $digits = str_split((string) $num);
        $len = count($digits);

        if ($len < 3) {
            return 0;
        }

        $waviness = 0;

        for ($i = 1; $i < $len - 1; $i++) {
            $left = $digits[$i - 1];
            $mid = $digits[$i];
            $right = $digits[$i + 1];

            if ($mid > $left && $mid > $right) {
                $waviness++;
            } elseif ($mid < $left && $mid < $right) {
                $waviness++;
            }
        }

        return $waviness;
    }
}
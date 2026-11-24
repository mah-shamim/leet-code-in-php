<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxLength(array $nums): int
    {
        $n = count($nums);
        $ans = 0;

        // Since nums[i] <= 10, the maximum possible LCM is lcm(1..10) = 2520.
        // GCD <= 10, so lcm * gcd <= 25200.
        // If product exceeds this, equality is impossible.
        $limit = 25200;

        for ($i = 0; $i < $n; $i++) {
            $prod = 1;
            $g = 0;
            $l = 1;

            for ($j = $i; $j < $n; $j++) {
                $x = $nums[$j];

                $prod *= $x;

                // Product only increases for positive integers.
                if ($prod > $limit) {
                    break;
                }

                $g = $this->gcd($g, $x);
                $l = intdiv($l, $this->gcd($l, $x)) * $x;

                if ($prod === $l * $g) {
                    $ans = max($ans, $j - $i + 1);
                }
            }
        }

        return $ans;
    }

    /**
     * @param $a
     * @param $b
     * @return int
     */
    private function gcd($a, $b): int
    {
        while ($b != 0) {
            $temp = $a % $b;
            $a = $b;
            $b = $temp;
        }

        return $a;
    }
}
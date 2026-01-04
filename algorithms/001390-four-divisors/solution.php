<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return float|int
     */
    function sumFourDivisors(array $nums): float|int
    {
        $totalSum = 0;

        foreach ($nums as $num) {
            $sum = $this->sumIfHasFourDivisors($num);
            $totalSum += $sum;
        }

        return $totalSum;
    }

    /**
     * @param $n
     * @return float|int
     */
    private function sumIfHasFourDivisors($n): float|int
    {
        // Edge cases
        if ($n <= 1) return 0;

        $count = 2; // 1 and n itself
        $sum = 1 + $n;
        $limit = (int)sqrt($n);

        for ($i = 2; $i <= $limit; $i++) {
            if ($n % $i == 0) {
                if ($i == $n / $i) {
                    // Perfect square divisor
                    $count += 1;
                    $sum += $i;
                } else {
                    // Two different divisors
                    $count += 2;
                    $sum += $i + ($n / $i);
                }

                // Early exit if we already have more than 4 divisors
                if ($count > 4) {
                    return 0;
                }
            }
        }

        return $count == 4 ? $sum : 0;
    }
}
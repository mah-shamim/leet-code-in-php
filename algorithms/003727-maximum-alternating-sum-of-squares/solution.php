<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAlternatingSum(array $nums): int
    {
        $squares = [];
        foreach ($nums as $num) {
            $squares[] = $num * $num;
        }

        rsort($squares);

        $n = count($squares);
        $positiveCount = intdiv($n + 1, 2); // ceil(n / 2)

        $score = 0;

        // Put the largest squares into positive positions,
        // and the remaining smaller squares into negative positions.
        for ($i = 0; $i < $n; $i++) {
            if ($i < $positiveCount) {
                $score += $squares[$i];
            } else {
                $score -= $squares[$i];
            }
        }

        return $score;
    }
}
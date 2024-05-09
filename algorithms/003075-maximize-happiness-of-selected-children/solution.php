<?php

class Solution {

    /**
     * @param Integer[] $happiness
     * @param Integer $k
     * @return Integer
     */
    function maximumHappinessSum(array $happiness, int $k): int
    {
        $ans = 0;
        $decremented = 0;

        sort($happiness);
        rsort($happiness);

        for ($i = 0; $i < $k; ++$i) {
            $ans += max(0, $happiness[$i] - $decremented);
            ++$decremented;
        }

        return $ans;
    }
}
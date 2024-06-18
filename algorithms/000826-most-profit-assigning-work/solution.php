<?php

class Solution {

    /**
     * @param Integer[] $difficulty
     * @param Integer[] $profit
     * @param Integer[] $worker
     * @return Integer
     */
    function maxProfitAssignment($difficulty, $profit, $worker) {
        $ans = 0;
        $jobs = array();

        for ($i = 0; $i < count($difficulty); ++$i) {
            $jobs[] = array($difficulty[$i], $profit[$i]);
        }

        sort($jobs);
        sort($worker);

        $i = 0;
        $maxProfit = 0;

        foreach ($worker as $w) {
            for (; $i < count($jobs) && $w >= $jobs[$i][0]; ++$i) {
                $maxProfit = max($maxProfit, $jobs[$i][1]);
            }
            $ans += $maxProfit;
        }

        return $ans;
    }
}
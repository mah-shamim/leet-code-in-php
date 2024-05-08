<?php

class Solution {

    /**
     * @param Integer[] $score
     * @return String[]
     */
    function findRelativeRanks(array $score): array
    {
        $n = count($score);
        $ans = array_fill(0, $n, "");
        $indices = range(0, $n - 1);

        usort($indices, function($a, $b) use ($score) {
            return $score[$a] > $score[$b] ? -1 : 1;
        });

        for ($i = 0; $i < $n; $i++) {
            if ($i == 0) {
                $ans[$indices[0]] = "Gold Medal";
            } elseif ($i == 1) {
                $ans[$indices[1]] = "Silver Medal";
            } elseif ($i == 2) {
                $ans[$indices[2]] = "Bronze Medal";
            } else {
                $ans[$indices[$i]] = strval($i + 1);
            }
        }

        return $ans;
    }
}
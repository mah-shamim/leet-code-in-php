<?php

class Solution {

    /**
     * @param Integer[] $players
     * @param Integer[] $trainers
     * @return Integer
     */
    function matchPlayersAndTrainers($players, $trainers) {
        sort($players);
        sort($trainers);
        $count = 0;
        $i = 0;
        $j = 0;
        $n = count($players);
        $m = count($trainers);
        
        while ($i < $n && $j < $m) {
            if ($players[$i] <= $trainers[$j]) {
                $count++;
                $i++;
                $j++;
            } else {
                $j++;
            }
        }
        
        return $count;
    }
}
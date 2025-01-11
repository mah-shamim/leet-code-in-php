<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function findChampion($n, $edges) {
        // Initialize in-degrees for all teams
        $inDegree = array_fill(0, $n, 0);

        // Calculate the in-degree for each team
        foreach ($edges as $edge) {
            $inDegree[$edge[1]]++;
        }

        // Find teams with in-degree 0
        $candidates = [];
        for ($i = 0; $i < $n; $i++) {
            if ($inDegree[$i] == 0) {
                $candidates[] = $i;
            }
        }

        // If exactly one team has in-degree 0, return it; otherwise, return -1
        return count($candidates) === 1 ? $candidates[0] : -1;
    }
}
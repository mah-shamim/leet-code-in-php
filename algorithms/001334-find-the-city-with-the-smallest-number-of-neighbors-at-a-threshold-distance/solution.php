<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer $distanceThreshold
     * @return Integer
     */
    function findTheCity($n, $edges, $distanceThreshold) {
        $INF = 100000000; // Use a large number to represent infinity
        $dist = array();

        // Step 1: Initialize the distance matrix
        for ($i = 0; $i < $n; $i++) {
            $dist[$i] = array();
            for ($j = 0; $j < $n; $j++) {
                if ($i == $j) {
                    $dist[$i][$j] = 0;
                } else {
                    $dist[$i][$j] = $INF;
                }
            }
        }

        // Step 2: Populate the distance matrix with the given edges
        foreach ($edges as $edge) {
            $from = $edge[0];
            $to = $edge[1];
            $weight = $edge[2];
            $dist[$from][$to] = $weight;
            $dist[$to][$from] = $weight;
        }

        // Step 3: Apply Floyd-Warshall algorithm
        for ($k = 0; $k < $n; $k++) {
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    if ($dist[$i][$k] + $dist[$k][$j] < $dist[$i][$j]) {
                        $dist[$i][$j] = $dist[$i][$k] + $dist[$k][$j];
                    }
                }
            }
        }

        // Step 4: Calculate reachable cities for each city
        $minReachableCities = $n;
        $resultCity = 0;

        for ($i = 0; $i < $n; $i++) {
            $reachableCities = 0;
            for ($j = 0; $j < $n; $j++) {
                if ($i != $j && $dist[$i][$j] <= $distanceThreshold) {
                    $reachableCities++;
                }
            }

            // Step 5: Find the city with the smallest number of reachable cities
            if ($reachableCities < $minReachableCities) {
                $minReachableCities = $reachableCities;
                $resultCity = $i;
            } elseif ($reachableCities == $minReachableCities) {
                $resultCity = max($resultCity, $i);
            }
        }

        return $resultCity;

    }
}
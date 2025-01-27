<?php

class Solution {

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @param Integer[][] $queries
     * @return Boolean[]
     */
    function checkIfPrerequisite($numCourses, $prerequisites, $queries) {
        // Step 1: Initialize the graph with false values
        $isReachable = array_fill(0, $numCourses, array_fill(0, $numCourses, false));

        // Step 2: Fill the graph with direct prerequisites
        foreach ($prerequisites as $prerequisite) {
            $isReachable[$prerequisite[0]][$prerequisite[1]] = true;
        }

        // Step 3: Use Floyd-Warshall algorithm to calculate transitive closure
        for ($k = 0; $k < $numCourses; $k++) {
            for ($i = 0; $i < $numCourses; $i++) {
                for ($j = 0; $j < $numCourses; $j++) {
                    if ($isReachable[$i][$k] && $isReachable[$k][$j]) {
                        $isReachable[$i][$j] = true;
                    }
                }
            }
        }

        // Step 4: Answer the queries
        $result = [];
        foreach ($queries as $query) {
            $result[] = $isReachable[$query[0]][$query[1]];
        }

        return $result;
    }
}
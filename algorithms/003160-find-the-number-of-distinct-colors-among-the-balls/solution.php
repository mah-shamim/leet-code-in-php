<?php

class Solution {

    /**
     * @param Integer $limit
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function queryResults($limit, $queries) {
        $colorMap = array();
        $colorCount = array();
        $result = array();

        foreach ($queries as $query) {
            $x = $query[0];
            $y = $query[1];

            // Check if the ball was previously colored
            if (isset($colorMap[$x])) {
                $oldColor = $colorMap[$x];
                $colorCount[$oldColor]--;
                if ($colorCount[$oldColor] == 0) {
                    unset($colorCount[$oldColor]);
                }
            }

            // Update the ball's color
            $colorMap[$x] = $y;
            if (isset($colorCount[$y])) {
                $colorCount[$y]++;
            } else {
                $colorCount[$y] = 1;
            }

            // Record the current number of distinct colors
            $result[] = count($colorCount);
        }

        return $result;
    }
}
<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function countServers($grid) {
        $m = count($grid); // Number of rows
        $n = count($grid[0]); // Number of columns

        $rowCount = array_fill(0, $m, 0); // Array to store server counts in each row
        $colCount = array_fill(0, $n, 0); // Array to store server counts in each column

        // Step 1: Count the number of servers in each row and column
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $rowCount[$i]++;
                    $colCount[$j]++;
                }
            }
        }

        // Step 2: Count the number of servers that communicate
        $result = 0;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    // A server communicates if its row or column has more than 1 server
                    if ($rowCount[$i] > 1 || $colCount[$j] > 1) {
                        $result++;
                    }
                }
            }
        }

        return $result;
    }
}
<?php

class Solution {

    /**
     * @param Integer[] $original
     * @param Integer $m
     * @param Integer $n
     * @return Integer[][]
     */
    function construct2DArray($original, $m, $n) {
        $length = count($original);

        // Check if the total number of elements matches m * n
        if ($length != $m * $n) {
            return []; // Return an empty array if it's impossible
        }

        $result = array();
        $index = 0;

        // Populate the 2D array
        for ($i = 0; $i < $m; $i++) {
            $row = array();
            for ($j = 0; $j < $n; $j++) {
                $row[] = $original[$index];
                $index++;
            }
            $result[] = $row;
        }

        return $result;
    }
}
<?php

class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        $result = array();
        if ($numRows <= 0) {
            return $result;
        }

        $result[] = array(1);

        for ($i = 1; $i < $numRows; $i++) {
            $prevRow = $result[$i - 1];
            $currentRow = array();
            $currentRow[] = 1;

            for ($j = 1; $j < $i; $j++) {
                $currentRow[] = $prevRow[$j - 1] + $prevRow[$j];
            }

            $currentRow[] = 1;
            $result[] = $currentRow;
        }

        return $result;
    }
}
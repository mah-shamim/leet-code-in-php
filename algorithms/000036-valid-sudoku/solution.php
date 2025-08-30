<?php

class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $rows = array_fill(0, 9, array());
        $columns = array_fill(0, 9, array());
        $boxes = array_fill(0, 9, array());

        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                $num = $board[$i][$j];
                if ($num == '.') {
                    continue;
                }

                $boxIndex = (int)($i / 3) * 3 + (int)($j / 3);

                if (isset($rows[$i][$num]) || isset($columns[$j][$num]) || isset($boxes[$boxIndex][$num])) {
                    return false;
                }

                $rows[$i][$num] = true;
                $columns[$j][$num] = true;
                $boxes[$boxIndex][$num] = true;
            }
        }

        return true;
    }
}
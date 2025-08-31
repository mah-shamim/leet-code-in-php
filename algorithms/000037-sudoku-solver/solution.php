<?php

class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board) {
        $rows = array_fill(0, 9, array_fill(0, 10, false));
        $cols = array_fill(0, 9, array_fill(0, 10, false));
        $boxes = array_fill(0, 9, array_fill(0, 10, false));

        // Initialize the arrays based on the current board
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($board[$i][$j] != '.') {
                    $num = (int)$board[$i][$j];
                    $boxIndex = intdiv($i, 3) * 3 + intdiv($j, 3);
                    $rows[$i][$num] = true;
                    $cols[$j][$num] = true;
                    $boxes[$boxIndex][$num] = true;
                }
            }
        }

        $this->solve($board, 0, $rows, $cols, $boxes);
    }

    /**
     * @param $board
     * @param $index
     * @param $rows
     * @param $cols
     * @param $boxes
     * @return bool
     */
    private function solve(&$board, $index, &$rows, &$cols, &$boxes) {
        if ($index == 81) {
            return true;
        }

        $row = intdiv($index, 9);
        $col = $index % 9;

        if ($board[$row][$col] != '.') {
            return $this->solve($board, $index + 1, $rows, $cols, $boxes);
        }

        $boxIndex = intdiv($row, 3) * 3 + intdiv($col, 3);
        for ($c = 1; $c <= 9; $c++) {
            if (!$rows[$row][$c] && !$cols[$col][$c] && !$boxes[$boxIndex][$c]) {
                $board[$row][$col] = (string)$c;
                $rows[$row][$c] = true;
                $cols[$col][$c] = true;
                $boxes[$boxIndex][$c] = true;

                if ($this->solve($board, $index + 1, $rows, $cols, $boxes)) {
                    return true;
                }

                $board[$row][$col] = '.';
                $rows[$row][$c] = false;
                $cols[$col][$c] = false;
                $boxes[$boxIndex][$c] = false;
            }
        }

        return false;
    }
}
<?php

class Spreadsheet {
    private $rows;
    private $cells;

    /**
     * @param Integer $rows
     */
    function __construct($rows) {
        $this->rows = $rows;
        $this->cells = [];
    }

    /**
     * @param String $cell
     * @param Integer $value
     * @return NULL
     */
    function setCell($cell, $value) {
        $this->cells[$cell] = $value;
    }

    /**
     * @param String $cell
     * @return NULL
     */
    function resetCell($cell) {
        $this->cells[$cell] = 0;
    }

    /**
     * @param String $formula
     * @return Integer
     */
    function getValue($formula) {
        $expr = substr($formula, 1);
        $parts = explode('+', $expr);
        $sum = 0;
        foreach ($parts as $part) {
            if (preg_match('/^[A-Z]\d+$/', $part)) {
                if (isset($this->cells[$part])) {
                    $sum += $this->cells[$part];
                } else {
                    $sum += 0;
                }
            } else {
                $sum += (int)$part;
            }
        }
        return $sum;
    }
}

/**
 * Your Spreadsheet object will be instantiated and called as such:
 * $obj = Spreadsheet($rows);
 * $obj->setCell($cell, $value);
 * $obj->resetCell($cell);
 * $ret_3 = $obj->getValue($formula);
 */
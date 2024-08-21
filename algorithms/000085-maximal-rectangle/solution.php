<?php

class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle($matrix) {
        if (empty($matrix) || empty($matrix[0])) {
            return 0;
        }

        $rows = count($matrix);
        $cols = count($matrix[0]);

        // Create a height array for histogram
        $height = array_fill(0, $cols, 0);
        $maxArea = 0;

        for ($i = 0; $i < $rows; $i++) {
            // Update height array
            for ($j = 0; $j < $cols; $j++) {
                $height[$j] = $matrix[$i][$j] == '1' ? $height[$j] + 1 : 0;
            }

            // Calculate the max area for this row's histogram
            $maxArea = max($maxArea, $this->calculateMaxHistogramArea($height));
        }

        return $maxArea;
    }

    /**
     * @param $heights
     * @return int|mixed
     */
    function calculateMaxHistogramArea($heights) {
        $stack = array();
        $maxArea = 0;
        $index = 0;

        while ($index < count($heights)) {
            if (empty($stack) || $heights[$index] >= $heights[end($stack)]) {
                array_push($stack, $index++);
            } else {
                $topOfStack = array_pop($stack);
                $area = $heights[$topOfStack] * (empty($stack) ? $index : $index - end($stack) - 1);
                $maxArea = max($maxArea, $area);
            }
        }

        while (!empty($stack)) {
            $topOfStack = array_pop($stack);
            $area = $heights[$topOfStack] * (empty($stack) ? $index : $index - end($stack) - 1);
            $maxArea = max($maxArea, $area);
        }

        return $maxArea;
    }

}
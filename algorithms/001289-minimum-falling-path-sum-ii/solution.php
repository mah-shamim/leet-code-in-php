<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minFallingPathSum(array $grid): int
    {
        $n = count($grid); // Get the size of the grid.
        // Using descriptive names for variables to indicate their usage.
        $minFirstPathSum = 0; // Stores the minimum sum of the first path.
        $minSecondPathSum = 0; // Stores the minimum sum of the second best path.
        $prevMinPathCol = -1; // Index of the column resulting in the minimum sum in the previous row.
        // Infinity substitute for initialization (could use PHP_INT_MAX).
        $kInfinity = PHP_INT_MAX;
        // Iterate over each row in the input grid.
        foreach ($grid as $row) {
            $newMinFirstPathSum = $kInfinity; // The new minimum sum of the first path.
            $newMinSecondPathSum = $kInfinity; // The new minimum sum of the second best path.
            $newMinPathCol = -1; // Column index for the new minimum sum.
            // Iterate over each element in the current row.
            for ($j = 0; $j < $n; ++$j) {
                $currentSum = ($prevMinPathCol != $j ? $minFirstPathSum : $minSecondPathSum) + $row[$j];
                // If the current sum is less than the new minimum, update both the first and second best sums.
                if ($currentSum < $newMinFirstPathSum) {
                    $newMinSecondPathSum = $newMinFirstPathSum; // Previous min becomes second best.
                    $newMinFirstPathSum = $currentSum; // Current sum becomes the new min.
                    $newMinPathCol = $j; // Update the column index for new min.
                } else if ($currentSum < $newMinSecondPathSum) {
                    $newMinSecondPathSum = $currentSum; // Update the second best path sum if current is less than it.
                }
            }
            // Update the path sums and the column index for the next row iteration.
            $minFirstPathSum = $newMinFirstPathSum;
            $minSecondPathSum = $newMinSecondPathSum;
            $prevMinPathCol = $newMinPathCol;
        }
        return $minFirstPathSum; // Return the minimum sum of a falling path.
    }
}
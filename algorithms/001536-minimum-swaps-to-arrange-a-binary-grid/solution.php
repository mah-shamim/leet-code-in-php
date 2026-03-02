<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minSwaps(array $grid): int
    {
        $n = count($grid);
        // rightmost[$i] = index of the rightmost 1 in row i, or -1 if all zeros
        $rightmost = array_fill(0, $n, -1);
        for ($i = 0; $i < $n; ++$i) {
            for ($j = $n - 1; $j >= 0; --$j) {
                if ($grid[$i][$j] == 1) {
                    $rightmost[$i] = $j;
                    break;
                }
            }
        }

        // Check if a valid arrangement exists.
        $sorted = $rightmost;
        sort($sorted);
        for ($i = 0; $i < $n; ++$i) {
            if ($sorted[$i] > $i) { // -1 is always <= i, so only positive values matter
                return -1;
            }
        }

        // Simulate moving rows up to their required positions.
        $current = $rightmost; // current order of rightmost values
        $swaps = 0;
        for ($i = 0; $i < $n; ++$i) {
            // Find the first row from position i onward that can be placed at i.
            $j = $i;
            while ($j < $n && $current[$j] > $i) {
                ++$j;
            }
            // Because we already checked feasibility, $j will always be < $n.
            $swaps += $j - $i;
            // Move the row at index $j up to index $i by swapping adjacent rows.
            $temp = $current[$j];
            for ($k = $j; $k > $i; --$k) {
                $current[$k] = $current[$k - 1];
            }
            $current[$i] = $temp;
        }
        return $swaps;
    }
}
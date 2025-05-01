<?php

class Solution {

    /**
     * @param String $tiles
     * @return Integer
     */
    function numTilePossibilities($tiles) {
        $counts = array_count_values(str_split($tiles));
        $total = 0;
        for ($k = 1; $k <= strlen($tiles); $k++) {
            $currentResult = 0;
            $this->backtrack($counts, $k, 0, $currentResult);
            $total += $currentResult;
        }
        return $total;
    }

    /**
     * @param $counts
     * @param $k
     * @param $currentLength
     * @param $result
     * @return void
     */
    function backtrack(&$counts, $k, $currentLength, &$result) {
        if ($currentLength == $k) {
            $result++;
            return;
        }
        foreach (array_keys($counts) as $char) {
            if ($counts[$char] == 0) {
                continue;
            }
            $counts[$char]--;
            $this->backtrack($counts, $k, $currentLength + 1, $result);
            $counts[$char]++;
        }
    }
}
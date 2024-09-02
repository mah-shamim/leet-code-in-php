<?php

class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target) {
        sort($candidates);
        $result = [];
        $this->backtrack($candidates, $target, 0, [], $result);
        return $result;
    }

    /**
     * @param $candidates
     * @param $target
     * @param $start
     * @param $currentCombination
     * @param $result
     * @return void
     */
    function backtrack($candidates, $target, $start, $currentCombination, &$result) {
        if ($target == 0) {
            $result[] = $currentCombination;
            return;
        }

        for ($i = $start; $i < count($candidates); $i++) {
            if ($i > $start && $candidates[$i] == $candidates[$i - 1]) {
                continue; // Skip duplicates
            }

            if ($candidates[$i] > $target) {
                break; // No need to continue if the candidate exceeds the target
            }

            self::backtrack($candidates, $target - $candidates[$i], $i + 1, array_merge($currentCombination, [$candidates[$i]]), $result);
        }
    }

}
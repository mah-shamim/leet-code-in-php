<?php

class Solution {

    /**
     * @param Integer[][] $stones
     * @return Integer
     */
    function removeStones($stones) {
        $visited = array();
        $n = count($stones);

        $numComponents = 0;

        for ($i = 0; $i < $n; $i++) {
            if (!isset($visited[$i])) {
                $this->dfs($i, $stones, $visited);
                $numComponents++;
            }
        }

        return $n - $numComponents;
    }

    /**
     * @param $stoneIndex
     * @param $stones
     * @param $visited
     * @return void
     */
    function dfs($stoneIndex, &$stones, &$visited) {
        $visited[$stoneIndex] = true;
        for ($i = 0; $i < count($stones); $i++) {
            if (!isset($visited[$i]) && ($stones[$i][0] == $stones[$stoneIndex][0] || $stones[$i][1] == $stones[$stoneIndex][1])) {
                self::dfs($i, $stones, $visited);
            }
        }
    }

}
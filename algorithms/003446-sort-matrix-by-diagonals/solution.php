<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[][]
     */
    function sortMatrix($grid) {
        $n = count($grid);
        $groups = [];

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $d = $i - $j;
                if (!isset($groups[$d])) {
                    $groups[$d] = [];
                }
                $groups[$d][] = $grid[$i][$j];
            }
        }

        foreach ($groups as $d => $list) {
            if ($d >= 0) {
                rsort($list);
            } else {
                sort($list);
            }
            $groups[$d] = $list;
        }

        $result = array_fill(0, $n, array_fill(0, $n, 0));
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $d = $i - $j;
                $result[$i][$j] = array_shift($groups[$d]);
            }
        }

        return $result;
    }
}
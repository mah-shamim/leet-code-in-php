<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function maximumImportance($n, $roads) {
        $ans = 0;
        $count = array_fill(0, $n, 0);

        foreach ($roads as $road) {
            $u = $road[0];
            $v = $road[1];
            ++$count[$u];
            ++$count[$v];
        }

        sort($count);

        for ($i = 0; $i < $n; ++$i) {
            $ans += ($i + 1) * $count[$i];
        }

        return $ans;
    }
}
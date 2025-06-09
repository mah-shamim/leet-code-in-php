<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function colorTheGrid($m, $n) {
        $mod = 1000000007;
        $configs = $this->generateConfigs($m);
        $k = count($configs);
        if ($k == 0) return 0;

        // Precompute compatible transitions
        $compatible = array();
        foreach ($configs as $i => $c1) {
            $compats = array();
            foreach ($configs as $j => $c2) {
                $valid = true;
                for ($row = 0; $row < $m; $row++) {
                    if ($c1['colors'][$row] == $c2['colors'][$row]) {
                        $valid = false;
                        break;
                    }
                }
                if ($valid) {
                    $compats[] = $j;
                }
            }
            $compatible[$i] = $compats;
        }

        // Initialize DP
        $dp = array_fill(0, $k, 1);

        for ($col = 2; $col <= $n; $col++) {
            $new_dp = array_fill(0, $k, 0);
            foreach ($compatible as $i => $trans) {
                if ($dp[$i] == 0) continue;
                foreach ($trans as $j) {
                    $new_dp[$j] = ($new_dp[$j] + $dp[$i]) % $mod;
                }
            }
            $dp = $new_dp;
        }

        $sum = array_sum($dp) % $mod;
        return $sum;
    }

    /**
     * @param $m
     * @return array
     */
    function generateConfigs($m) {
        $configs = array();
        $current = array();
        $this->backtrack($m, 0, -1, $current, $configs);
        return $configs;
    }

    /**
     * @param $m
     * @param $row
     * @param $prevColor
     * @param $current
     * @param $configs
     * @return void
     */
    function backtrack($m, $row, $prevColor, &$current, &$configs) {
        if ($row == $m) {
            $num = 0;
            $pow = 1;
            foreach ($current as $color) {
                $num += $color * $pow;
                $pow *= 3;
            }
            $configs[] = array('num' => $num, 'colors' => $current);
            return;
        }
        for ($color = 0; $color < 3; $color++) {
            if ($color == $prevColor) continue;
            array_push($current, $color);
            $this->backtrack($m, $row + 1, $color, $current, $configs);
            array_pop($current);
        }
    }
}
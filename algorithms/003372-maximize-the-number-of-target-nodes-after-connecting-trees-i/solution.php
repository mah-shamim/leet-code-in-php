<?php

class Solution {

    /**
     * @param Integer[][] $edges1
     * @param Integer[][] $edges2
     * @param Integer $k
     * @return Integer[]
     */
    function maxTargetNodes($edges1, $edges2, $k) {
        $n = count($edges1) + 1;
        $m = count($edges2) + 1;

        $graph1 = array_fill(0, $n, array());
        foreach ($edges1 as $edge) {
            $a = $edge[0];
            $b = $edge[1];
            $graph1[$a][] = $b;
            $graph1[$b][] = $a;
        }

        $count1_arr = array_fill(0, $n, 0);
        for ($i = 0; $i < $n; $i++) {
            $dist = array_fill(0, $n, -1);
            $q = array_fill(0, $n, 0);
            $head = 0;
            $tail = 0;
            $dist[$i] = 0;
            $q[$tail++] = $i;
            $cnt = 1;
            while ($head < $tail) {
                $u = $q[$head++];
                foreach ($graph1[$u] as $v) {
                    if ($dist[$v] == -1) {
                        $nd = $dist[$u] + 1;
                        if ($nd <= $k) {
                            $dist[$v] = $nd;
                            $cnt++;
                            $q[$tail++] = $v;
                        }
                    }
                }
            }
            $count1_arr[$i] = $cnt;
        }

        $M = 0;
        if ($k - 1 >= 0) {
            $graph2 = array_fill(0, $m, array());
            foreach ($edges2 as $edge) {
                $u = $edge[0];
                $v = $edge[1];
                $graph2[$u][] = $v;
                $graph2[$v][] = $u;
            }

            for ($j = 0; $j < $m; $j++) {
                $dist = array_fill(0, $m, -1);
                $q = array_fill(0, $m, 0);
                $head = 0;
                $tail = 0;
                $dist[$j] = 0;
                $q[$tail++] = $j;
                $cnt = 1;
                while ($head < $tail) {
                    $u = $q[$head++];
                    foreach ($graph2[$u] as $v) {
                        if ($dist[$v] == -1) {
                            $nd = $dist[$u] + 1;
                            if ($nd <= $k - 1) {
                                $dist[$v] = $nd;
                                $cnt++;
                                $q[$tail++] = $v;
                            }
                        }
                    }
                }
                if ($cnt > $M) {
                    $M = $cnt;
                }
            }
        }

        $ans = array();
        for ($i = 0; $i < $n; $i++) {
            $ans[] = $count1_arr[$i] + $M;
        }

        return $ans;
    }
}
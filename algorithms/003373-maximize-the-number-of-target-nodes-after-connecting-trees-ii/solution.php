<?php

class Solution {

    /**
     * @param Integer[][] $edges1
     * @param Integer[][] $edges2
     * @return Integer[]
     */
    function maxTargetNodes($edges1, $edges2) {
        $n = count($edges1) + 1;
        $m = count($edges2) + 1;

        $graph2 = array_fill(0, $m, array());
        foreach ($edges2 as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $graph2[$u][] = $v;
            $graph2[$v][] = $u;
        }

        $color2 = array_fill(0, $m, -1);
        $color2[0] = 0;
        $count0 = 1;
        $count1 = 0;
        $queue = new SplQueue();
        $queue->enqueue(0);
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            foreach ($graph2[$node] as $neighbor) {
                if ($color2[$neighbor] == -1) {
                    $color2[$neighbor] = 1 - $color2[$node];
                    if ($color2[$neighbor] == 0) {
                        $count0++;
                    } else {
                        $count1++;
                    }
                    $queue->enqueue($neighbor);
                }
            }
        }
        $base = max($count0, $count1);

        $graph1 = array_fill(0, $n, array());
        foreach ($edges1 as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $graph1[$u][] = $v;
            $graph1[$v][] = $u;
        }

        $color1 = array_fill(0, $n, -1);
        $color1[0] = 0;
        $cnt0 = 1;
        $cnt1 = 0;
        $queue = new SplQueue();
        $queue->enqueue(0);
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            foreach ($graph1[$node] as $neighbor) {
                if ($color1[$neighbor] == -1) {
                    $color1[$neighbor] = 1 - $color1[$node];
                    if ($color1[$neighbor] == 0) {
                        $cnt0++;
                    } else {
                        $cnt1++;
                    }
                    $queue->enqueue($neighbor);
                }
            }
        }

        $ans = array();
        for ($i = 0; $i < $n; $i++) {
            if ($color1[$i] == 0) {
                $ans[] = $cnt0 + $base;
            } else {
                $ans[] = $cnt1 + $base;
            }
        }

        return $ans;
    }
}
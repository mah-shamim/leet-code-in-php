<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Boolean[]
     */
    function findAnswer(int $n, array $edges): array
    {
        $g = [];
        foreach ($edges as $i => [$a, $b, $w]) {
            $g[$a][] = [$b, $w, $i];
            $g[$b][] = [$a, $w, $i];
        }
        $dist = array_fill(0, $n, INF);
        $dist[0] = 0;
        $q = [[0, 0]];
        while ($q) {
            [$da, $a] = array_shift($q);
            if ($da > $dist[$a]) {
                continue;
            }
            foreach ($g[$a] as [$b, $w, $_]) {
                if ($dist[$b] > $dist[$a] + $w) {
                    $dist[$b] = $dist[$a] + $w;
                    array_push($q, [$dist[$b], $b]);
                }
            }
        }
        $m = count($edges);
        $ans = array_fill(0, $m, false);
        if ($dist[$n - 1] == INF) {
            return $ans;
        }
        $q = new SplQueue();
        $q->enqueue($n - 1);
        while (!$q->isEmpty()) {
            $a = $q->dequeue();
            foreach ($g[$a] as [$b, $w, $i]) {
                if ($dist[$a] == $dist[$b] + $w) {
                    $ans[$i] = true;
                    $q->enqueue($b);
                }
            }
        }
        return $ans;
    }
}
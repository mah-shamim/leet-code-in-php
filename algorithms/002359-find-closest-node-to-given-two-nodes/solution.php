<?php

class Solution {

    /**
     * @param Integer[] $edges
     * @param Integer $node1
     * @param Integer $node2
     * @return Integer
     */
    function closestMeetingNode($edges, $node1, $node2) {
        $n = count($edges);
        $dist1 = array_fill(0, $n, -1);
        $dist2 = array_fill(0, $n, -1);

        $cur = $node1;
        $step = 0;
        while ($cur != -1 && $dist1[$cur] == -1) {
            $dist1[$cur] = $step;
            $step++;
            $cur = $edges[$cur];
        }

        $cur = $node2;
        $step = 0;
        while ($cur != -1 && $dist2[$cur] == -1) {
            $dist2[$cur] = $step;
            $step++;
            $cur = $edges[$cur];
        }

        $minMax = PHP_INT_MAX;
        $ans = -1;
        for ($i = 0; $i < $n; $i++) {
            if ($dist1[$i] == -1 || $dist2[$i] == -1) {
                continue;
            }
            $maxDist = max($dist1[$i], $dist2[$i]);
            if ($maxDist < $minMax) {
                $minMax = $maxDist;
                $ans = $i;
            }
        }
        return $ans;
    }
}
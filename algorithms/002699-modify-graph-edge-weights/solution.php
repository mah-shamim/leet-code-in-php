<?php

class Solution {
    private $kMax = 2000000000;

    /**
     * @param $n
     * @param $edges
     * @param $source
     * @param $destination
     * @param $target
     * @return array|mixed
     */
    public function modifiedGraphEdges($n, $edges, $source, $destination, $target) {
        $graph = array_fill(0, $n, []);

        // Build the graph
        foreach ($edges as $edge) {
            list($u, $v, $w) = $edge;
            if ($w == -1) continue;
            $graph[$u][] = [$v, $w];
            $graph[$v][] = [$u, $w];
        }

        // Calculate distance from source to destination
        $distToDestination = $this->dijkstra($graph, $source, $destination);
        if ($distToDestination < $target) return [];
        if ($distToDestination == $target) {
            // Change the weights of negative edges to an impossible value
            foreach ($edges as &$edge) {
                if ($edge[2] == -1) {
                    $edge[2] = $this->kMax;
                }
            }
            return $edges;
        }

        // Modify the graph and adjust weights
        for ($i = 0; $i < count($edges); ++$i) {
            list($u, $v, $w) = $edges[$i];
            if ($w != -1) continue;
            $edges[$i][2] = 1;
            $graph[$u][] = [$v, 1];
            $graph[$v][] = [$u, 1];
            $distToDestination = $this->dijkstra($graph, $source, $destination);
            if ($distToDestination <= $target) {
                $edges[$i][2] += $target - $distToDestination;
                // Change the weights of negative edges to an impossible value
                for ($j = $i + 1; $j < count($edges); ++$j) {
                    if ($edges[$j][2] == -1) {
                        $edges[$j][2] = $this->kMax;
                    }
                }
                return $edges;
            }
        }

        return [];
    }

    /**
     * @param $graph
     * @param $src
     * @param $dst
     * @return int|mixed
     */
    private function dijkstra($graph, $src, $dst) {
        $dist = array_fill(0, count($graph), PHP_INT_MAX);
        $minHeap = new SplPriorityQueue();
        $minHeap->setExtractFlags(SplPriorityQueue::EXTR_BOTH);

        $dist[$src] = 0;
        $minHeap->insert($src, 0);

        while (!$minHeap->isEmpty()) {
            $node = $minHeap->extract();
            $u = $node['data'];
            $d = -$node['priority'];

            if ($d > $dist[$u]) continue;

            foreach ($graph[$u] as list($v, $w)) {
                if ($d + $w < $dist[$v]) {
                    $dist[$v] = $d + $w;
                    $minHeap->insert($v, -$dist[$v]);
                }
            }
        }

        return $dist[$dst];
    }
}

<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function magnificentSets($n, $edges) {
        $graph = array_fill(0, $n, []);
        $uf = new UnionFind($n);
        $rootToGroupSize = [];

        foreach ($edges as $edge) {
            $u = $edge[0] - 1;
            $v = $edge[1] - 1;
            $graph[$u][] = $v;
            $graph[$v][] = $u;
            $uf->unionByRank($u, $v);
        }

        for ($i = 0; $i < $n; $i++) {
            $newGroupSize = $this->bfs($graph, $i);
            if ($newGroupSize == -1) {
                return -1;
            }
            $root = $uf->find($i);
            if (!isset($rootToGroupSize[$root])) {
                $rootToGroupSize[$root] = 0;
            }
            $rootToGroupSize[$root] = max($rootToGroupSize[$root], $newGroupSize);
        }

        $ans = 0;
        foreach ($rootToGroupSize as $groupSize) {
            $ans += $groupSize;
        }

        return $ans;
    }

    /**
     * @param $graph
     * @param $u
     * @return int
     */
    private function bfs($graph, $u) {
        $step = 0;
        $queue = [$u];
        $nodeToStep = [$u => 1];

        while (!empty($queue)) {
            $step++;
            $size = count($queue);
            for ($sz = 0; $sz < $size; $sz++) {
                $current = array_shift($queue);
                foreach ($graph[$current] as $v) {
                    if (!isset($nodeToStep[$v])) {
                        $queue[] = $v;
                        $nodeToStep[$v] = $step + 1;
                    } elseif ($nodeToStep[$v] == $step) {
                        // There is an odd number of edges in the cycle.
                        return -1;
                    }
                }
            }
        }

        return $step;
    }
}

class UnionFind {
    /**
     * @var array
     */
    private $id;
    /**
     * @var array
     */
    private $rank;

    /**
     * @param $n
     */
    public function __construct($n) {
        $this->id = range(0, $n - 1);
        $this->rank = array_fill(0, $n, 0);
    }

    /**
     * @param $u
     * @param $v
     * @return void
     */
    public function unionByRank($u, $v) {
        $i = $this->find($u);
        $j = $this->find($v);
        if ($i == $j) {
            return;
        }
        if ($this->rank[$i] < $this->rank[$j]) {
            $this->id[$i] = $j;
        } elseif ($this->rank[$i] > $this->rank[$j]) {
            $this->id[$j] = $i;
        } else {
            $this->id[$i] = $j;
            $this->rank[$j]++;
        }
    }

    /**
     * @param $u
     * @return mixed
     */
    public function find($u) {
        if ($this->id[$u] == $u) {
            return $u;
        }
        return $this->id[$u] = $this->find($this->id[$u]);
    }
}

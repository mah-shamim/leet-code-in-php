<?php

class UnionFind {
    private $parent;
    private $rank;

    public function __construct($n) {
        $this->parent = range(0, $n);
        $this->rank = array_fill(0, $n + 1, 1);
    }

    public function find($x) {
        if ($this->parent[$x] !== $x) {
            $this->parent[$x] = $this->find($this->parent[$x]);
        }
        return $this->parent[$x];
    }

    public function union($x, $y) {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX === $rootY) {
            return false;
        }

        if ($this->rank[$rootX] > $this->rank[$rootY]) {
            $this->parent[$rootY] = $rootX;
        } elseif ($this->rank[$rootX] < $this->rank[$rootY]) {
            $this->parent[$rootX] = $rootY;
        } else {
            $this->parent[$rootY] = $rootX;
            $this->rank[$rootX]++;
        }

        return true;
    }
}

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function maxNumEdgesToRemove($n, $edges) {
        // Create two union-find instances for Alice and Bob
        $ufAlice = new UnionFind($n);
        $ufBob = new UnionFind($n);

        // Sort edges by type in descending order to prioritize type 3 edges
        usort($edges, function($a, $b) {
            return $b[0] - $a[0];
        });

        $requiredEdges = 0;

        foreach ($edges as $edge) {
            $type = $edge[0];
            $u = $edge[1];
            $v = $edge[2];

            if ($type === 3) {
                $unionAlice = $ufAlice->union($u, $v);
                $unionBob = $ufBob->union($u, $v);
                if ($unionAlice || $unionBob) {
                    $requiredEdges++;
                }
            } elseif ($type === 1) {
                if ($ufAlice->union($u, $v)) {
                    $requiredEdges++;
                }
            } elseif ($type === 2) {
                if ($ufBob->union($u, $v)) {
                    $requiredEdges++;
                }
            }
        }

        // Check if both Alice and Bob can traverse the entire graph
        for ($i = 2; $i <= $n; $i++) {
            if ($ufAlice->find($i) !== $ufAlice->find(1) || $ufBob->find($i) !== $ufBob->find(1)) {
                return -1;
            }
        }

        return count($edges) - $requiredEdges;
    }
}
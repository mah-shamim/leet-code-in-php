<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer[][] $query
     * @return Integer[]
     */
    function minimumCost($n, $edges, $query) {
        $dsu = new DSU($n);
        foreach ($edges as $edge) {
            $dsu->union($edge[0], $edge[1]);
        }

        $component_and = array_fill(0, $n, -1);
        foreach ($edges as $edge) {
            $u = $edge[0];
            $w = $edge[2];
            $root = $dsu->find($u);
            $component_and[$root] &= $w;
        }

        $answer = array();
        foreach ($query as $q) {
            $s = $q[0];
            $t = $q[1];
            if ($dsu->find($s) != $dsu->find($t)) {
                array_push($answer, -1);
            } else {
                $root = $dsu->find($s);
                array_push($answer, $component_and[$root]);
            }
        }

        return $answer;
    }
}


class DSU {
    /**
     * @var array
     */
    private $parent;
    /**
     * @var array
     */
    private $rank;

    /**
     * @param $n
     */
    public function __construct($n) {
        $this->parent = array();
        $this->rank = array();
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
            $this->rank[$i] = 0;
        }
    }

    /**
     * @param $x
     * @return mixed
     */
    public function find($x) {
        if ($this->parent[$x] != $x) {
            $this->parent[$x] = $this->find($this->parent[$x]);
        }
        return $this->parent[$x];
    }

    /**
     * @param $x
     * @param $y
     * @return bool
     */
    public function union($x, $y) {
        $xr = $this->find($x);
        $yr = $this->find($y);
        if ($xr == $yr) {
            return false;
        }
        if ($this->rank[$xr] < $this->rank[$yr]) {
            $this->parent[$xr] = $yr;
        } else {
            $this->parent[$yr] = $xr;
            if ($this->rank[$xr] == $this->rank[$yr]) {
                $this->rank[$xr]++;
            }
        }
        return true;
    }
}
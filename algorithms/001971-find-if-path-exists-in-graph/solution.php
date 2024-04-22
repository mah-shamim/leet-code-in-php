<?php

class Solution {

    public $graph;

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer $source
     * @param Integer $destination
     * @return Boolean
     */

    public function validPath(int $n, array $edges, int $source, int $destination): bool
    {
        $this->graph = array_fill(0, $n, 0);

        for ($i = 1; $i < $n; $i++) {
            $this->graph[$i] = $i;
        }

        foreach ($edges as $edge) {
            $this->merge($this->find($edge[0]), $this->find($edge[1]));
        }

        return $this->find($this->graph[$source]) == $this->find($this->graph[$destination]);
    }

    public function find($a) {
        return $this->graph[$a] == $a ? $a : $this->graph[$a] = $this->find($this->graph[$a]);
    }

    public function merge($a, $b): void
    {
        $this->graph[$a] = $b;
    }
}
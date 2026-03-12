<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer $k
     * @return Integer
     */
    function maxStability(int $n, array $edges, int $k): int
    {
        $maxStrength = 0;
        $mustEdges = [];
        $optEdges = [];

        foreach ($edges as $e) {
            $maxStrength = max($maxStrength, $e[2]);
            if ($e[3] == 1) {
                $mustEdges[] = $e;
            } else {
                $optEdges[] = $e;
            }
        }

        $low = 1;
        $high = 2 * $maxStrength;
        $answer = -1;

        $check = function($threshold) use ($n, $mustEdges, $optEdges, $k) {
            $dsu = new DSU($n);
            $components = $n;

            // process mandatory edges
            foreach ($mustEdges as $e) {
                if ($e[2] < $threshold) {
                    return false;
                }
                if (!$dsu->union($e[0], $e[1])) {
                    return false; // cycle detected
                }
                $components--;
            }

            // first, use optional edges that already meet the threshold (no upgrade)
            foreach ($optEdges as $e) {
                if ($e[2] >= $threshold) {
                    if ($dsu->union($e[0], $e[1])) {
                        $components--;
                    }
                }
            }

            // then, use optional edges that need an upgrade to meet the threshold
            $upgradesUsed = 0;
            foreach ($optEdges as $e) {
                if ($e[2] < $threshold && 2 * $e[2] >= $threshold) {
                    if ($dsu->union($e[0], $e[1])) {
                        $components--;
                        $upgradesUsed++;
                        if ($upgradesUsed > $k) {
                            return false;
                        }
                    }
                }
            }

            return $components == 1;
        };

        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            if ($check($mid)) {
                $answer = $mid;
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return $answer;
    }
}


class DSU {
    private array $parent;
    private array $size;

    /**
     * @param $n
     */
    public function __construct($n) {
        $this->parent = range(0, $n - 1);
        $this->size = array_fill(0, $n, 1);
    }

    /**
     * @param $x
     * @return mixed
     */
    public function find($x): mixed
    {
        while ($this->parent[$x] != $x) {
            $this->parent[$x] = $this->parent[$this->parent[$x]];
            $x = $this->parent[$x];
        }
        return $x;
    }

    /**
     * @param $x
     * @param $y
     * @return bool
     */
    public function union($x, $y): bool
    {
        $x = $this->find($x);
        $y = $this->find($y);
        if ($x == $y) {
            return false;
        }
        if ($this->size[$x] < $this->size[$y]) {
            $this->parent[$x] = $y;
            $this->size[$y] += $this->size[$x];
        } else {
            $this->parent[$y] = $x;
            $this->size[$x] += $this->size[$y];
        }
        return true;
    }
}
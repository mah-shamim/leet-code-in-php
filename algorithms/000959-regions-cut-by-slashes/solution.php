<?php

class Solution {

    /**
     * @param String[] $grid
     * @return Integer
     */
    function regionsBySlashes($grid) {
        $n = count($grid);
        $uf = new UnionFind($n * $n * 4);

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $root = 4 * ($i * $n + $j);
                $char = $grid[$i][$j];

                // Connect the parts within the cell
                if ($char == ' ') {
                    $uf->union($root, $root + 1);
                    $uf->union($root + 1, $root + 2);
                    $uf->union($root + 2, $root + 3);
                } elseif ($char == '/') {
                    $uf->union($root, $root + 3);
                    $uf->union($root + 1, $root + 2);
                } elseif ($char == '\\') {
                    $uf->union($root, $root + 1);
                    $uf->union($root + 2, $root + 3);
                }

                // Connect with the right cell
                if ($j + 1 < $n) {
                    $uf->union($root + 1, 4 * ($i * $n + $j + 1) + 3);
                }
                // Connect with the bottom cell
                if ($i + 1 < $n) {
                    $uf->union($root + 2, 4 * (($i + 1) * $n + $j));
                }
            }
        }

        $regions = 0;
        for ($i = 0; $i < $n * $n * 4; $i++) {
            if ($uf->find($i) == $i) {
                $regions++;
            }
        }

        return $regions;

    }
}

class UnionFind {
    private $parent;

    /**
     * @param $n
     */
    public function __construct($n) {
        $this->parent = range(0, $n - 1);
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
     * @return void
     */
    public function union($x, $y) {
        $rootX = $this->find($x);
        $rootY = $this->find($y);
        if ($rootX != $rootY) {
            $this->parent[$rootX] = $rootY;
        }
    }
}


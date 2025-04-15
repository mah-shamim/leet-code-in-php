<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function goodTriplets($nums1, $nums2) {
        $n = count($nums1);
        $pos1 = array();
        $pos2 = array();
        for ($i = 0; $i < $n; $i++) {
            $pos1[$nums1[$i]] = $i;
            $pos2[$nums2[$i]] = $i;
        }
        $elements = array();
        for ($x = 0; $x < $n; $x++) {
            $elements[] = array('x' => $x, 'a' => $pos1[$x], 'b' => $pos2[$x]);
        }

        // Compute left counts
        usort($elements, function($a, $b) {
            return $a['a'] - $b['a'];
        });
        $ft_left = new FenwickTree($n);
        $left = array_fill(0, $n, 0);
        foreach ($elements as $elem) {
            $x = $elem['x'];
            $b = $elem['b'];
            $left[$x] = $ft_left->query($b - 1);
            $ft_left->update($b, 1);
        }

        // Compute right counts
        usort($elements, function($a, $b) {
            return $b['a'] - $a['a'];
        });
        $ft_right = new FenwickTree($n);
        $right = array_fill(0, $n, 0);
        $total = 0;
        foreach ($elements as $elem) {
            $x = $elem['x'];
            $b = $elem['b'];
            $sum = $ft_right->query($b);
            $right[$x] = $total - $sum;
            $ft_right->update($b, 1);
            $total++;
        }

        // Calculate result
        $result = 0;
        for ($x = 0; $x < $n; $x++) {
            $result += $left[$x] * $right[$x];
        }
        return $result;
    }
}


class FenwickTree {
    private $tree;
    private $size;

    /**
     * @param $size
     */
    public function __construct($size) {
        $this->size = $size;
        $this->tree = array_fill(0, $size + 1, 0); // 1-based indexing
    }

    /**
     * @param $index
     * @param $delta
     * @return void
     */
    public function update($index, $delta) {
        $index++; // convert to 1-based index
        while ($index <= $this->size) {
            $this->tree[$index] += $delta;
            $index += $index & -$index;
        }
    }

    /**
     * @param $index
     * @return int|mixed
     */
    public function query($index) {
        $index++; // convert to 1-based index
        $sum = 0;
        while ($index > 0) {
            $sum += $this->tree[$index];
            $index -= $index & -$index;
        }
        return $sum;
    }
}
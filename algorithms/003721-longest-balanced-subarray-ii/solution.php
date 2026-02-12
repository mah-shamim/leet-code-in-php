<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestBalanced(array $nums): int
    {
        $n = count($nums);
        if ($n == 0) return 0;

        // ---------- preprocess next occurrence ----------
        $next_occ = array_fill(0, $n, $n);
        $last = [];
        for ($i = $n - 1; $i >= 0; $i--) {
            $val = $nums[$i];
            if (isset($last[$val])) {
                $next_occ[$i] = $last[$val];
            }
            $last[$val] = $i;
        }

        // ---------- first occurrence of each value ----------
        $first_occ = [];
        for ($i = 0; $i < $n; $i++) {
            $val = $nums[$i];
            if (!isset($first_occ[$val])) {
                $first_occ[$val] = $i;
            }
        }

        // ---------- initial balance for l = 0 ----------
        $B = array_fill(0, $n, 0);
        foreach ($first_occ as $val => $pos) {
            $sign = ($val % 2 == 1) ? 1 : -1;
            $B[$pos] += $sign;
        }
        for ($i = 1; $i < $n; $i++) {
            $B[$i] += $B[$i - 1];
        }

        // ---------- segment tree over end indices ----------
        $seg = new SegmentTree($B);
        $ans = 0;

        // ---------- sweep left boundary ----------
        for ($l = 0; $l < $n; $l++) {
            // query rightmost index r >= l with balance 0
            $r = $seg->query_rightmost_zero($l, $n - 1);
            if ($r != -1) {
                $ans = max($ans, $r - $l + 1);
            }

            if ($l == $n - 1) break;

            // remove nums[$l] – move left boundary to l+1
            $val = $nums[$l];
            $sign = ($val % 2 == 1) ? 1 : -1;
            $next = $next_occ[$l];               // next occurrence of same value
            $delta = -$sign;                    // contribution of this occurrence removed
            $seg->range_add(0, $next - 1, $delta);
        }

        return $ans;
    }
}


class SegmentTree {
    private int $n;
    private array $min;
    private array $max;
    private array $minPos;
    private array $maxPos;
    private array $lazy;
    private int|float $size;

    public function __construct($arr) {
        $this->n = count($arr);
        $this->size = 4 * $this->n;
        $this->min = array_fill(0, $this->size, 0);
        $this->max = array_fill(0, $this->size, 0);
        $this->minPos = array_fill(0, $this->size, 0);
        $this->maxPos = array_fill(0, $this->size, 0);
        $this->lazy = array_fill(0, $this->size, 0);
        $this->build(1, 0, $this->n - 1, $arr);
    }

    /**
     * @param $node
     * @param $l
     * @param $r
     * @param $arr
     * @return void
     */
    private function build($node, $l, $r, $arr): void
    {
        if ($l == $r) {
            $val = $arr[$l];
            $this->min[$node] = $val;
            $this->max[$node] = $val;
            $this->minPos[$node] = $l;
            $this->maxPos[$node] = $l;
            return;
        }
        $mid = intdiv($l + $r, 2);
        $this->build($node * 2, $l, $mid, $arr);
        $this->build($node * 2 + 1, $mid + 1, $r, $arr);
        $this->merge($node);
    }

    /**
     * @param $node
     * @return void
     */
    private function merge($node): void
    {
        $left = $node * 2;
        $right = $node * 2 + 1;

        // min
        if ($this->min[$left] < $this->min[$right]) {
            $this->min[$node] = $this->min[$left];
            $this->minPos[$node] = $this->minPos[$left];
        } elseif ($this->min[$left] > $this->min[$right]) {
            $this->min[$node] = $this->min[$right];
            $this->minPos[$node] = $this->minPos[$right];
        } else {
            $this->min[$node] = $this->min[$left];
            $this->minPos[$node] = max($this->minPos[$left], $this->minPos[$right]);
        }

        // max
        if ($this->max[$left] > $this->max[$right]) {
            $this->max[$node] = $this->max[$left];
            $this->maxPos[$node] = $this->maxPos[$left];
        } elseif ($this->max[$left] < $this->max[$right]) {
            $this->max[$node] = $this->max[$right];
            $this->maxPos[$node] = $this->maxPos[$right];
        } else {
            $this->max[$node] = $this->max[$left];
            $this->maxPos[$node] = max($this->maxPos[$left], $this->maxPos[$right]);
        }
    }

    /**
     * @param $node
     * @param $add
     * @return void
     */
    private function apply($node, $add): void
    {
        $this->min[$node] += $add;
        $this->max[$node] += $add;
        $this->lazy[$node] += $add;
    }

    /**
     * @param $node
     * @return void
     */
    private function push($node): void
    {
        if ($this->lazy[$node] != 0) {
            $add = $this->lazy[$node];
            $this->apply($node * 2, $add);
            $this->apply($node * 2 + 1, $add);
            $this->lazy[$node] = 0;
        }
    }

    /**
     * @param $ql
     * @param $qr
     * @param $add
     * @return void
     */
    public function range_add($ql, $qr, $add): void
    {
        if ($ql > $qr) return;
        $this->_range_add(1, 0, $this->n - 1, $ql, $qr, $add);
    }

    /**
     * @param $node
     * @param $l
     * @param $r
     * @param $ql
     * @param $qr
     * @param $add
     * @return void
     */
    private function _range_add($node, $l, $r, $ql, $qr, $add): void
    {
        if ($ql <= $l && $r <= $qr) {
            $this->apply($node, $add);
            return;
        }
        $this->push($node);
        $mid = intdiv($l + $r, 2);
        if ($ql <= $mid) $this->_range_add($node * 2, $l, $mid, $ql, $qr, $add);
        if ($qr > $mid) $this->_range_add($node * 2 + 1, $mid + 1, $r, $ql, $qr, $add);
        $this->merge($node);
    }

    /**
     * @param $ql
     * @param $qr
     * @return mixed
     */
    public function query_rightmost_zero($ql, $qr): mixed
    {
        return $this->_query_rightmost_zero(1, 0, $this->n - 1, $ql, $qr);
    }

    /**
     * @param $node
     * @param $l
     * @param $r
     * @param $ql
     * @param $qr
     * @return int|mixed
     */
    private function _query_rightmost_zero($node, $l, $r, $ql, $qr): mixed
    {
        // no overlap
        if ($l > $qr || $r < $ql) return -1;

        // if no zero possible in this segment
        if ($this->min[$node] > 0 || $this->max[$node] < 0) {
            return -1;
        }

        // fully inside and we can answer directly
        if ($ql <= $l && $r <= $qr) {
            if ($this->min[$node] == 0) {
                return $this->minPos[$node];
            }
            if ($this->max[$node] == 0) {
                return $this->maxPos[$node];
            }
        }

        // otherwise search children, right first for maximum index
        $this->push($node);
        $mid = intdiv($l + $r, 2);
        $right_res = $this->_query_rightmost_zero($node * 2 + 1, $mid + 1, $r, $ql, $qr);
        if ($right_res != -1) return $right_res;
        return $this->_query_rightmost_zero($node * 2, $l, $mid, $ql, $qr);
    }
}
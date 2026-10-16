<?php

class Solution {

    private array $sum;
    private array $sq;
    private array $lazy;
    private int $n;

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function sumCounts(array $nums): int
    {
        $this->n = count($nums);
        $size = 4 * $this->n + 5;

        $this->sum = array_fill(0, $size, 0);
        $this->sq = array_fill(0, $size, 0);
        $this->lazy = array_fill(0, $size, 0);

        $MOD = 1000000007;
        $ans = 0;
        $last = [];

        for ($i = 0; $i < $this->n; $i++) {
            $x = $nums[$i];
            $prev = $last[$x] ?? -1;

            // For left endpoints in [prev + 1, i], nums[i] is a new distinct value.
            $this->rangeAdd(1, 0, $this->n - 1, $prev + 1, $i, 1);

            // sq[1] = sum of squares of distinct counts of all subarrays ending at i.
            $ans = ($ans + $this->sq[1]) % $MOD;

            $last[$x] = $i;
        }

        return $ans;
    }

    /**
     * @param int $node
     * @param int $l
     * @param int $r
     * @param int $val
     * @return void
     */
    private function apply(int $node, int $l, int $r, int $val): void {
        $len = $r - $l + 1;

        // Add val to every value in this segment.
        // (a + val)^2 = a^2 + 2*a*val + val^2
        $this->sq[$node] += 2 * $this->sum[$node] * $val + $len * $val * $val;
        $this->sum[$node] += $len * $val;
        $this->lazy[$node] += $val;
    }

    /**
     * @param int $node
     * @param int $l
     * @param int $r
     * @return void
     */
    private function push(int $node, int $l, int $r): void {
        if ($this->lazy[$node] === 0) {
            return;
        }

        $mid = ($l + $r) >> 1;
        $val = $this->lazy[$node];

        $this->apply($node << 1, $l, $mid, $val);
        $this->apply(($node << 1) | 1, $mid + 1, $r, $val);

        $this->lazy[$node] = 0;
    }

    /**
     * @param int $node
     * @param int $l
     * @param int $r
     * @param int $ql
     * @param int $qr
     * @param int $val
     * @return void
     */
    private function rangeAdd(
        int $node,
        int $l,
        int $r,
        int $ql,
        int $qr,
        int $val
    ): void {
        if ($ql <= $l && $r <= $qr) {
            $this->apply($node, $l, $r, $val);
            return;
        }

        $this->push($node, $l, $r);

        $mid = ($l + $r) >> 1;

        if ($ql <= $mid) {
            $this->rangeAdd($node << 1, $l, $mid, $ql, $qr, $val);
        }

        if ($qr > $mid) {
            $this->rangeAdd(($node << 1) | 1, $mid + 1, $r, $ql, $qr, $val);
        }

        $this->sum[$node] = $this->sum[$node << 1] + $this->sum[($node << 1) | 1];
        $this->sq[$node] = $this->sq[$node << 1] + $this->sq[($node << 1) | 1];
    }
}
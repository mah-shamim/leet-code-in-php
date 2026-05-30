<?php

class Solution {

    /**
     * @param Integer[][] $queries
     * @return Boolean[]
     */
    function getResults(array $queries): array
    {
        // Find MAXVAL
        $maxVal = 0;
        foreach ($queries as $q) {
            $maxVal = max($maxVal, $q[1]);
        }
        $maxVal++; // 1-indexed safety

        // Segment tree over positions [0..maxVal]
        // seg[pos] = size of gap that STARTS at pos (i.e., gap between obstacle at pos and next obstacle)
        $seg = new SegTree($maxVal + 1);

        // Sorted set of obstacles. Use a sorted array with binary search.
        // We add sentinel: obstacle at 0 (origin) and conceptually track gaps.
        // Actually: treat position 0 as a wall (obstacle), so gaps start from 0.
        // The initial gap from 0 to "infinity" — but we bound by query x.
        // Sentinel obstacle at 0:
        $obstacles = [0]; // sorted array, always has 0
        // Gap starting at 0: initially "infinite" — we represent as maxVal
        $seg->set(0, $maxVal);

        $results = [];

        foreach ($queries as $q) {
            if ($q[0] === 1) {
                // Add obstacle at x = q[1]
                $p = $q[1];

                // Binary search for predecessor (largest obstacle < p)
                $lo = 0; $hi = count($obstacles) - 1; $L = 0;
                while ($lo <= $hi) {
                    $mid = ($lo + $hi) >> 1;
                    if ($obstacles[$mid] < $p) { $L = $obstacles[$mid]; $lo = $mid + 1; }
                    else $hi = $mid - 1;
                }

                // Binary search for successor (smallest obstacle > p)
                $lo = 0; $hi = count($obstacles) - 1; $R = $maxVal;
                while ($lo <= $hi) {
                    $mid = ($lo + $hi) >> 1;
                    if ($obstacles[$mid] > $p) { $R = $obstacles[$mid]; $hi = $mid - 1; }
                    else $lo = $mid + 1;
                }

                // Remove old gap [L, R] (size R - L, stored at position L)
                $seg->set($L, $p - $L);  // gap [L, p]
                $seg->set($p, $R - $p);  // gap [p, R]

                // Insert p into sorted array
                $pos = count($obstacles);
                $lo = 0; $hi = count($obstacles) - 1;
                while ($lo <= $hi) {
                    $mid = ($lo + $hi) >> 1;
                    if ($obstacles[$mid] < $p) $lo = $mid + 1;
                    else $hi = $mid - 1;
                }
                array_splice($obstacles, $lo, 0, [$p]);

            } else {
                // Query: can we place block of size sz in [0, x]?
                $x = $q[1];
                $sz = $q[2];

                if ($sz > $x) {
                    $results[] = false;
                    continue;
                }

                // Find largest obstacle <= x
                $lo = 0; $hi = count($obstacles) - 1; $lastObs = 0;
                while ($lo <= $hi) {
                    $mid = ($lo + $hi) >> 1;
                    if ($obstacles[$mid] <= $x) { $lastObs = $obstacles[$mid]; $lo = $mid + 1; }
                    else $hi = $mid - 1;
                }

                // Gap from lastObs to x (partial gap at right boundary)
                $partialGap = $x - $lastObs;
                if ($partialGap >= $sz) {
                    $results[] = true;
                    continue;
                }

                // Check max full gap with left endpoint in [0, x - sz]
                $maxGap = $seg->max(0, $x - $sz);
                $results[] = ($maxGap >= $sz);
            }
        }

        return $results;
    }
}


class SegTree {
    private array $tree;
    private int $n;

    /**
     * @param int $n
     */
    public function __construct(int $n) {
        $this->n = $n;
        $this->tree = array_fill(0, 4 * $n, 0);
    }

    /**
     * @param int $node
     * @param int $start
     * @param int $end
     * @param int $idx
     * @param int $val
     * @return void
     */
    public function update(int $node, int $start, int $end, int $idx, int $val): void {
        if ($start === $end) {
            $this->tree[$node] = $val;
            return;
        }
        $mid = ($start + $end) >> 1;
        if ($idx <= $mid) {
            $this->update(2 * $node, $start, $mid, $idx, $val);
        } else {
            $this->update(2 * $node + 1, $mid + 1, $end, $idx, $val);
        }
        $this->tree[$node] = max($this->tree[2 * $node], $this->tree[2 * $node + 1]);
    }

    /**
     * @param int $node
     * @param int $start
     * @param int $end
     * @param int $l
     * @param int $r
     * @return int
     */
    public function query(int $node, int $start, int $end, int $l, int $r): int {
        if ($r < $start || $end < $l) return 0;
        if ($l <= $start && $end <= $r) return $this->tree[$node];
        $mid = ($start + $end) >> 1;
        return max(
            $this->query(2 * $node, $start, $mid, $l, $r),
            $this->query(2 * $node + 1, $mid + 1, $end, $l, $r)
        );
    }

    /**
     * @param int $idx
     * @param int $val
     * @return void
     */
    public function set(int $idx, int $val): void {
        $this->update(1, 0, $this->n - 1, $idx, $val);
    }

    /**
     * @param int $l
     * @param int $r
     * @return int
     */
    public function max(int $l, int $r): int {
        if ($l > $r) return 0;
        return $this->query(1, 0, $this->n - 1, $l, $r);
    }
}
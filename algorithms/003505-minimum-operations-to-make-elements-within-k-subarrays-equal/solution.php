<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $x
     * @param Integer $k
     * @return Integer
     */
    function minOperations(array $nums, int $x, int $k): int
    {
        $n = count($nums);

        // Coordinate compression for Fenwick trees
        $vals = $nums;
        sort($vals);
        $vals = array_values(array_unique($vals));
        $m = count($vals);
        $map = array_flip($vals);

        // Fenwick trees: counts and sums
        $bitCount = array_fill(0, $m + 1, 0);
        $bitSum = array_fill(0, $m + 1, 0);

        $windowSum = 0;
        for ($i = 0; $i < $x; $i++) {
            $v = $nums[$i];
            $windowSum += $v;
            $idx = $map[$v] + 1;
            $this->add($bitCount, $bitSum, $idx, 1, $v, $m);
        }

        $highestPower = 1;
        while (($highestPower << 1) <= $m) {
            $highestPower <<= 1;
        }

        $medianRank = intdiv($x + 1, 2); // lower median for even x is fine
        $totalWindows = $n - $x + 1;
        $cost = array_fill(0, $totalWindows, 0);

        for ($start = 0; $start < $totalWindows; $start++) {
            $medianIndex = $this->kth($bitCount, $medianRank, $m, $highestPower);
            $median = $vals[$medianIndex - 1];

            // Prefix count and sum up to median
            $cntLE = 0;
            $sumLE = 0;
            $p = $medianIndex;
            while ($p > 0) {
                $cntLE += $bitCount[$p];
                $sumLE += $bitSum[$p];
                $p -= $p & -$p;
            }

            // Cost to make all elements equal to median
            $cost[$start] = $median * $cntLE - $sumLE
                + ($windowSum - $sumLE)
                - $median * ($x - $cntLE);

            // Slide window
            if ($start + 1 < $totalWindows) {
                $out = $nums[$start];
                $in = $nums[$start + $x];

                $windowSum += $in - $out;

                $idxOut = $map[$out] + 1;
                $this->add($bitCount, $bitSum, $idxOut, -1, -$out, $m);

                $idxIn = $map[$in] + 1;
                $this->add($bitCount, $bitSum, $idxIn, 1, $in, $m);
            }
        }

        // DP:
        // prev[i] = minimum cost using first i elements to choose j-1 windows
        $INF = 1000000000000000000;
        $prev = array_fill(0, $n + 1, 0); // 0 windows => cost 0

        for ($chosen = 1; $chosen <= $k; $chosen++) {
            $cur = array_fill(0, $n + 1, $INF);

            for ($i = 1; $i <= $n; $i++) {
                // Skip current position
                $best = $cur[$i - 1];

                // Take a window ending at i-1
                if ($i >= $x) {
                    $start = $i - $x;
                    $candidate = $prev[$start] + $cost[$start];
                    if ($candidate < $best) {
                        $best = $candidate;
                    }
                }

                $cur[$i] = $best;
            }

            $prev = $cur;
        }

        return $prev[$n];
    }

    /**
     * @param $bitCount
     * @param $bitSum
     * @param $idx
     * @param $deltaCount
     * @param $deltaSum
     * @param $m
     * @return void
     */
    private function add(&$bitCount, &$bitSum, $idx, $deltaCount, $deltaSum, $m): void
    {
        while ($idx <= $m) {
            $bitCount[$idx] += $deltaCount;
            $bitSum[$idx] += $deltaSum;
            $idx += $idx & -$idx;
        }
    }

    /**
     * @param $bitCount
     * @param $k
     * @param $m
     * @param $highestPower
     * @return int|mixed
     */
    private function kth($bitCount, $k, $m, $highestPower): mixed
    {
        $idx = 0;

        for ($step = $highestPower; $step > 0; $step >>= 1) {
            $next = $idx + $step;
            if ($next <= $m && $bitCount[$next] < $k) {
                $idx = $next;
                $k -= $bitCount[$next];
            }
        }

        return $idx + 1;
    }
}
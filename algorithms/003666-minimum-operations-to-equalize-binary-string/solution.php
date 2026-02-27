<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function minOperations(string $s, int $k): int
    {
        $n = strlen($s);
        // count zeros
        $zeroCount = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] == '0') $zeroCount++;
        }
        if ($zeroCount == 0) return 0;

        // Disjoint set structures for even and odd indices.
        // $parentEven[$i] = next unvisited even index >= $i, or null if none.
        // Initially each index points to itself.
        $parentEven = [];
        $parentOdd = [];
        for ($i = 0; $i <= $n; $i += 2) $parentEven[$i] = $i;
        for ($i = 1; $i <= $n; $i += 2) $parentOdd[$i] = $i;

        // Find for even indices with path compression
        $findEven = function($x) use (&$parentEven, $n) {
            if ($x > $n) return null;
            $stack = [];
            while (isset($parentEven[$x]) && $parentEven[$x] !== $x && $parentEven[$x] !== null) {
                $stack[] = $x;
                $x = $parentEven[$x];
            }
            // $x is now either a self‑pointer (unvisited) or a node that points to null
            $result = null;
            if (isset($parentEven[$x]) && $parentEven[$x] === $x) {
                $result = $x;
            }
            foreach ($stack as $node) {
                $parentEven[$node] = $result;
            }
            return $result;
        };

        // Find for odd indices
        $findOdd = function($x) use (&$parentOdd, $n) {
            if ($x > $n) return null;
            $stack = [];
            while (isset($parentOdd[$x]) && $parentOdd[$x] !== $x && $parentOdd[$x] !== null) {
                $stack[] = $x;
                $x = $parentOdd[$x];
            }
            $result = null;
            if (isset($parentOdd[$x]) && $parentOdd[$x] === $x) {
                $result = $x;
            }
            foreach ($stack as $node) {
                $parentOdd[$node] = $result;
            }
            return $result;
        };

        // Get first unvisited even index ≥ L
        $findNextEven = function($L) use ($n, $findEven) {
            $start = ($L % 2 == 0) ? $L : $L + 1;
            if ($start > $n) return null;
            return $findEven($start);
        };

        // Get first unvisited odd index ≥ L
        $findNextOdd = function($L) use ($n, $findOdd) {
            $start = ($L % 2 == 1) ? $L : $L + 1;
            if ($start > $n) return null;
            return $findOdd($start);
        };

        // Remove the initial state from its parity set
        if ($zeroCount % 2 == 0) {
            $parentEven[$zeroCount] = $findNextEven($zeroCount + 2);
        } else {
            $parentOdd[$zeroCount] = $findNextOdd($zeroCount + 2);
        }

        $visited = array_fill(0, $n + 1, false);
        $visited[$zeroCount] = true;
        $queue = new SplQueue();
        $queue->enqueue($zeroCount);
        $level = 0;

        while (!$queue->isEmpty()) {
            $size = $queue->count();
            for ($i = 0; $i < $size; $i++) {
                $z = $queue->dequeue();
                if ($z == 0) return $level;

                $ones = $n - $z;
                $i_min = max(0, $k - $ones);
                $i_max = min($k, $z);
                $z_min = $z + $k - 2 * $i_max;      // smallest possible new zero count
                $z_max = $z + $k - 2 * $i_min;      // largest possible new zero count
                $parity = ($z + $k) % 2;

                if ($parity == 0) {
                    $next = $findNextEven($z_min);
                    while ($next !== null && $next <= $z_max) {
                        $visited[$next] = true;
                        $queue->enqueue($next);
                        $nextAfter = $findNextEven($next + 2);
                        $parentEven[$next] = $nextAfter;
                        $next = $nextAfter;
                    }
                } else {
                    $next = $findNextOdd($z_min);
                    while ($next !== null && $next <= $z_max) {
                        $visited[$next] = true;
                        $queue->enqueue($next);
                        $nextAfter = $findNextOdd($next + 2);
                        $parentOdd[$next] = $nextAfter;
                        $next = $nextAfter;
                    }
                }
            }
            $level++;
        }

        return -1;
    }
}
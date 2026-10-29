<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param String $s
     * @param String[] $queries
     * @return Boolean[]
     */
    function palindromePath(int $n, array $edges, string $s, array $queries): array
    {
        // Build adjacency list.
        $adj = array_fill(0, $n, []);
        foreach ($edges as $e) {
            $u = $e[0];
            $v = $e[1];
            $adj[$u][] = $v;
            $adj[$v][] = $u;
        }

        // Euler tour: tin[u]..tout[u] is the subtree interval of u.
        $parent = array_fill(0, $n, 0);
        $depth = array_fill(0, $n, 0);
        $tin = array_fill(0, $n, 0);
        $tout = array_fill(0, $n, 0);

        $timer = 0;
        $stack = [[0, 0, 0]]; // [node, parent, state], state 0 = enter, 1 = exit
        $parent[0] = 0;

        while (!empty($stack)) {
            $item = array_pop($stack);
            $u = $item[0];
            $p = $item[1];
            $state = $item[2];

            if ($state === 0) {
                $parent[$u] = $p;
                $tin[$u] = $timer++;

                $stack[] = [$u, $p, 1];

                foreach ($adj[$u] as $v) {
                    if ($v === $p) continue;
                    $depth[$v] = $depth[$u] + 1;
                    $parent[$v] = $u;
                    $stack[] = [$v, $u, 0];
                }
            } else {
                $tout[$u] = $timer - 1;
            }
        }

        // Binary lifting table for LCA.
        $LOG = 1;
        while ((1 << $LOG) <= $n) {
            $LOG++;
        }

        $up = array_fill(0, $LOG, array_fill(0, $n, 0));
        for ($i = 0; $i < $n; $i++) {
            $up[0][$i] = $parent[$i];
        }

        for ($k = 1; $k < $LOG; $k++) {
            for ($i = 0; $i < $n; $i++) {
                $up[$k][$i] = $up[$k - 1][$up[$k - 1][$i]];
            }
        }

        // Character masks.
        $mask = array_fill(0, $n, 0);
        for ($i = 0; $i < $n; $i++) {
            $mask[$i] = 1 << (ord($s[$i]) - 97);
        }

        /*
         * Fenwick tree for range XOR update and point query.
         *
         * If a node u changes by delta, every root-to-x prefix XOR changes
         * exactly when x is in the subtree of u. So we XOR delta over
         * [tin[u], tout[u]].
         */
        $N = $n + 1;
        $bit = array_fill(0, $N + 1, 0);

        $add = function($i, $val) use (&$bit, $N) {
            while ($i <= $N) {
                $bit[$i] ^= $val;
                $i += $i & -$i;
            }
        };

        $rangeXor = function($l, $r, $val) use ($add) {
            if ($val === 0) return;
            $add($l + 1, $val);
            $add($r + 2, $val);
        };

        $pointQuery = function($idx0) use (&$bit) {
            $i = $idx0 + 1;
            $res = 0;

            while ($i > 0) {
                $res ^= $bit[$i];
                $i -= $i & -$i;
            }

            return $res;
        };

        // Initialize prefix XORs by applying each node's initial mask
        // to its whole subtree.
        for ($i = 0; $i < $n; $i++) {
            $rangeXor($tin[$i], $tout[$i], $mask[$i]);
        }

        // LCA query.
        $lca = function($a, $b) use (&$up, $depth, $LOG) {
            if ($depth[$a] < $depth[$b]) {
                $tmp = $a;
                $a = $b;
                $b = $tmp;
            }

            $diff = $depth[$a] - $depth[$b];

            for ($k = 0; $k < $LOG; $k++) {
                if ($diff & (1 << $k)) {
                    $a = $up[$k][$a];
                }
            }

            if ($a === $b) {
                return $a;
            }

            for ($k = $LOG - 1; $k >= 0; $k--) {
                if ($up[$k][$a] !== $up[$k][$b]) {
                    $a = $up[$k][$a];
                    $b = $up[$k][$b];
                }
            }

            return $up[0][$a];
        };

        $answer = [];

        foreach ($queries as $query) {
            $parts = explode(' ', $query);

            if ($parts[0] === 'update') {
                $u = (int)$parts[1];
                $newMask = 1 << (ord($parts[2]) - 97);

                $delta = $mask[$u] ^ $newMask;

                if ($delta !== 0) {
                    $rangeXor($tin[$u], $tout[$u], $delta);
                    $mask[$u] = $newMask;
                }
            } else {
                $u = (int)$parts[1];
                $v = (int)$parts[2];

                $w = $lca($u, $v);

                // XOR parity mask on path u -> v.
                $pathMask = $pointQuery($tin[$u])
                    ^ $pointQuery($tin[$v])
                    ^ $mask[$w];

                // Palindrome possible iff at most one bit is set.
                $answer[] = (($pathMask & ($pathMask - 1)) === 0);
            }
        }

        return $answer;
    }
}
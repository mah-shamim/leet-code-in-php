<?php

class Solution {

    /**
     * @param Integer[] $parent
     * @param String $s
     * @return Integer[]
     */
    function findSubtreeSizes(array $parent, string $s): array
    {
        $n = count($parent);

        // Build the original tree.
        $children = array_fill(0, $n, []);
        for ($i = 1; $i < $n; $i++) {
            $children[$parent[$i]][] = $i;
        }

        $newParent = $parent;
        $last = array_fill(0, 26, -1);
        $order = [];

        // Iterative DFS.
        // Stack item: [node, state, oldLast]
        // state 0 = enter, state 1 = exit
        $stack = [[0, 0, 0]];

        while (!empty($stack)) {
            $item = array_pop($stack);
            $u = $item[0];
            $state = $item[1];
            $old = $item[2];

            $c = ord($s[$u]) - ord('a');

            if ($state == 0) {
                $order[] = $u;

                // Closest ancestor with the same character.
                $old = $last[$c];
                if ($u != 0 && $old != -1) {
                    $newParent[$u] = $old;
                }

                $last[$c] = $u;

                // Exit event.
                $stack[] = [$u, 1, $old];

                // Push children.
                for ($j = count($children[$u]) - 1; $j >= 0; $j--) {
                    $stack[] = [$children[$u][$j], 0, 0];
                }
            } else {
                // Restore the latest node for this character.
                $last[$c] = $old;
            }
        }

        // Compute subtree sizes in the final tree.
        $answer = array_fill(0, $n, 1);

        for ($i = $n - 1; $i >= 0; $i--) {
            $u = $order[$i];
            $p = $newParent[$u];

            if ($p != -1) {
                $answer[$p] += $answer[$u];
            }
        }

        return $answer;
    }
}
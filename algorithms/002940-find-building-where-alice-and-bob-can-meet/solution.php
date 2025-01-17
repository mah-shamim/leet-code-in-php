<?php

class Solution {

    /**
     * @param Integer[] $heights
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function leftmostBuildingQueries($heights, $queries) {
        $ans = array_fill(0, count($queries), -1);
        $stack = []; // Monotonic stack

        // Iterate through queries and heights simultaneously.
        $heightsIndex = count($heights) - 1;

        foreach ($this->getIndexedQueries($queries) as $indexedQuery) {
            $queryIndex = $indexedQuery->queryIndex;
            $a = $indexedQuery->a;
            $b = $indexedQuery->b;

            if ($a == $b || $heights[$a] < $heights[$b]) {
                // 1. Alice and Bob are already in the same index (a == b) or
                // 2. Alice can jump from a -> b (heights[a] < heights[b]).
                $ans[$queryIndex] = $b;
            } else {
                // Now, a < b and heights[a] >= heights[b].
                // Gradually add heights with an index > b to the monotonic stack.
                while ($heightsIndex > $b) {
                    // heights[heightsIndex] is a better candidate.
                    while (!empty($stack) && $heights[end($stack)] <= $heights[$heightsIndex]) {
                        array_pop($stack);
                    }
                    $stack[] = $heightsIndex--;
                }

                // Binary search to find the smallest index j such that j > b and
                // heights[j] > heights[a], ensuring heights[j] > heights[b].
                $it = $this->findUpperBound($stack, $a, $heights);
                if ($it !== null) {
                    $ans[$queryIndex] = $it;
                }
            }
        }

        return $ans;
    }

    /**
     * @param $queries
     * @return array
     */
    private function getIndexedQueries($queries) {
        $indexedQueries = [];
        foreach ($queries as $i => $query) {
            // Make sure that a <= b.
            $a = min($query[0], $query[1]);
            $b = max($query[0], $query[1]);
            $indexedQueries[] = new IndexedQuery($i, $a, $b);
        }

        // Sort queries in descending order of b.
        usort($indexedQueries, function ($a, $b) {
            return $b->b - $a->b;
        });

        return $indexedQueries;
    }

    /**
     * @param $stack
     * @param $a
     * @param $heights
     * @return mixed|null
     */
    private function findUpperBound($stack, $a, $heights) {
        foreach (array_reverse($stack) as $index) {
            if ($heights[$index] > $heights[$a]) {
                return $index;
            }
        }
        return null;
    }
}

class IndexedQuery {
    public $queryIndex;
    public $a; // Alice's index
    public $b; // Bob's index

    /**
     * @param $queryIndex
     * @param $a
     * @param $b
     */
    public function __construct($queryIndex, $a, $b) {
        $this->queryIndex = $queryIndex;
        $this->a = $a;
        $this->b = $b;
    }
}
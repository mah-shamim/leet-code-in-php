<?php

class Solution {

    /**
     * @param Integer[][] $items
     * @param Integer[] $queries
     * @return Integer[]
     */
    function maximumBeauty($items, $queries) {
        // Sort items by price first, and if price is the same, by beauty descending
        usort($items, function($a, $b) {
            return $a[0] == $b[0] ? $b[1] - $a[1] : $a[0] - $b[0];
        });

        // Pair queries with their original indices
        $indexedQueries = [];
        foreach ($queries as $index => $query) {
            $indexedQueries[] = [$query, $index];
        }
        // Sort queries by price
        usort($indexedQueries, function($a, $b) {
            return $a[0] - $b[0];
        });

        $maxBeauty = 0;
        $itemIndex = 0;
        $answer = array_fill(0, count($queries), 0);

        // Process each query
        foreach ($indexedQueries as $query) {
            list($queryPrice, $queryIndex) = $query;

            // Move the item pointer to include all items with price <= queryPrice
            while ($itemIndex < count($items) && $items[$itemIndex][0] <= $queryPrice) {
                $maxBeauty = max($maxBeauty, $items[$itemIndex][1]);
                $itemIndex++;
            }

            // Set the result for this query's original index
            $answer[$queryIndex] = $maxBeauty;
        }

        return $answer;
    }
}
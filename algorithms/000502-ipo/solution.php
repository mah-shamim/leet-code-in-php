<?php

class Solution {

    /**
     * @param Integer $k
     * @param Integer $w
     * @param Integer[] $profits
     * @param Integer[] $capital
     * @return Integer
     */
    function findMaximizedCapital($k, $w, $profits, $capital) {
        $n = count($capital); // Number of projects

        // Create a min-heap (priority queue) to keep track of projects based on required capital
        $minCapitalHeap = new SplMinHeap();

        // Populate the min-heap with project information - each item is an array where
        // the first element is the capital required and the second element is the profit.
        for ($i = 0; $i < $n; ++$i) {
            $minCapitalHeap->insert([$capital[$i], $profits[$i]]);
        }

        // Create a max-heap (priority queue) to keep track of profitable projects that we can afford
        $maxProfitHeap = new SplMaxHeap();

        // Iterate k times, which represents the maximum number of projects we can select
        while ($k-- > 0) {

            // Move all the projects that we can afford (w >= required capital) to the max profit heap
            while (!$minCapitalHeap->isEmpty() && $minCapitalHeap->top()[0] <= $w) {
                $maxProfitHeap->insert($minCapitalHeap->extract()[1]);
            }

            // If the max profit heap is empty, it means there are no projects we can afford, so we break
            if ($maxProfitHeap->isEmpty()) {
                break;
            }

            // Otherwise, take the most profitable project from the max profit heap and add its profit to our total capital
            $w += $maxProfitHeap->extract();
        }

        return $w; // Return the maximized capital after picking up to k projects
    }
}
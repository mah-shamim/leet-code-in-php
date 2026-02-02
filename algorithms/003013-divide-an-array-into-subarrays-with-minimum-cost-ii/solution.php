<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer $dist
     * @return Integer
     */
    function minimumCost(array $nums, int $k, int $dist): int
    {
        $n = count($nums);
        $windowSum = 0;

        // Two multisets implemented as SplMinHeaps with manual tracking
        $selected = new SplMinHeap();  // Will store negatives to simulate max heap
        $candidates = new SplMinHeap();

        // Maps to track counts for deletion
        $selectedCounts = [];
        $candidatesCounts = [];
        $selectedSize = 0;

        // Helper function to add to a "multiset"
        $addToMultiset = function($value, &$heap, &$counts) {
            $heap->insert($value);
            $counts[$value] = ($counts[$value] ?? 0) + 1;
        };

        // Helper function to remove from a "multiset"
        $removeFromMultiset = function($value, &$counts) {
            $counts[$value]--;
            if ($counts[$value] == 0) {
                unset($counts[$value]);
            }
        };

        // Helper to get max from selected (which is actually min of negative values)
        $getSelectedMax = function() use (&$selected, &$selectedCounts) {
            while (!$selected->isEmpty()) {
                $val = $selected->top();
                if (($selectedCounts[$val] ?? 0) > 0) {
                    return -$val;
                }
                $selected->extract();
            }
            return null;
        };

        // Initialize with first window [1, dist+1]
        for ($i = 1; $i <= min($dist + 1, $n - 1); $i++) {
            $windowSum += $nums[$i];
            // Store negative values in selected to simulate max heap
            $addToMultiset(-$nums[$i], $selected, $selectedCounts);
            $selectedSize++;
        }

        // Balance to keep only k-1 smallest elements in selected
        while ($selectedSize > $k - 1) {
            $maxVal = $getSelectedMax();
            if ($maxVal === null) break;

            // Remove from selected
            $selected->extract();
            $removeFromMultiset(-$maxVal, $selectedCounts);
            $selectedSize--;
            $windowSum -= $maxVal;

            // Add to candidates
            $addToMultiset($maxVal, $candidates, $candidatesCounts);
        }

        $minWindowSum = $windowSum;

        // Slide the window
        for ($i = $dist + 2; $i < $n; $i++) {
            $outOfScope = $nums[$i - $dist - 1];

            // Remove outOfScope element
            if (($selectedCounts[-$outOfScope] ?? 0) > 0) {
                $windowSum -= $outOfScope;
                $selectedSize--;
                $removeFromMultiset(-$outOfScope, $selectedCounts);
            } else {
                $removeFromMultiset($outOfScope, $candidatesCounts);
            }

            // Add new element
            $maxSelected = $getSelectedMax();
            if ($maxSelected === null || $nums[$i] < $maxSelected) {
                $windowSum += $nums[$i];
                $selectedSize++;
                $addToMultiset(-$nums[$i], $selected, $selectedCounts);
            } else {
                $addToMultiset($nums[$i], $candidates, $candidatesCounts);
            }

            // Balance the multisets
            // Clean up selected heap
            while (!$selected->isEmpty() && ($selectedCounts[$selected->top()] ?? 0) == 0) {
                $selected->extract();
            }

            // Clean up candidates heap
            while (!$candidates->isEmpty() && ($candidatesCounts[$candidates->top()] ?? 0) == 0) {
                $candidates->extract();
            }

            // Ensure selected has exactly k-1 elements
            while ($selectedSize < $k - 1 && !$candidates->isEmpty()) {
                $minCandidate = $candidates->top();
                while (!$candidates->isEmpty() && ($candidatesCounts[$candidates->top()] ?? 0) == 0) {
                    $candidates->extract();
                    $minCandidate = $candidates->isEmpty() ? null : $candidates->top();
                }

                if ($minCandidate === null) break;

                $candidates->extract();
                $removeFromMultiset($minCandidate, $candidatesCounts);

                $windowSum += $minCandidate;
                $selectedSize++;
                $addToMultiset(-$minCandidate, $selected, $selectedCounts);
            }

            while ($selectedSize > $k - 1) {
                $maxSelected = $getSelectedMax();
                if ($maxSelected === null) break;

                $selected->extract();
                $removeFromMultiset(-$maxSelected, $selectedCounts);
                $selectedSize--;
                $windowSum -= $maxSelected;

                $addToMultiset($maxSelected, $candidates, $candidatesCounts);
            }

            $minWindowSum = min($minWindowSum, $windowSum);
        }

        return $nums[0] + $minWindowSum;
    }
}
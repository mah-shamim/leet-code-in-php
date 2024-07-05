<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */


class Solution {

    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function nodesBetweenCriticalPoints($head) {
        $result = [-1, -1];

        // Initialize minimum distance to the maximum possible value
        $minDistance = PHP_INT_MAX;

        // Pointers to track the previous node, current node, and indices
        $previousNode = $head;
        $currentNode = $head->next;
        $currentIndex = 1;
        $previousCriticalIndex = 0;
        $firstCriticalIndex = 0;

        while ($currentNode->next != null) {
            // Check if the current node is a local maxima or minima
            if (($currentNode->val < $previousNode->val &&
                    $currentNode->val < $currentNode->next->val) ||
                ($currentNode->val > $previousNode->val &&
                    $currentNode->val > $currentNode->next->val)) {
                // If this is the first critical point found
                if ($previousCriticalIndex == 0) {
                    $previousCriticalIndex = $currentIndex;
                    $firstCriticalIndex = $currentIndex;
                } else {
                    // Calculate the minimum distance between critical points
                    $minDistance = min($minDistance, $currentIndex - $previousCriticalIndex);
                    $previousCriticalIndex = $currentIndex;
                }
            }

            // Move to the next node and update indices
            $currentIndex++;
            $previousNode = $currentNode;
            $currentNode = $currentNode->next;
        }

        // If at least two critical points were found
        if ($minDistance != PHP_INT_MAX) {
            $maxDistance = $previousCriticalIndex - $firstCriticalIndex;
            $result = [$minDistance, $maxDistance];
        }

        return $result;
    }
}
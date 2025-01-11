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
     * @param Integer[] $nums
     * @param ListNode $head
     * @return ListNode
     */
    function modifiedList($nums, $head) {
        // Convert nums array to a hash set for O(1) lookups
        $numSet = array_flip($nums);

        // Create a dummy node to handle edge cases (e.g. removing the head)
        $dummy = new ListNode(0);
        $dummy->next = $head;

        // Initialize pointers
        $prev = $dummy;
        $current = $head;

        // Traverse the linked list
        while ($current !== null) {
            // If the current node's value exists in numSet, remove it
            if (isset($numSet[$current->val])) {
                $prev->next = $current->next; // Skip the current node
            } else {
                $prev = $current; // Move prev pointer forward
            }
            $current = $current->next; // Move current pointer forward
        }

        // Return the modified list starting from the dummy's next node
        return $dummy->next;
    }
}
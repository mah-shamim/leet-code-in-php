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
     * @return ListNode
     */
    function deleteMiddle(ListNode $head): ?ListNode
    {
        // If there's only one node, return null
        if ($head->next == null) {
            return null;
        }

        $slow = $head;
        $fast = $head;
        $prev = null;

        // Move fast twice as fast as slow
        while ($fast !== null && $fast->next !== null) {
            $prev = $slow;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        // $slow is the middle node, $prev is the node before it
        $prev->next = $slow->next;

        return $head;
    }
}
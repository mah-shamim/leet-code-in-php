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
    function mergeNodes($head) {
        $dummy = new ListNode(0);
        $current = $dummy;
        $sum = 0;

        // Skip the first zero node
        $head = $head->next;

        while ($head !== null) {
            if ($head->val == 0) {
                $current->next = new ListNode($sum);
                $current = $current->next;
                $sum = 0;
            } else {
                $sum += $head->val;
            }
            $head = $head->next;
        }

        return $dummy->next;
    }
}
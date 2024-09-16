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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $stack1 = [];
        $stack2 = [];

        // Push all elements of l1 to stack1
        while ($l1 !== null) {
            array_push($stack1, $l1->val);
            $l1 = $l1->next;
        }

        // Push all elements of l2 to stack2
        while ($l2 !== null) {
            array_push($stack2, $l2->val);
            $l2 = $l2->next;
        }

        $carry = 0;
        $head = null;

        // While there are elements in stack1 or stack2 or there's a carry
        while (!empty($stack1) || !empty($stack2) || $carry > 0) {
            $sum = $carry;

            if (!empty($stack1)) {
                $sum += array_pop($stack1);
            }

            if (!empty($stack2)) {
                $sum += array_pop($stack2);
            }

            $carry = intdiv($sum, 10);
            $newNode = new ListNode($sum % 10);
            $newNode->next = $head;
            $head = $newNode;
        }

        return $head;

    }
}
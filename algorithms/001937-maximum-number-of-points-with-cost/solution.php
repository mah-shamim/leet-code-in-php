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
class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $dummyHead = new ListNode(0);
        $p = $l1;
        $q = $l2;
        $curr = $dummyHead;
        $carry = 0;

        while ($p !== null || $q !== null) {
            $x = ($p !== null) ? $p->val : 0;
            $y = ($q !== null) ? $q->val : 0;
            $sum = $carry + $x + $y;
            $carry = (int)($sum / 10);

            $curr->next = new ListNode($sum % 10);
            $curr = $curr->next;

            if ($p !== null) {
                $p = $p->next;
            }
            if ($q !== null) {
                $q = $q->next;
            }
        }

        if ($carry > 0) {
            $curr->next = new ListNode($carry);
        }

        return $dummyHead->next;
    }
}
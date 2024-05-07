<?php

/**
 * Definition for a singly-linked list.
 */

class ListNode
{
    public mixed $val = 0;
    public mixed $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function doubleIt(ListNode $head): ListNode
    {
        if ($head->val >= 5)
            $head = new ListNode(0, $head);

        for ($curr = $head; $curr != null; $curr = $curr->next) {
            $curr->val *= 2;
            $curr->val %= 10;
            if ($curr->next && $curr->next->val >= 5)
                ++$curr->val;
        }

        return $head;
    }
}
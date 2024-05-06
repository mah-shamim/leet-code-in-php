<?php

/**
 * Definition for a singly-linked list.
 */
class ListNode
{
    public $val = 0;
    public $next = null;

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
     * @return ListNode|null
     */
    function removeNodes(ListNode $head): ?ListNode
    {
        if ($head == null) {
            return null;
        }
        $head->next = $this->removeNodes($head->next);
        return $head->next != null && $head->val < $head->next->val ? $head->next : $head;
    }
}
<?php

/**
 * Definition for a singly-linked list.
 *
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution
{
    /**
     * @param ListNode $node
     * @return void
     */
    function deleteNode(ListNode $node): void
    {
        // Step 1: Copy the value from the next node into the current node
        $node->val = $node->next->val;

        // Step 2: Point the current node's next to the next node's next
        $node->next = $node->next->next;
    }
}
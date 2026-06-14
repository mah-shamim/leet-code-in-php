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
     * @return Integer
     */
    function pairSum(ListNode $head): int
    {
        // Step 1: Find middle of the list
        $slow = $head;
        $fast = $head;
        while ($fast !== null && $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        // $slow now points to the start of the second half

        // Step 2: Reverse the second half
        $prev = null;
        $curr = $slow;
        while ($curr !== null) {
            $nextTemp = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $nextTemp;
        }
        // $prev is the head of the reversed second half

        // Step 3: Traverse both halves
        $first = $head;
        $second = $prev;
        $maxSum = 0;
        while ($second !== null) {
            $sum = $first->val + $second->val;
            if ($sum > $maxSum) {
                $maxSum = $sum;
            }
            $first = $first->next;
            $second = $second->next;
        }

        return $maxSum;
    }
}
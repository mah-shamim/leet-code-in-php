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
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        // Edge cases: empty list, single node, or k == 0
        if ($head === null || $head->next === null || $k === 0) {
            return $head;
        }

        // Step 1: Find length and tail
        $length = 1;
        $tail = $head;
        while ($tail->next !== null) {
            $tail = $tail->next;
            $length++;
        }

        // Step 2: Reduce k
        $k = $k % $length;
        if ($k === 0) {
            return $head;
        }

        // Step 3: Find new tail and new head
        $newTailPos = $length - $k - 1;
        $newTail = $head;
        for ($i = 0; $i < $newTailPos; $i++) {
            $newTail = $newTail->next;
        }
        $newHead = $newTail->next;

        // Step 4: Rotate
        $tail->next = $head;   // Close the circle
        $newTail->next = null; // Break the circle

        return $newHead;
    }
}
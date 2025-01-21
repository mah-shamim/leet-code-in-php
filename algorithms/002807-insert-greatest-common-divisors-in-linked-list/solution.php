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
    function insertGreatestCommonDivisors($head) {
        // Edge case: If the list has only one node, return the list as is.
        if ($head == null || $head->next == null) {
            return $head;
        }

        // Start traversing the linked list from the head node.
        $current = $head;

        while ($current != null && $current->next != null) {
            // Calculate GCD of current node's value and the next node's value.
            $gcdValue = $this->gcd($current->val, $current->next->val);

            // Create a new node with the GCD value.
            $gcdNode = new ListNode($gcdValue);

            // Insert the GCD node between current and next node.
            $gcdNode->next = $current->next;
            $current->next = $gcdNode;

            // Move to the node after the newly inserted GCD node.
            $current = $gcdNode->next;
        }

        // Return the modified head of the linked list.
        return $head;

    }

    /**
     * Function to calculate the GCD of two numbers.
     *
     * @param $a
     * @param $b
     * @return mixed
     */
    function gcd($a, $b) {
        if ($b == 0) {
            return $a;
        }
        return self::gcd($b, $a % $b);
    }

}
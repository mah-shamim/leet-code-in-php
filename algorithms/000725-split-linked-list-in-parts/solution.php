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
     * @return ListNode[]
     */
    function splitListToParts($head, $k) {
        $length = 0;
        $current = $head;

        // Calculate the total length of the linked list
        while ($current !== null) {
            $length++;
            $current = $current->next;
        }

        // Determine the size of each part
        $part_size = intval($length / $k);
        $extra_nodes = $length % $k;

        // Prepare result array
        $result = array_fill(0, $k, null);

        $current = $head;
        for ($i = 0; $i < $k && $current !== null; $i++) {
            $result[$i] = $current; // Start of the ith part
            $current_size = $part_size + ($extra_nodes > 0 ? 1 : 0);
            $extra_nodes--;

            // Move to the end of the current part
            for ($j = 1; $j < $current_size; $j++) {
                $current = $current->next;
            }

            // Break the current part from the rest of the list
            $next = $current->next;
            $current->next = null;
            $current = $next;
        }

        return $result;
    }
}
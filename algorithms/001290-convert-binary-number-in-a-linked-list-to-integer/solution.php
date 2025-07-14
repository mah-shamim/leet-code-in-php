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
    function getDecimalValue($head) {
        $num = 0;
        $current = $head;
        while ($current !== null) {
            $num = ($num << 1) | $current->val;
            $current = $current->next;
        }
        return $num;
    }
}
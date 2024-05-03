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
    function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $s1 = new SplStack();
        $s2 = new SplStack();
        while($l1 != null){
            $s1->push($l1->val);
            $l1 = $l1->next;
        }

        while($l2 != null){
            $s2->push($l2->val);
            $l2 = $l2->next;
        }

        $sum = 0;
        $cur = new ListNode();
        while(!$s1->isEmpty() || !$s2->isEmpty()){
            if(!$s1->isEmpty()) $sum += $s1->pop();
            if(!$s2->isEmpty()) $sum += $s2->pop();

            $cur->val = $sum%10;
            $head = new ListNode(floor($sum/10));
            $head->next = $cur; // reconstruct
            $cur = $head;// moving on
            $sum /= 10;
        }
        if($cur->val >= 1 ){
            $return_value =  0? $cur->next: $cur;   
        }else{
            $return_value = $cur->next;
        }
        return ($return_value);
        //return $cur->val == 0? $cur->next: $cur;
    }
}
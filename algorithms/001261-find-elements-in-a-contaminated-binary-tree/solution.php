<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class FindElements {
    private $values;
    /**
     * @param TreeNode $root
     */
    function __construct($root) {
        $this->values = array();
        if ($root === null) {
            return;
        }
        $queue = new SplQueue();
        $root->val = 0;
        $this->values[$root->val] = true;
        $queue->enqueue($root);

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            $x = $node->val;

            if ($node->left !== null) {
                $leftVal = 2 * $x + 1;
                $node->left->val = $leftVal;
                $this->values[$leftVal] = true;
                $queue->enqueue($node->left);
            }
            if ($node->right !== null) {
                $rightVal = 2 * $x + 2;
                $node->right->val = $rightVal;
                $this->values[$rightVal] = true;
                $queue->enqueue($node->right);
            }
        }
    }

    /**
     * @param Integer $target
     * @return Boolean
     */
    function find($target) {
        return isset($this->values[$target]);
    }
}

/**
 * Your FindElements object will be instantiated and called as such:
 * $obj = FindElements($root);
 * $ret_1 = $obj->find($target);
 */
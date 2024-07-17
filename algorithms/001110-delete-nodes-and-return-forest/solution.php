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
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer[] $to_delete
     * @return TreeNode[]
     */
    function delNodes($root, $to_delete) {
        $to_delete_set = array_flip($to_delete);
        $forest = [];

        $root = $this->helper($root, $forest, $to_delete_set);
        if ($root !== null) {
            $forest[] = $root;
        }

        return $forest;
    }

    /**
     * @param $node
     * @param $forest
     * @param $to_delete_set
     * @return mixed|null
     */
    function helper($node, &$forest, $to_delete_set) {
        if ($node === null) {
            return null;
        }

        $node->left = self::helper($node->left, $forest, $to_delete_set);
        $node->right = self::helper($node->right, $forest, $to_delete_set);

        if (isset($to_delete_set[$node->val])) {
            if ($node->left !== null) {
                $forest[] = $node->left;
            }
            if ($node->right !== null) {
                $forest[] = $node->right;
            }
            return null;
        }
        return $node;
    }
}
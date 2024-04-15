<?php
/**
 * Definition for a binary tree node.
 */

class TreeNode
{
    public mixed $val = null;
    public mixed $left = null;
    public mixed $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{

    /**
     * @param TreeNode $root
     * @return float|int
     */
    function sumNumbers(TreeNode $root): float|int
    {
        return $this->sumNumbersRecu($root, 0);
    }

    function sumNumbersRecu($root, $num)
    {
        if ($root === null) {
            return 0;
        }

        if ($root->left === null && $root->right === null) {
            return $num * 10 + $root->val;
        }

        return $this->sumNumbersRecu($root->left, $num * 10 + $root->val) + $this->sumNumbersRecu($root->right, $num * 10 + $root->val);
    }
}

?>
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
     * @return String
     */
    function smallestFromLeaf(TreeNode $root): string
    {
        $ans = $this->dfs($root, new SplStack(), array());
        sort($ans);
        return $ans[0];
    }

    public function dfs($root, $stack, $ans)
    {
        if ($root == null) return $ans;
        $stack->push($root);
        if ($root->left == null && $root->right == null) {
            $sb = "";
            foreach ($stack as $n) {
                $sb .= chr(97 + $n->val);
            }
            $ans[] = strrev($sb);
        }

        $this->dfs($root->left, $stack, $ans);
        while ($stack->top()->right != $root->right) $stack->pop();
        $this->dfs($root->right, $stack, $ans);
        return $ans;
    }
}
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

class Solution {

    /**
     * @param TreeNode $root
     * @return String
     */
    function smallestFromLeaf(TreeNode $root): string
    {
        $ans = "";
        $this->dfs($root, "", $ans);
        return $ans;
    }

    /**
     * @param $root
     * @param $path
     * @param $ans
     * @return void
     */
    private function dfs($root, $path, &$ans): void
    {
        if ($root == null)
            return;

        $path .= chr($root->val + ord('a'));

        if ($root->left == null && $root->right == null) {
            $path = strrev($path);
            if ($ans == "" || $ans > $path)
                $ans = $path;
            $path = strrev($path);  // Roll back.
        }

        $this->dfs($root->left, $path, $ans);
        $this->dfs($root->right, $path, $ans);
        $path = substr($path, 0, -1);
    }
}
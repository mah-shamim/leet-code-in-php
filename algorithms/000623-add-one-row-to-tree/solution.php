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
     * @param Integer $val
     * @param Integer $depth
     * @return TreeNode
     */
    function addOneRow(TreeNode $root, int $val, int $depth): TreeNode
    {
        return $this->dfs($root, $val, $depth, 1, false);
    }

    function dfs($root, $val, $depth, $curr, $isLeft)
    {
        if ($root == null) {
            if ($depth == 1) {
                $root = new TreeNode($val);
            }
            return $root;
        }

        if ($depth == 1 && $root != null) {
            $newNode = new TreeNode($val);
            $newNode->left = $root;
            $root = $newNode;
            return $newNode;
        }

        if ($curr + 1 == $depth) {
            $newNode = new TreeNode($val);
            $newNode->left = $root->left;
            $root->left = $newNode;

            $newNode1 = new TreeNode($val);
            $newNode1->right = $root->right;
            $root->right = $newNode1;

            return $root;
        }

        $this->dfs($root->left, $val, $depth, $curr + 1, true);
        $this->dfs($root->right, $val, $depth, $curr + 1, false);
        return $root;
    }
}
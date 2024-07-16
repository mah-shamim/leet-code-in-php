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
     * @param Integer $startValue
     * @param Integer $destValue
     * @return String
     */
    function getDirections($root, $startValue, $destValue) {
        $startPath = [];
        $destPath = [];
        $this->findPath($root, $startValue, $startPath);
        $this->findPath($root, $destValue, $destPath);

        // Find the common path length
        $i = 0;
        while ($i < count($startPath) && $i < count($destPath) && $startPath[$i] === $destPath[$i]) {
            $i++;
        }

        // Directions from startValue to LCA
        $upMoves = count($startPath) - $i;
        $downMoves = array_slice($destPath, $i);

        // Combine paths
        return str_repeat('U', $upMoves) . implode('', $downMoves);
    }

    /**
     * @param $root
     * @param $value
     * @param $path
     * @return bool
     */
    function findPath($root, $value, &$path) {
        if ($root === null) {
            return false;
        }
        if ($root->val === $value) {
            return true;
        }
        $path[] = 'L';
        if (self::findPath($root->left, $value, $path)) {
            return true;
        }
        array_pop($path);
        $path[] = 'R';
        if (self::findPath($root->right, $value, $path)) {
            return true;
        }
        array_pop($path);
        return false;
    }
}
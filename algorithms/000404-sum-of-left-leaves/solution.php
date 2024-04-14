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
     * @return Integer
     */
    function sumOfLeftLeaves($root) {
        if (!$root) {
            return 0;
        }

        $ans = 0;

        if ($root->left) {
            if (!$root->left->left && !$root->left->right) {
                $ans += $root->left->val;
            } else {
                $ans += $this->sumOfLeftLeaves($root->left);
            }
        }
        $ans += $this->sumOfLeftLeaves($root->right);

        return $ans;
    }
}
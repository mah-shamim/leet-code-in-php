110\. Balanced Binary Tree

**Difficulty:** Easy

**Topics:** `Tree`, `Depth-First Search`, `Binary Tree`

Given a binary tree, determine if it is height-balanced[^1].

**Example 1:**

![balance_1](https://assets.leetcode.com/uploads/2020/10/06/balance_1.jpg)

- **Input:** root = [3,9,20,null,null,15,7]
- **Output:** true

**Example 2:**

![balance_2](https://assets.leetcode.com/uploads/2020/10/06/balance_2.jpg)

- **Input:** root = [1,2,2,3,3,null,null,4,4]
- **Output:** false

**Example 3:**

- **Input:** root = []
- **Output:** true

**Constraints:**

- The number of nodes in the tree is in the range `[0, 5000]`.
- `-10⁴ <= Node.val <= 10⁴`



**Similar Questions:**
1. [104. Maximum Depth of Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000104-maximum-depth-of-binary-tree)
2. [3319. K-th Largest Perfect Subtree Size in Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003319-k-th-largest-perfect-subtree-size-in-binary-tree)
3. [3340. Check Balanced String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003340-check-balanced-string)


[^1]: **Height-Balanced:** A **height-balanced** binary tree is a binary tree in which the depth of the two subtrees of every node never differs by more than one.



**Solution:**

We need to check if a binary tree is **height-balanced**.
For each node, the left and right subtrees' heights should differ by at most `1`.
We can use a recursive function that returns the height of the tree, but we also need to check the balance condition.

### Approach:

1. We'll create a helper function that returns the height of the tree if it is balanced, and if it's not balanced, we can return a special value (like -1) to indicate imbalance.
2. In the helper function:
   - If the node is null, return 0 (height of empty tree is 0).
   - Recursively get the height of the left and right subtrees.
   - If either the left or right subtree is unbalanced (i.e., returns -1), or if the difference in heights is more than 1, return -1 (unbalanced).
   - Otherwise, return the height (1 + max(leftHeight, rightHeight)).
3. The main function will call the helper and check if the returned value is not -1.

Let's implement this solution in PHP: **[110. Balanced Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000110-balanced-binary-tree/solution.php)**

```php
<?php
/**
 * Definition for a binary tree node.
 * 
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}
 
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root): bool
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $node
     * @return mixed
     */
    private function height($node): mixed
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Test cases
// Example 1 from problem
$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
// Expected: true

// Example 2 from problem
$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(2);
$root->left->left = new TreeNode(3);
$root->left->right = new TreeNode(3);
$root->left->left->left = new TreeNode(4);
$root->left->left->right = new TreeNode(4);
// Expected: false

// Example 3 from problem
$root = new TreeNode();
// Expected: true
?>
```

### Explanation:

This solution uses a **post-order DFS traversal** (bottom-up approach) to determine if the tree is balanced. Here's how it works:

1. **Base Case**: If the node is null, it returns `[true, 0]` meaning an empty tree is balanced with height 0.

2. **Recursive Calls**: For each node, it recursively checks:
   - Left subtree balance status and height
   - Right subtree balance status and height

3. **Balance Check**: A node is balanced if:
   - Both left and right subtrees are balanced
   - The absolute difference between left and right heights ≤ 1

4. **Height Calculation**: The height of current node is `1 + max(leftHeight, rightHeight)`

### Complexity
- **Time Complexity**: O(n) - Each node is visited once
- **Space Complexity**: O(h) - Where h is the height of tree (recursion stack)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
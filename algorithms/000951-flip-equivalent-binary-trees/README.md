951\. Flip Equivalent Binary Trees

**Difficulty:** Medium

**Topics:** `Tree`, `Depth-First Search`, `Binary Tree`

For a binary tree **T**, we can define a **flip operation** as follows: choose any node, and swap the left and right child subtrees.

A binary tree **X** is _flip equivalent_ to a binary tree **Y** if and only if we can make **X** equal to **Y** after some number of flip operations.

Given the roots of two binary trees `root1` and `root2`, return _`true` if the two trees are flip equivalent or `false` otherwise_.

**Example 1:**

![tree_ex](https://assets.leetcode.com/uploads/2018/11/29/tree_ex.png)

- **Input:** root1 = [1,2,3,4,5,6,null,null,null,7,8], root2 = [1,3,2,null,6,4,5,null,null,null,null,8,7]
- **Output:** true
- **Explanation:** We flipped at nodes with values 1, 3, and 5.

**Example 2:**

- **Input:** root1 = [], root2 = []
- **Output:** true


**Example 3:**

- **Input:** root1 = [], root2 = [1]
- **Output:** false


**Constraints:**

- The number of nodes in each tree is in the range `[0, 100]`.
- Each tree will have unique node values in the range `[0, 99]`.


**Solution:**

We can use a recursive depth-first search (DFS). The idea is that two trees are flip equivalent if their root values are the same, and the subtrees are either the same (without any flips) or they become the same after flipping the left and right children at some nodes.

### Plan:
1. **Base Cases:**
   - If both `root1` and `root2` are `null`, they are trivially flip equivalent.
   - If only one of them is `null`, they can't be equivalent.
   - If the root values of `root1` and `root2` are different, they can't be equivalent.

2. **Recursive Case:**
   - Recursively check two possibilities:
      1. The left subtree of `root1` is flip equivalent to the left subtree of `root2`, and the right subtree of `root1` is flip equivalent to the right subtree of `root2` (i.e., no flip).
      2. The left subtree of `root1` is flip equivalent to the right subtree of `root2`, and the right subtree of `root1` is flip equivalent to the left subtree of `root2` (i.e., flip the children).

Let's implement this solution in PHP: **[951. Flip Equivalent Binary Trees](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000951-flip-equivalent-binary-trees/solution.php)**

```php
<?php
// Definition for a binary tree node.
class TreeNode {
    public $val;
    public $left;
    public $right;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

/**
 * @param TreeNode $root1
 * @param TreeNode $root2
 * @return Boolean
 */
function flipEquiv($root1, $root2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$root1 = new TreeNode(1,
    new TreeNode(2, new TreeNode(4), new TreeNode(5, new TreeNode(7), new TreeNode(8))),
    new TreeNode(3, new TreeNode(6), null)
);

$root2 = new TreeNode(1,
    new TreeNode(3, null, new TreeNode(6)),
    new TreeNode(2, new TreeNode(4), new TreeNode(5, new TreeNode(8), new TreeNode(7)))
);

var_dump(flipEquiv($root1, $root2)); // Output: bool(true)
?>
```

### Explanation:

1. **TreeNode Class**: The `TreeNode` class represents a node in the binary tree, with a constructor to initialize the node's value, left child, and right child.

2. **flipEquiv Function**:
   - The base cases handle when both nodes are `null`, when one is `null`, or when the values do not match.
   - The recursive case checks both possibilities (no flip vs. flip), ensuring the subtrees are flip equivalent under either condition.

### Time Complexity:
- The function checks every node in both trees, and each recursive call processes two subtrees. Therefore, the time complexity is O(N), where N is the number of nodes in the tree.

### Space Complexity:
- The space complexity is O(H), where H is the height of the tree, because of the recursive stack. In the worst case (for a skewed tree), this could be O(N).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

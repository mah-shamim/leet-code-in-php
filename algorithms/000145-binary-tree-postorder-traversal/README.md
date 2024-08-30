145\. Binary Tree Postorder Traversal

**Difficulty:** Easy

**Topics:** `Stack`, `Tree`, `Depth-First Search`, `Binary Tree`

Given the `root` of a binary tree, return _the postorder traversal of its nodes' values_.

**Example 1:**

![pre1](https://assets.leetcode.com/uploads/2020/08/28/pre1.jpg)

- **Input:** root = [1,null,2,3]
- **Output:** [3,2,1]

**Example 2:**

- **Input:** root = []
- **Output:** []


**Example 3:**

- **Input:** root = [1]
- **Output:** [1]



**Constraints:**

- The number of the nodes in the tree is in the range `[0, 100]`.
- `-100 <= Node.val <= 100`



**Solution:**

We can use an iterative approach with a stack. Postorder traversal follows the order: Left, Right, Root.


Let's implement this solution in PHP: **[145. Binary Tree Postorder Traversal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000145-binary-tree-postorder-traversal/solution.php)**

```php
<?php
// Definition for a binary tree node.
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}
/**
* @param TreeNode $root
* @return Integer[]
*/
function postorderTraversal($root) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:

// Example 1
$root1 = new TreeNode(1);
$root1->right = new TreeNode(2);
$root1->right->left = new TreeNode(3);
print_r(postorderTraversal($root1)); // Output: [3, 2, 1]

// Example 2
$root2 = null;
print_r(postorderTraversal($root2)); // Output: []

// Example 3
$root3 = new TreeNode(1);
print_r(postorderTraversal($root3)); // Output: [1]
?>
```

### Explanation:

- **TreeNode Class:** The `TreeNode` class defines a node in the binary tree, including its value, left child, and right child.

- **postorderTraversal Function:**
   - We initialize an empty result array and a stack.
   - We use a `while` loop that continues as long as either the stack is not empty or the current node is not null.
   - If the current node is not null, we push it onto the stack and move to its left child.
   - If the current node is null, we check the top node of the stack. If it has a right child that we haven't visited yet, we move to the right child. Otherwise, we add the node's value to the result array and pop it from the stack.

This iterative approach simulates the recursive postorder traversal without using system recursion, making it more memory-efficient.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


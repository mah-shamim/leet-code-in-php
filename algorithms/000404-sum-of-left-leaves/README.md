404\. Sum of Left Leaves

**Difficulty:** Easy

**Topics:** `Tree`, `Depth-First Search`, `Breadth-First Search`, `Binary Tree`

Given the `root` of a binary tree, return _the sum of all left leaves_.

A **leaf** is a node with no children. A **left leaf** is a leaf that is the left child of another node.

**Example 1:**

![leftsum-tree](https://assets.leetcode.com/uploads/2021/04/08/leftsum-tree.jpg)

- **Input:** <code>**root = [3,9,20,null,null,15,7]**</code>
- **Output:** <code>**24**</code>
- **Explanation:** <code>**There are two left leaves in the binary tree, with values 9 and 15 respectively**</code>.

**Example 2:**

- **Input:** <code>**root = [1]**</code>
- **Output:** <code>**0**</code>

**Constraints:**

- The number of nodes in the tree is in the range `[1, 1000]`.
- `-1000 <= Node.val <= 1000`


**Solution:**

We can implement a solution using recursion. Given the constraints and requirements, we will define a function to sum the values of all left leaves in a binary tree.

1. **Define the Binary Tree Node Structure**: Since PHP 5.6 doesn’t support classes with properties as easily, we use arrays to represent the tree nodes.

2. **Recursive Function**: Implement a recursive function to traverse the tree and sum the values of left leaves.

Let's implement this solution in PHP: **[404. Sum of Left Leaves](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000404-sum-of-left-leaves/solution.php)**

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

// Define a tree node as an associative array for simplicity
// ['val' => value, 'left' => left_child, 'right' => right_child]

// Function to compute the sum of left leaves
function sumOfLeftLeaves($root) {
        ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:

// Create the binary tree [3,9,20,null,null,15,7]
$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);

echo sumOfLeftLeaves($root); // Output: 24

// For a single node tree [1]
$root2 = new TreeNode(1);
echo sumOfLeftLeaves($root2); // Output: 0
?>
```

### Explanation:

1. **Tree Node Definition**:
    - The `createNode` function creates a node with a value and optional left and right children.

2. **Sum of Left Leaves Function**:
    - The `sumOfLeftLeaves` function recursively traverses the tree.
    - It checks if the left child exists and if it's a leaf (i.e., it has no children). If so, it adds the value of this leaf to the sum.
    - It then recursively processes the right child to account for any left leaves that might be in the right subtree.

3. **Example Usage**:
    - For the given tree examples, the function calculates the sum of all left leaves correctly.

### Complexity:
- **Time Complexity**: O(n), where n is the number of nodes in the tree, as each node is visited exactly once.
- **Space Complexity**: O(h), where h is the height of the tree, due to recursion stack space.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


2196\. Create Binary Tree From Descriptions

Medium 

You are given a 2D integer array `descriptions` where <code>descriptions[i] = [parent<sub>i</sub>, child<sub>i</sub>, isLeft<sub>i</sub>]</code> indicates that <code>parent<sub>i</sub></code> is the **parent** of <code>child<sub>i</sub></code> in a **binary** tree of **unique** values. Furthermore,

- If <code>isLeft<sub>i</sub> == 1</code>, then <code>child<sub>i</sub></code> is the left child of <code>parent<sub>i</sub></code>.
- If <code>isLeft<sub>i</sub> == 0</code>, then <code>child<sub>i</sub></code> is the right child of <code>parent<sub>i</sub></code>.

Construct the binary tree described by `descriptions` and return _its **root**_.

The test cases will be generated such that the binary tree is **valid**.

**Example 1:**

![example1drawio](https://assets.leetcode.com/uploads/2022/02/09/example1drawio.png)

- **Input:** descriptions = [[20,15,1],[20,17,0],[50,20,1],[50,80,0],[80,19,1]]
- **Output:** [50,20,80,15,17,19]
- **Explanation:** The root node is the node with value 50 since it has no parent.\
  The resulting binary tree is shown in the diagram.

**Example 2:**

![example2drawio](https://assets.leetcode.com/uploads/2022/02/09/example2drawio.png)

- **Input:** descriptions = [[1,2,1],[2,3,0],[3,4,1]]
- **Output:** [1,2,null,null,3,4]
- **Explanation:** The root node is the node with value 1 since it has no parent.\
  The resulting binary tree is shown in the diagram.

**Constraints:**

- <code>1 <= descriptions.length <= 10<sup>4</sup></code>
- <code>descriptions[i].length == 3</code>
- <code>1 <= parent<sub>i</sub>, child<sub>i</sub> <= 10<sup>5</sup></code>
- <code>0 <= isLeft<sub>i</sub> <= 1</code>
- The binary tree described by `descriptions` is valid.


**Hint:**
1. Could you represent and store the descriptions more efficiently?
2. Could you find the root node?
3. The node that is not a child in any of the descriptions is the root node.

**Solution:**


To solve this problem, we can follow these steps:

1. Create a class to represent the tree nodes.
2. Parse the descriptions array to build the tree.
3. Find the root node (the node that is not a child of any other node).
4. Return the root node.

Let's implement this solution in PHP: **[2196. Create Binary Tree From Descriptions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002196-create-binary-tree-from-descriptions/solution.php)**

```php
<?php
// Example usage:
$descriptions1 = [[20,15,1],[20,17,0],[50,20,1],[50,80,0],[80,19,1]];
$descriptions2 = [[1,2,1],[2,3,0],[3,4,1]];

$root1 = createBinaryTree($descriptions1);
$root2 = createBinaryTree($descriptions2);

function printTree($node) {
    if ($node == null) {
        return null;
    }
    $result = [$node->val];
    $result[] = printTree($node->left);
    $result[] = printTree($node->right);
    return $result;
}

print_r(printTree($root1)); // Output: [50, [20, [15], [17]], [80, [19]]]
print_r(printTree($root2)); // Output: [1, [2, null, [3, [4]]]]

?>
```

This code defines a TreeNode class to represent each node in the binary tree. The createBinaryTree function constructs the tree based on the descriptions provided and finds the root node by identifying the node that is not a child of any other node. The printTree function is used to print the tree structure for verification.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

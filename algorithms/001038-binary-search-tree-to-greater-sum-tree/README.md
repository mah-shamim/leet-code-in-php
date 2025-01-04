1038\. Binary Search Tree to Greater Sum Tree

**Difficulty:** Medium

**Topics:** `Tree`, `Depth-First Search`, `Binary Search Tree`, `Binary Tree`

Given the `root` of a Binary Search Tree (BST), convert it to a Greater Tree such that every key of the original BST is changed to the original key plus the sum of all keys greater than the original key in BST.

As a reminder, _a binary search tree_ is a tree that satisfies these constraints:

- The left subtree of a node contains only nodes with keys **less than** the node's key.
- The right subtree of a node contains only nodes with keys **greater than** the node's key.
- Both the left and right subtrees must also be binary search trees.


**Example 1:**

![tree](https://assets.leetcode.com/uploads/2019/05/02/tree.png)

- **Input:** root = [4,1,6,0,2,5,7,null,null,null,3,null,null,null,8]
- **Output:** [30,36,21,36,35,26,15,null,null,null,33,null,null,null,8]

**Example 2:**

- **Input:** root = [0,null,1]
- **Output:** [1,null,1]

**Constraints:**

- The number of nodes in the tree is in the range `[1, 100]`.
- `0 <= Node.val <= 100`
- All the values in the tree are unique.

Note: This question is the same as 538: https://leetcode.com/problems/convert-bst-to-greater-tree/


**Hint:**
1. What traversal method organizes all nodes in sorted order?


**Solution:**

The problem asks us to convert a Binary Search Tree (BST) into a Greater Sum Tree (GST) where each node’s value is replaced by the sum of its original value and all the values greater than the original value in the BST. This is a variation of a well-known tree problem in which we perform a transformation on a BST.

### Key Points

- **Binary Search Tree (BST):** A tree structure where each node's value is greater than the values of its left child and smaller than the values of its right child.
- **Greater Sum Tree (GST):** A transformation where each node is replaced by the sum of its original value and the values of all nodes greater than it in the BST.

### Approach

To solve this problem, we can leverage **reverse inorder traversal**. In a reverse inorder traversal, we traverse the right subtree first, then the current node, and then the left subtree. This ensures we visit nodes in **descending order** (from largest to smallest).

- The key idea is that in a BST, for any node, all nodes to its right are greater. As we perform the reverse inorder traversal, we accumulate the sum of the nodes we have visited so far and update each node’s value by adding this sum.

### Plan

1. Initialize a variable to store the cumulative sum (`prefix`).
2. Perform a reverse inorder traversal of the tree:
    - Traverse the right subtree.
    - Update the current node’s value by adding the `prefix`.
    - Update the `prefix` to the new value of the current node.
    - Traverse the left subtree.
3. After the traversal, the tree will have been transformed into a Greater Sum Tree.

Let's implement this solution in PHP: **[1038. Binary Search Tree to Greater Sum Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001038-binary-search-tree-to-greater-sum-tree/solution.php)**

```php
<?php
/**
 * @param TreeNode $root
 * @return TreeNode
 */
function bstToGst($root) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$root = [4,1,6,0,2,5,7,null,null,null,3,null,null,null,8];
echo bstToGst($root);  // Output: [30,36,21,36,35,26,15,null,null,null,33,null,null,null,8]

// Example 2
$root = [0,null,1];
echo bstToGst($root);  // Output: [1,null,1]
?>
```

### Explanation:

- **reverseInorder function**: A helper function performs the reverse inorder traversal. The function will process each node in descending order and accumulate the sum.
- As we visit each node, we add the `prefix` (sum of all previously visited nodes) to the current node’s value and update the `prefix`.

### Example Walkthrough

Consider the input BST:
```
         4
       /   \
      1     6
     / \   / \
    0   2 5   7
           \   \
            3   8
```

- Start at the rightmost node (8). The accumulated sum is 0, so the new value of 8 becomes `8 + 0 = 8`. Update `prefix = 8`.
- Move to node 7. The accumulated sum is 8, so the new value of 7 becomes `7 + 8 = 15`. Update `prefix = 15`.
- Continue this process for all nodes in the tree, updating their values and the `prefix` as you move down the tree.

The final Greater Sum Tree looks like this:
```
         30
       /    \
      36     21
     /  \   /  \
    36  35 26  15
           \    \
            33   8
```

### Time Complexity

- **Time Complexity:** The time complexity is **O(N)**, where **N** is the number of nodes in the tree. This is because we visit each node exactly once during the traversal.

- **Space Complexity:** The space complexity is **O(H)**, where **H** is the height of the tree, due to the recursive stack used during the traversal. In the worst case (a skewed tree), **H = N**, so the space complexity could also be **O(N)**.

### Output for Example

For the input `root = [4,1,6,0,2,5,7,null,null,null,3,null,null,null,8]`, the output will be:
```
[30,36,21,36,35,26,15,null,null,null,33,null,null,null,8]
```

For the input `root = [0,null,1]`, the output will be:
```
[1,null,1]
```

The solution involves a reverse inorder traversal of the BST to accumulate the sum of all greater nodes and modify the current node’s value accordingly. This approach ensures an efficient and clean solution, with time complexity proportional to the number of nodes in the tree. The solution is simple, effective, and leverages the properties of a BST to perform the required transformation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

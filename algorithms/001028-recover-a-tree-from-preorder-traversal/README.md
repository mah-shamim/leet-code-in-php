1028\. Recover a Tree From Preorder Traversal

**Difficulty:** Hard

**Topics:** `String`, `Tree`, `Depth-First Search`, `Binary Tree`

We run a preorder depth-first search (DFS) on the root of a binary tree.

At each node in this traversal, we output `D` dashes (where `D` is the depth of this node), then we output the value of this node.  If the depth of a node is `D`, the depth of its immediate child is `D + 1`.  The depth of the `root` node is `0`.

If a node has only one child, that child is guaranteed to be **the left child**.

Given the output `traversal` of this traversal, recover the tree and return _its `root`_.

**Example 1:**

![recover_tree_ex1](https://assets.leetcode.com/uploads/2024/09/10/recover_tree_ex1.png)

- **Input:** traversal = "1-2--3--4-5--6--7"
- **Output:** [1,2,5,3,4,6,7]

**Example 2:**

![recover_tree_ex2](https://assets.leetcode.com/uploads/2024/09/10/recover_tree_ex2.png)

- **Input:** traversal = "1-2--3---4-5--6---7"
- **Output:** [1,2,5,3,null,6,null,4,null,7]


**Example 3:**

![recover_tree_ex3](https://assets.leetcode.com/uploads/2024/09/10/recover_tree_ex3.png)

- **Input:** traversal = "1-401--349---90--88"
- **Output:** [1,401,null,349,88,90]



**Constraints:**

- The number of nodes in the original tree is in the range `[1, 1000]`.
  - <code>1 <= Node.val <= 10<sup>9</sup></code>


**Hint:**
1. Do an iterative depth first search, parsing dashes from the string to inform you how to link the nodes together.



**Solution:**

We need to reconstruct a binary tree from its preorder traversal string where each node's depth is indicated by the number of dashes preceding its value. The challenge is to correctly parse the string and build the tree according to the preorder traversal rules, ensuring that each node with a single child has it as the left child.

### Approach
1. **Parsing the Input String**: The input string is parsed into a list of nodes, where each node is represented by its value and depth. This is done by iterating through the string, counting dashes to determine depth, and then reading the numerical value that follows.
2. **Tree Construction**: Using a stack-based approach, we iteratively build the tree. The stack helps track the current path from the root to the current node. For each node in the parsed list, we find its parent by popping elements from the stack until we reach the parent's depth. The node is then added as the left or right child of the parent, ensuring that left children are prioritized as per the problem constraints.

Let's implement this solution in PHP: **[1028. Recover a Tree From Preorder Traversal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001028-recover-a-tree-from-preorder-traversal/solution.php)**

```php
<?php
/**
 * @param String $traversal
 * @return TreeNode
 */
function recoverFromPreorder($traversal) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $traversal
 * @return array
 */
function parseNodes($traversal) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$traversal1 = "1-2--3--4-5--6--7";
$traversal2 = "1-2--3---4-5--6---7";
$traversal3 = "1-401--349---90--88";

print_r(recoverFromPreorder($traversal1)); //Output: [1,2,5,3,4,6,7]
print_r(recoverFromPreorder($traversal2)); //Output: [1,2,5,3,null,6,null,4,null,7]
print_r(recoverFromPreorder($traversal3)); //Output: [1,401,null,349,88,90]
?>
```

### Explanation:

1. **Parsing the Input String**: The `parseNodes` function converts the input string into a list of tuples, each containing a node's value and its depth. This is done by iterating through the string, counting dashes for depth, and then reading the numerical value.
2. **Tree Construction**: The `recoverFromPreorder` function initializes the root node and uses a stack to keep track of nodes as we build the tree. For each subsequent node, we find its parent by adjusting the stack to the correct depth. The node is then added as the left child if possible, otherwise as the right child. This ensures the tree structure adheres to the preorder traversal and problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
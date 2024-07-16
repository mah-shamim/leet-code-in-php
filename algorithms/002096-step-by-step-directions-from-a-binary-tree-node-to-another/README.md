2096\. Step-By-Step Directions From a Binary Tree Node to Another

Medium 

You are given the `root` of a **binary tree** with `n` nodes. Each node is uniquely assigned a value from `1` to `n`. You are also given an integer `startValue` representing the value of the start node `s`, and a different integer `destValue` representing the value of the destination node `t`.

Find the **shortest path** starting from node `s` and ending at node `t`. Generate step-by-step directions of such path as a string consisting of only the **uppercase** letters `'L'`, `'R'`, and `'U'`. Each letter indicates a specific direction:

- `'L'` means to go from a node to its **left child** node.
- `'R'` means to go from a node to its **right child** node.
- `'U'` means to go from a node to its **parent** node.

Return _the step-by-step directions of the **shortest path** from node s to node t_.

**Example 1:**

![eg1](https://assets.leetcode.com/uploads/2021/11/15/eg1.png)

- **Input:** root = [5,1,2,3,null,6,4], startValue = 3, destValue = 6
- **Output:** "UURL"
- **Explanation:** The shortest path is: 3 → 1 → 5 → 2 → 6.

**Example 2:**

![eg2](https://assets.leetcode.com/uploads/2021/11/15/eg2.png)

- **Input:** root = [2,1], startValue = 2, destValue = 1
- **Output:** "L"
- **Explanation:** The shortest path is: 2 → 1.

**Constraints:**

- The number of nodes in the tree is `n`.
- <code>2 <= n <= 10<sup>5</sup></code>
- `1 <= Node.val <= n`
- All the values in the tree are **unique**.
- `1 <= startValue, destValue <= n`
- `startValue != destValue`


**Hint:**
1. The shortest path between any two nodes in a tree must pass through their Lowest Common Ancestor (LCA). The path will travel upwards from node s to the LCA and then downwards from the LCA to node t.
2. Find the path strings from root → s, and root → t. Can you use these two strings to prepare the final answer?
3. Remove the longest common prefix of the two path strings to get the path LCA → s, and LCA → t. Each step in the path of LCA → s should be reversed as 'U'.

**Solution:**


To solve this problem, we can follow these steps:

1. Find the path from the root to the start node (s) and the destination node (t): This can be done using Depth-First Search (DFS).
2. Find the Lowest Common Ancestor (LCA) of the start and destination nodes: The LCA is the lowest node in the tree that has both s and t as descendants.
3. Construct the path from s to the LCA and from the LCA to t: The path from s to the LCA will be in reverse order and all directions will be 'U'. The path from the LCA to t will be in the natural order.
4. Combine these paths to form the final path: This will give the shortest path from s to t.

Let's implement this solution in PHP: **[2096. Step-By-Step Directions From a Binary Tree Node to Another](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002096-step-by-step-directions-from-a-binary-tree-node-to-another/solution.php)**

```php
<?php
// Example usage:
$root = new TreeNode(5);
$root->left = new TreeNode(1);
$root->right = new TreeNode(2);
$root->left->left = new TreeNode(3);
$root->right->left = new TreeNode(6);
$root->right->right = new TreeNode(4);

$startValue = 3;
$destValue = 6;
echo getDirections($root, $startValue, $destValue); // Outputs: "UURL"

$root2 = new TreeNode(5);
$root2->left = new TreeNode(1);
$root2->right = new TreeNode(2);
$root2->left->left = new TreeNode(3);
$root2->right->left = new TreeNode(6);
$root2->right->right = new TreeNode(4);

$startValue2 = 3;
$destValue2 = 6;
echo getDirections($root2, $startValue2, $destValue2); // Outputs: "L"

?>
```

**Explanation:**

1. **`TreeNode` Class:** A simple class to represent a node in the binary tree.
2. **`findPath` Function:** This function finds the path from the root to the given value and stores the path in the provided array (`$path`). It uses DFS and marks each step with `'L'` for left and `'R'` for right.
3. **`getDirections` Function:** This function uses `findPath` to get the paths from the root to `startValue` and `destValue`. It then finds the common path length (LCA). The number of `'U'` moves is the difference in length between the start path and the common path. The remaining path to the destination node is appended.
4. **Example Usage:** Creates the binary tree as shown in the example, and calls `getDirections` with `startValue` and `destValue`. The result is the string representing the shortest path.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

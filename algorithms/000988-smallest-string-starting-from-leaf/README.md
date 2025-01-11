988\. Smallest String Starting From Leaf

**Difficulty:** Medium

**Topics:** `String`, `Backtracking`, `Tree`, `Depth-First Search`, `Binary Tree`

You are given the `root` of a binary tree where each node has a value in the range `[0, 25]` representing the letters `'a'` to `'z'`.

Return _the **lexicographically smallest** string that starts at a leaf of this tree and ends at the root_.

As a reminder, any shorter prefix of a string is **lexicographically smaller**.

- For example, `"ab"` is lexicographically smaller than `"aba"`.

A leaf of a node is a node that has no children.

**Example 1:**

![](https://assets.leetcode.com/uploads/2019/01/30/tree1.png)

- **Input:** root = [0,1,2,3,4,3,4]
- **Output:** "dba"

**Example 2:**

![](https://assets.leetcode.com/uploads/2019/01/30/tree2.png)
- **Input:** root = [25,1,3,1,3,0,2]
- **Output:** "adz"

**Example 3:**

![](https://assets.leetcode.com/uploads/2019/02/01/tree3.png)
- **Input:** root = [2,2,1,null,1,0,null,0]
- **Output:** "abc"

**Constraints:**

- The number of nodes in the tree is in the range <code>[1, 8500]</code>.
- `0 <= Node.val <= 25`


**Solution:**

This problem is based on finding the lexicographically smallest string that starts at a leaf node and ends at the root in a binary tree. Each node contains a value between 0 and 25, representing the letters 'a' to 'z'. You are required to return the smallest string in lexicographical order formed by the path from any leaf node to the root node.

### **Key Points**

- **Leaf Node**: A node with no children.
- **Lexicographical Order**: The order in which strings are arranged in a dictionary. Shorter strings come first, and among strings of the same length, the one with the smallest first character comes first.
- **Depth-First Search (DFS)**: A traversal algorithm to explore all nodes in the tree, which can help solve this problem by checking all leaf nodes.
- **Backtracking**: Reverting the changes made during the traversal to maintain the correct path.


### **Approach**

To solve this problem, we use **Depth-First Search (DFS)** with a backtracking approach:

1. **DFS Traversal**: We start the traversal from the root and go down to all the leaf nodes.
2. **Path Construction**: As we traverse down the tree, we build a string by appending characters corresponding to the node values.
3. **String Comparison**: When we reach a leaf node, we compare the string formed by the path with the current lexicographically smallest string and update the result if necessary.
4. **Backtracking**: After visiting a node, we remove the last character of the current path to backtrack and explore other paths.


### **Plan**

1. Start from the root node and use DFS to visit all the nodes.
2. As we visit each node, append the corresponding character to the current path.
3. When we reach a leaf node, check if the current path forms a lexicographically smaller string than the previously found smallest string.
4. If so, update the result.
5. Backtrack by removing the last character when returning from a node.
6. Once all leaf nodes are visited, return the lexicographically smallest string.

Let's implement this solution in PHP: **[988. Smallest String Starting From Leaf](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000988-smallest-string-starting-from-leaf/solution.php)**

```php
<?php
/**
 * @param TreeNode $root
 * @return String
 */
function smallestFromLeaf(TreeNode $root): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $root
 * @param $path
 * @param $ans
 * @return void
 */
private function dfs($root, $path, &$ans): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$root = [0,1,2,3,4,3,4];
echo smallestFromLeaf($root);  // Output: "dba"

// Example 2
$root = [25,1,3,1,3,0,2];
echo smallestFromLeaf($root);  // Output: "adz"

// Example 3
$root = [2,2,1,null,1,0,null,0];
echo smallestFromLeaf($root);  // Output: "abc"
?>
```

### Explanation:

1. **DFS Traversal**: We recursively visit the left and right children of the tree.
2. **String Building**: For each node, we convert the node's value to a character (`'a'` + `node.val`), and append it to the current path.
3. **Backtracking**: When backtracking, we undo the change to the path (i.e., remove the last character added).
4. **Leaf Node Check**: If we are at a leaf (no left or right children), we reverse the string (since we need to form the string starting from the leaf to the root) and compare it with the current smallest string found.


### **Example Walkthrough**

#### Example 1:
Tree structure:
```
      0
     / \
    1   2
   / \  / \
  3  4 3   4
```
- Paths: `dba` (leaf 3 → root), `eba`, `dca`, `eca`.
- Lexicographically smallest: `"dba"`.

#### Example 2:
Tree structure:
```
      25
     /  \
    1    3
   / \  / \
  1  3 0   2
```
- Paths: `adz`, `abz`, `acz`, `adz`.
- Lexicographically smallest: `"adz"`.


### **Time Complexity**
- **Traversal**: Each node is visited once → **O(n)**.
- **String Operations**: At each leaf, we reverse a string (O(k), where k is the path length). Total → **O(n)**.
- **Overall**: **O(n)**.

### **Space Complexity**
- Path storage and recursion stack → **O(h)**, where `h` is the height of the tree.

### **Output for Example**

1. For `root = [0,1,2,3,4,3,4]`, the output is `"dba"`.
2. For `root = [25,1,3,1,3,0,2]`, the output is `"adz"`.
3. For `root = [2,2,1,null,1,0,null,0]`, the output is `"abc"`.


This approach uses **Depth-First Search (DFS)** with **backtracking** to explore all paths from leaf nodes to the root while maintaining the lexicographically smallest string. The solution efficiently handles the problem within the constraints and ensures that we find the correct smallest string for each given tree structure.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

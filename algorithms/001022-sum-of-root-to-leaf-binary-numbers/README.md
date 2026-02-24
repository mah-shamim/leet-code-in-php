1022\. Sum of Root To Leaf Binary Numbers

**Difficulty:** Easy

**Topics:** `Staff`, `Tree`, `Depth-First Search`, `Binary Tree`, `Weekly Contest 131`

You are given the `root` of a binary tree where each node has a value `0` or `1`. Each root-to-leaf path represents a binary number starting with the most significant bit.

- For example, if the path is `0 -> 1 -> 1 -> 0 -> 1`, then this could represent `01101` in binary, which is `13`.

For all leaves in the tree, consider the numbers represented by the path from the root to that leaf. Return _the sum of these numbers_.

The test cases are generated so that the answer fits in a **32-bits** integer.

**Example 1:**

![sum-of-root-to-leaf-binary-numbers](https://assets.leetcode.com/uploads/2019/04/04/sum-of-root-to-leaf-binary-numbers.png)

- **Input:** root = [1,0,1,0,1,0,1]
- **Output:** 22
- **Explanation:** (100) + (101) + (110) + (111) = 4 + 5 + 6 + 7 = 22

**Example 2:**

- **Input:** root = [0]
- **Output:** 0 

**Constraints:**

- The number of nodes in the tree is in the range `[1, 1000]`.
- `Node.val` is `0` or `1`.



**Hint:**
1. Find each path, then transform that path to an integer in base 10.






**Solution:**


The problem asks for the sum of all numbers formed by root-to-leaf paths in a binary tree where each node value is a binary digit (0 or 1). The provided solution performs a depth‑first search (DFS) traversal, building the binary number incrementally using bitwise operations. At each leaf, the complete number is added to the total sum.

### Approach:

- Use a recursive DFS function that receives the current node and the binary number formed from the root up to the parent node.
- For each node, update the path value by shifting the previous path left by one bit and OR-ing the current node’s value (`path = (path << 1) | node->val`). This efficiently appends the new digit.
- If the node is a leaf (both children are `null`), return the current path value as the complete number for that path.
- If the node is not a leaf, recursively traverse its left and right subtrees and return the sum of the numbers obtained from both sides.
- Start the recursion from the root with an initial path value of `0`.

Let's implement this solution in PHP: **[1022. Sum of Root To Leaf Binary Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001022-sum-of-root-to-leaf-binary-numbers/solution.php)**

```php
<?php
/**
 * @param TreeNode $root
 * @return Integer
 */
function sumRootToLeaf($root): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Depth‑first search helper.
 *
 * @param TreeNode $node   Current node
 * @param int $path   Binary number formed from root to current node (excluding current)
 * @return int             Sum of all leaf numbers in this subtree
 */
function dfs($node, int $path): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sumRootToLeaf([1,0,1,0,1,0,1]) . "\n";         // Output: 22
echo sumRootToLeaf([0]) . "\n";                     // Output: 0
?>
```

### Explanation:

- **Bit manipulation** is used to avoid converting strings or lists: shifting left (`<< 1`) multiplies the current number by 2, making room for the new least significant bit, which is then set by a bitwise OR (`|`) with the node’s value.
- The recursion naturally follows all root-to-leaf paths because DFS explores each branch completely before backtracking.
- When a leaf is reached, the accumulated number is returned up the call stack. Internal nodes sum the results from their left and right children, so the final result is the total sum of all leaf numbers.
- The algorithm works for the given constraints (up to 1000 nodes) and guarantees a 32‑bit integer result as required.

### Complexity
- **Time Complexity**: _**O(N)**_, where N is the number of nodes. Each node is visited exactly once.
- **Space Complexity**: _**O(H)**_ in the worst case, where _**H**_ is the height of the tree, due to the recursion stack. In the worst case (skewed tree), _**H = N**_, making space _**O(N)**_; in a balanced tree, _**H = O(log N)**_.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
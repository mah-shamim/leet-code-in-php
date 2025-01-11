2415\. Reverse Odd Levels of Binary Tree

**Difficulty:** Medium

**Topics:** `Tree`, `Depth-First Search`, `Breadth-First Search`, `Binary Tree`

Given the `root` of a **perfect** binary tree, reverse the node values at each **odd** level of the tree.

- For example, suppose the node values at level 3 are `[2,1,3,4,7,11,29,18]`, then it should become `[18,29,11,7,4,3,1,2]`.

Return _the root of the reversed tree_.

A binary tree is **perfect** if all parent nodes have two children and all leaves are on the same level.

The **level** of a node is the number of edges along the path between it and the root node.

**Example 1:**

![first_case1](https://assets.leetcode.com/uploads/2022/07/28/first_case1.png)

- **Input:** root = [2,3,5,8,13,21,34]
- **Output:** [2,5,3,8,13,21,34]
- **Explanation:**
  The tree has only one odd level.
  The nodes at level 1 are 3, 5 respectively, which are reversed and become 5, 3.

**Example 2:**

![second_case3](https://assets.leetcode.com/uploads/2022/07/28/second_case3.png)

- **Input:** root = [7,13,11]
- **Output:** [7,11,13]
- **Explanation:**
  The nodes at level 1 are 13, 11, which are reversed and become 11, 13.


**Example 3:**

- **Input:** root = [0,1,2,0,0,0,0,1,1,1,1,2,2,2,2]
- **Output:** [0,2,1,0,0,0,0,2,2,2,2,1,1,1,1]
- **Explanation:**
  The odd levels have non-zero values.
  The nodes at level 1 were 1, 2, and are 2, 1 after the reversal.
  The nodes at level 3 were 1, 1, 1, 1, 2, 2, 2, 2, and are 2, 2, 2, 2, 1, 1, 1, 1 after the reversal.



**Constraints:**

- The number of nodes in the tree is in the range <code>[1, 2<sup>14</sup>]</code>.
- <code>0 <= Node.val <= 10<sup>5</sup></code>
- `root` is a perfect binary tree.


**Hint:**
1. Try to solve recursively for each level independently.
2. While performing a depth-first search, pass the left and right nodes (which should be paired) to the next level. If the current level is odd, then reverse their values, or else recursively move to the next level.



**Solution:**

We need to perform a depth-first traversal on the binary tree. The task is to reverse the node values at odd levels. A perfect binary tree means all non-leaf nodes have two children, and all leaf nodes are at the same level.

We will use a DFS (Depth-First Search) approach, and on each odd level, we will reverse the node values. Below is the solution that accomplishes this.

### Key Points:
- The tree is perfect, meaning it is completely balanced, and all leaf nodes are at the same level.
- Only nodes at odd levels need to be reversed. Odd levels are indexed starting from level 1 (1st, 3rd, 5th, etc.).
- A DFS can be used to traverse the tree and identify the levels of nodes. When we encounter an odd level, we swap the values of the nodes at that level.
- At each level, we traverse two child nodes: the left child and right child.

### Approach:
1. Perform a depth-first traversal of the tree.
2. For each pair of nodes at the current level:
   - If the level is odd, swap the node values.
3. Recursively process the left and right children of the current node, passing the updated level information.
4. Return the root node after processing the entire tree.

### Plan:
1. Start from the root node.
2. Use a recursive function `dfs` to traverse the tree and reverse node values at odd levels.
3. Keep track of the current level to identify odd levels.
4. Swap values at odd levels and continue the DFS traversal for the children.
5. Return the root after processing.

### Solution Steps:
1. Define a recursive function `dfs($left, $right, $isOddLevel)`:
   - `left`: Left child node.
   - `right`: Right child node.
   - `isOddLevel`: Boolean indicating whether the current level is odd.
2. Check if `left` is null. If it is, return, as there are no further nodes to process.
3. If `isOddLevel` is true, swap the values of `left` and `right` nodes.
4. Recursively call the `dfs` function for:
   - Left child of `left` and right child of `right` (next level).
   - Right child of `left` and left child of `right` (next level).
5. Start the recursion with `dfs($root->left, $root->right, true)` and return the root.

Let's implement this solution in PHP: **[2415. Reverse Odd Levels of Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002415-reverse-odd-levels-of-binary-tree/solution.php)**

```php
<?php
class TreeNode {
    public $val = 0;
    public $left = null;
    public $right = null;
    
    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution {
    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    public function reverseOddLevels($root) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Helper function to perform DFS
     *
     * @param $left
     * @param $right
     * @param $isOddLevel
     * @return void
     */
    private function dfs($left, $right, $isOddLevel) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Example usage:
$root = new TreeNode(2);
$root->left = new TreeNode(3);
$root->right = new TreeNode(5);
$root->left->left = new TreeNode(8);
$root->left->right = new TreeNode(13);
$root->right->left = new TreeNode(21);
$root->right->right = new TreeNode(34);

$solution = new Solution();
$reversedRoot = $solution->reverseOddLevels($root);

// Function to print the tree for testing
function printTree($root) {
    if ($root === null) {
        return;
    }
    echo $root->val . " ";
    printTree($root->left);
    printTree($root->right);
}

printTree($reversedRoot); // Output: 2 5 3 8 13 21 34
?>
```

### Explanation:

1. **TreeNode Class**: Represents the structure of a binary tree node, which has a value (`val`), and two children (`left`, `right`).
2. **reverseOddLevels Function**: Initiates the DFS with the left and right child of the root node and starts at level 1 (odd level).
3. **dfs Function**:
   - Takes in two nodes (`left` and `right`) and a boolean `isOddLevel` to determine if the current level is odd.
   - If the current level is odd, the values of `left` and `right` are swapped.
   - Recursively calls itself for the next level, alternating the `isOddLevel` value (`true` becomes `false` and vice versa).
4. The recursion proceeds to process the next pair of nodes at each level, ensuring only nodes at odd levels are reversed.

### Example Walkthrough:

**Example 1:**

Input:
```
       2
      / \
     3   5
    / \ / \
   8 13 21 34
```

- Level 0: `[2]` (even, no change).
- Level 1: `[3, 5]` (odd, reverse to `[5, 3]`).
- Level 2: `[8, 13, 21, 34]` (even, no change).

Output:
```
       2
      / \
     5   3
    / \ / \
   8 13 21 34
```

**Example 2:**

Input:
```
       7
      / \
     13  11
```

- Level 0: `[7]` (even, no change).
- Level 1: `[13, 11]` (odd, reverse to `[11, 13]`).

Output:
```
       7
      / \
     11  13
```

### Time Complexity:
- **Time Complexity**: O(n), where n is the number of nodes in the binary tree. We visit each node exactly once in a depth-first manner.
- **Space Complexity**: O(h), where h is the height of the tree. The recursion depth corresponds to the height of the tree, and in the worst case (for a skewed tree), it would be O(n), but for a perfect binary tree, it's O(log n).

This solution efficiently reverses the nodes at odd levels of a perfect binary tree using depth-first search with a time complexity of O(n). The code swaps values at odd levels and uses a recursive approach to process the tree.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

1161\. Maximum Level Sum of a Binary Tree

**Difficulty:** Medium

**Topics:** `Tree`, `Depth-First Search`, `Breadth-First Search`, `Binary Tree`, `Weekly Contest 150`

Given the `root` of a binary tree, the level of its root is `1`, the level of its children is `2`, and so on.

Return the **smallest** level `x` such that the sum of all the values of nodes at level `x` is **maximal**.

**Example 1:**

![capture](https://assets.leetcode.com/uploads/2019/05/03/capture.JPG)

- **Input:** root = [1,7,0,7,-8,null,null]
- **Output:** 2
- **Explanation:**
  Level 1 sum = 1.
  Level 2 sum = 7 + 0 = 7.
  Level 3 sum = 7 + -8 = -1.
  So we return the level with the maximum sum which is level 2.

**Example 2:**

- **Input:** root = [989,null,10250,98693,-89388,null,null,null,-32127]
- **Output:** 2

**Constraints:**

- The number of nodes in the tree is in the range `[1, 10⁴]`.
- `-10⁵ <= Node.val <= 10⁵`



**Hint:**
1. Calculate the sum for each level then find the level with the maximum sum.
2. How can you traverse the tree ?
3. How can you sum up the values for every level ?
4. Use DFS or BFS to traverse the tree keeping the level of each node, and sum up those values with a map or a frequency array.


**Similar Questions:**
1. [2583. Kth Largest Sum in a Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002583-kth-largest-sum-in-a-binary-tree)
2. [2641. Cousins in Binary Tree II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002641-cousins-in-binary-tree-ii)



   


**Solution:**

We need to find the level in a binary tree that has the maximum sum of node values, and if there are ties, return the smallest level. Let me think through both BFS and DFS approaches.

### Approach:

- **Breadth-First Search (BFS) Level Order Traversal**: We traverse the tree level by level using a queue, which is ideal for this problem since we need to calculate sums for each level
- **Level Tracking**: We maintain a counter for the current level (starting at 1 for the root level)
- **Level Sum Calculation**: For each level:
   - Process all nodes at that level (using the queue size to determine level boundaries)
   - Sum all node values at that level
- **Max Sum Tracking**: Keep track of:
   - The maximum sum encountered so far
   - The level at which this maximum sum occurred
- **Comparison & Update**: When a level's sum exceeds the current maximum sum, update both the maximum sum and the corresponding level
- **Return Smallest Level**: Since we only update when the sum is strictly greater (not equal), we naturally return the smallest level when multiple levels have the same maximum sum

Let's implement this solution in PHP: **[1161. Maximum Level Sum of a Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001161-maximum-level-sum-of-a-binary-tree/solution.php)**

```php
<?php
/**
 * Definition for a binary tree node.
 *
 */
class TreeNode {
    public mixed $val = null;
    public mixed $left = null;
    public mixed $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxLevelSum(TreeNode $root): int
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}


$maxLevelSum = new Solution();
$root = new TreeNode(1);
$root->left = new TreeNode(7);
$root->right = new TreeNode(0);
$root->left->left = new TreeNode(7);
$root->left->right = new TreeNode(-8);
$result = $maxLevelSum->maxLevelSum($root);
echo $result; // Output: 2
?>
```

### Explanation:

1. **Initialization**:
   - Check for null root (though constraints guarantee at least one node)
   - Create a queue and enqueue the root node
   - Initialize `maxSum` to the smallest possible integer and `maxLevel` to 1
   - Set `currentLevel` to 1 to track which level we're processing

2. **Level-by-Level Processing**:
   ```
   While queue is not empty:
     - Get number of nodes at current level (queue size)
     - Initialize levelSum to 0
     - Process all nodes at current level:
       * Dequeue node
       * Add node value to levelSum
       * Enqueue left child if exists
       * Enqueue right child if exists
     - Compare levelSum with maxSum:
       * If levelSum > maxSum, update maxSum and maxLevel
     - Increment currentLevel
   ```

3. **Key Points**:
   - The `for` loop processes exactly the nodes at the current level by using the queue size at the start of the level
   - Children are added to the queue but only processed in the next iteration
   - The comparison uses `>` (not `>=`), which ensures that when multiple levels have the same sum, we keep the smaller level (since we don't update for equal sums)
   - The algorithm has O(n) time complexity (visits each node once) and O(w) space complexity where w is the maximum width of the tree

4. **Example Walkthrough** (Example 1):
   - Level 1: Process node [1] → sum = 1 → maxSum = 1, maxLevel = 1
   - Level 2: Process nodes [7, 0] → sum = 7 → 7 > 1 → maxSum = 7, maxLevel = 2
   - Level 3: Process nodes [7, -8] → sum = -1 → no update
   - Result: Return maxLevel = 2

## Complexity Analysis:

**BFS Approach:**
- **Time Complexity:** O(n) where n is the number of nodes in the tree, as we visit each node exactly once.
- **Space Complexity:** O(w) where w is the maximum width of the tree (for the queue).

**DFS Approach:**
- **Time Complexity:** O(n) where n is the number of nodes in the tree.
- **Space Complexity:** O(h) for the recursion stack where h is the height of the tree, plus O(L) for storing level sums where L is the number of levels.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
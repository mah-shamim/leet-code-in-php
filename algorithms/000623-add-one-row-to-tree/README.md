623\. Add One Row to Tree

**Difficulty:** Medium

**Topics:** `Tree`, `Depth-First Search`, `Breadth-First Search`, `Binary Tree`

Given the `root` of a binary tree and two integers `val` and `depth`, add a row of nodes with value `val` at the given depth `depth`.

Note that the `root` node is at depth `1`.

The adding rule is:

- Given the integer `depth`, for each not null tree node `cur` at the depth `depth - 1`, create two tree nodes with value `val` as `cur`'s left subtree root and right subtree root.
- `cur`'s original left subtree should be the left subtree of the new left subtree root.
- `cur`'s original right subtree should be the right subtree of the new right subtree root.
- If `depth == 1` that means there is no depth `depth - 1` at all, then create a tree node with value `val` as the new root of the whole original tree, and the original tree is the new root's left subtree.


**Example 1:**

![](https://assets.leetcode.com/uploads/2021/03/15/addrow-tree.jpg)

- **Input:** root = [4,2,6,3,1,5], val = 1, depth = 2
- **Output:** [4,1,1,2,null,null,6,3,1,5]

**Example 2:**

![](https://assets.leetcode.com/uploads/2021/03/11/add2-tree.jpg)
- **Input:** root = [4,2,null,3,1], val = 1, depth = 3
- **Output:** [4,2,null,1,1,3,null,null,1]

**Constraints:**

- The number of nodes in the tree is in the range <code>[1, 10<sup>4</sup>]</code>.
- The depth of the tree is in the range <code>[1, 10<sup>4</sup>]</code>.
- `-100 <= Node.val <= 100`
- `-105 <= val <= 105`
- `1 <= depth <= the depth of tree + 1`



**Solution:**

We can use either Breadth-First Search (BFS) or Depth-First Search (DFS) to traverse the tree. The idea is to add the new row at the specified depth.

### Approach:
1. **Edge Case**: If the `depth` is 1, we need to add the new node as the new root of the tree.
2. **DFS or BFS**: Traverse the tree to reach nodes at `depth - 1`, then:
    - Insert new nodes with value `val` as left and right children of each node.
    - The original left child of the node becomes the left child of the newly inserted left node.
    - Similarly, the original right child becomes the right child of the newly inserted right node.

### Steps:
1. If `depth == 1`, create a new root and attach the original tree as the left child of the new root.
2. Otherwise, traverse the tree until the current depth is `depth - 1`.
3. At each node, insert new nodes as described.

Let's implement this solution in PHP: **[623. Add One Row to Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000623-add-one-row-to-tree/solution.php)**

```php
<?php
// Definition for a binary tree node.
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}
/**
 * @param TreeNode $root
 * @param Integer $val
 * @param Integer $depth
 * @return TreeNode
 */
function addOneRow($root, $val, $depth) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Helper function to print the tree in level order for visualization
function printTree($root) {
    $result = [];
    $queue = [$root];
    while (!empty($queue)) {
        $node = array_shift($queue);
        if ($node !== null) {
            $result[] = $node->val;
            $queue[] = $node->left;
            $queue[] = $node->right;
        } else {
            $result[] = null;
        }
    }
    // Remove trailing null values
    while (end($result) === null) {
        array_pop($result);
    }
    return $result;
}

// Test case 1
$root = new TreeNode(4, 
            new TreeNode(2, new TreeNode(3), new TreeNode(1)), 
            new TreeNode(6, new TreeNode(5), null));
$val = 1;
$depth = 2;
$new_tree = addOneRow($root, $val, $depth);
print_r(printTree($new_tree)); // Output should be [4, 1, 1, 2, null, null, 6, 3, 1, 5]

// Test case 2
$root = new TreeNode(4, 
            new TreeNode(2, new TreeNode(3), new TreeNode(1)), 
            null);
$val = 1;
$depth = 3;
$new_tree = addOneRow($root, $val, $depth);
print_r(printTree($new_tree)); // Output should be [4, 2, null, 1, 1, 3, null, null, 1]
?>
```

### Explanation:

1. **Edge case (depth == 1)**: We create a new root node with the value `val` and set the original root as the left child of this new root. This is handled right at the start of the function.

2. **BFS traversal**: We traverse the tree level by level using a queue until we reach nodes at depth `depth - 1`. These are the nodes where we will insert the new row.

3. **Inserting new row**: For each node at `depth - 1`, we create two new nodes with value `val`. The original left child of the node becomes the left child of the new left node, and the original right child becomes the right child of the new right node.

### Time Complexity:
- Traversing the tree requires \(O(n)\) where \(n\) is the number of nodes in the tree.
- Since we perform BFS until depth `depth - 1` and update each node at that depth, the time complexity is linear in the number of nodes: \(O(n)\).

### Test Cases:
1. **Example 1**:
   ```php
   Input: root = [4,2,6,3,1,5], val = 1, depth = 2
   Output: [4,1,1,2,null,null,6,3,1,5]
   ```
2. **Example 2**:
   ```php
   Input: root = [4,2,null,3,1], val = 1, depth = 3
   Output: [4,2,null,1,1,3,null,null,1]
   ```

This solution ensures that the tree is modified correctly according to the problem's rules.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

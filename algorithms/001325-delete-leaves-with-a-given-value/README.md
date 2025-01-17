1325\. Delete Leaves With a Given Value

**Difficulty:** Medium

**Topics:** `Tree`, `Depth-First Search`, `Binary Tree`

Given a binary tree root and an integer target, delete all the leaf nodes with value target.

Note that once you delete a leaf node with value target, if its parent node becomes a leaf node and has the value target, it should also be deleted (you need to continue doing that until you cannot).

**Example 1:**

![sample_1_1684](https://assets.leetcode.com/uploads/2020/01/09/sample_1_1684.png)

- **Input:** root = [1,2,3,2,null,2,4], target = 2
- **Output:** [1,null,3,null,4]
- **Explanation:** Leaf nodes in green with value (target = 2) are removed (Picture in left).\
  After removing, new nodes become leaf nodes with value (target = 2) (Picture in center).

**Example 2:**

![sample_2_1684](https://assets.leetcode.com/uploads/2020/01/09/sample_2_1684.png)

- **Input:** root = [1,3,3,3,2], target = 3
- **Output:** [1,3,null,null,2]

**Example 3:**

![sample_3_1684](https://assets.leetcode.com/uploads/2020/01/15/sample_3_1684.png)

- **Input:** root = [1,2,null,2,null,2], target = 2
- **Output:** [1]
- **Explanation:** Leaf nodes in green with value (target = 2) are removed at each step.

**Constraints:**

- The number of nodes in the tree is in the range `[1, 3000]`.
- `1 <= Node.val, target <= 1000`


**Hint:**
1. Use the DFS to reconstruct the tree such that no leaf node is equal to the target. If the leaf node is equal to the target, return an empty object instead.



**Solution:**

The problem asks us to delete all leaf nodes in a binary tree with a specified value. If, after deleting a leaf node, its parent node becomes a leaf with the same value, we must continue deleting such nodes recursively until no more can be deleted.

### Key Points

- A **leaf node** is a node with no children (both left and right child are `null`).
- The target value is the value of the leaf node we want to delete.
- After deleting a leaf, check if its parent node becomes a leaf with the target value, and if so, delete that too.

### Approach

1. **Recursive DFS (Depth-First Search):**
   We will traverse the tree using a depth-first search. At each node, we check:
  - If the current node is a leaf (both left and right children are `null`) and its value equals the target, we delete it by returning `null`.
  - If the current node is not a leaf or its value does not match the target, we recursively call the function on its left and right children to continue the process.

2. **After recursion:** We also check the parent node after recursively processing its children. If the node becomes a leaf with the target value after its children have been processed, we return `null`.

3. **Base Case:** If the node is `null`, we return `null` because there's nothing to process.

### Plan

1. Start with the root node.
2. Recursively remove leaf nodes with the target value.
3. Check if the parent becomes a leaf node with the target value and remove it.
4. Repeat until no more deletions can be made.
5. Return the modified tree.

Let's implement this solution in PHP: **[1325. Delete Leaves With a Given Value](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001325-delete-leaves-with-a-given-value/solution.php)**

```php
<?php
/**
 * @param TreeNode $root
 * @param Integer $target
 * @return TreeNode
 */
function removeLeafNodes($root, $target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$root = [1,2,3,2,null,2,4];
$target = 2;
echo removeLeafNodes($root, $target) . "\n"; // Output: 17

$root = [1,3,3,3,2];
$target = 3;
echo removeLeafNodes($root, $target) . "\n"; // Output: 4

$root = [1,2,null,2,null,2];
$target = 2;
echo removeLeafNodes($root, $target) . "\n"; // Output: 10
?>
```

### Explanation:

The solution works as follows:

- The main function, `removeLeafNodes()`, processes each node recursively.
- For each node, if it's a leaf and matches the target, it is removed.
- After processing both left and right subtrees, we check if the current node itself becomes a leaf with the target value and remove it if necessary.

### Example Walkthrough

Consider the first example:

**Input:** `root = [1,2,3,2,null,2,4], target = 2`

The tree is:

```
       1
     /   \
    2     3
   / \   / \
  2  null  2 4
```

1. Starting with the root (1), we check its left child (2).
2. For node 2, we recursively check its left and right children. The left child is 2 (a leaf with the target value). We remove it, and then the left child becomes `null`.
3. The right child of 2 is `null`, so we return to the parent node and check again.
4. Now, node 2 has become a leaf with value 2, so we delete it.
5. The tree becomes:

```
       1
        \
         3
          \
           4
```

After the removal, the root has no more leaf nodes with value 2, and the tree is returned with the new structure.

### Time Complexity

- The time complexity of this solution is **O(N)**, where N is the number of nodes in the tree. This is because we visit every node in the tree exactly once during the DFS traversal.

### Output for Example

- **Input:** root = [1,2,3,2,null,2,4], target = 2
- **Output:** [1, null, 3, null, 4]

This approach efficiently solves the problem using recursion to process the tree nodes in a depth-first manner. It handles the deletion of leaf nodes with the target value and ensures that all affected parent nodes are checked for potential deletions. This solution works within the problem's constraints and provides an optimized solution with a time complexity of O(N).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


#267, #268 leetcode problems 001325-delete-leaves-with-a-given-value submissions 1260759989

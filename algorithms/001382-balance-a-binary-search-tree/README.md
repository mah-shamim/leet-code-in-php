1382\. Balance a Binary Search Tree

**Difficulty:** Medium

**Topics:** `Divide and Conquer`, `Greedy`, `Tree`, `Depth-First Search`, `Binary Search Tree`, `Binary Tree`

Given the `root` of a binary search tree, return _a **balanced** binary search tree with the same node values_. If there is more than one answer, return **any of them**.

A binary search tree is **balanced** if the depth of the two subtrees of every node never differs by more than `1`.

**Example 1:**

![balance1-tree](https://assets.leetcode.com/uploads/2021/08/10/balance1-tree.jpg)

- **Input:** root = [1,null,2,null,3,null,4,null,null]
- **Output:** [2,1,3,null,null,null,4]
- **Explanation:** This is not the only correct answer, [3,1,4,null,2] is also correct.

**Example 2:**

![balanced2-tree](https://assets.leetcode.com/uploads/2021/08/10/balanced2-tree.jpg)

- **Input:** root = [2,1,3]
- **Output:** [2,1,3]

**Constraints:**

- The number of nodes in the tree is in the range <code>[1, 10<sup>4</sup>]</code>.
- <code>1 <= Node.val <= 10<sup>5</sup></code>


**Hint:**
1. Convert the tree to a sorted array using an in-order traversal.
2. Construct a new balanced tree from the sorted array recursively.



**Solution:**

The problem requires us to return a **balanced binary search tree (BST)** given the root of an unbalanced BST. The tree should maintain the same node values as the original tree but be structured in such a way that it is balanced. A balanced binary tree is one in which the depth of the two subtrees of every node differs by no more than 1.

### Key Points

- **Binary Search Tree (BST):** In a BST, for any node, all values in the left subtree are smaller, and all values in the right subtree are larger.
- **Balanced Tree:** A binary tree is balanced if, for every node, the difference in the height of the left and right subtrees is at most 1.
- **In-order Traversal:** This traversal visits the nodes in increasing order for a BST.
- **Balanced BST Construction:** We can construct a balanced tree by using the sorted order of the nodes.

### Approach

1. **In-order Traversal:**
    - Perform an in-order traversal of the given BST to collect the values in sorted order. This will allow us to easily construct a balanced tree later.

2. **Recursive Construction:**
    - After obtaining the sorted array, the middle element becomes the root of the balanced BST. This ensures that the tree remains balanced.
    - Recursively repeat the process for the left and right halves of the array, assigning the left and right children respectively.

3. **Reconstruction of the Tree:**
    - From the sorted array, select the middle element to be the root of the tree or subtree.
    - Repeat this process recursively for the left and right subtrees by narrowing the range of the array.

### Plan

1. Traverse the given unbalanced BST in an in-order fashion to get a sorted array of values.
2. Recursively construct a balanced BST from the sorted array.
3. Return the root of the balanced BST.

Let's implement this solution in PHP: **[1382. Balance a Binary Search Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001382-balance-a-binary-search-tree/solution.php)**

```php
<?php
/**
 * @param TreeNode $root
 * @return TreeNode
 */
function balanceBST($root) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $root
 * @param $nums
 * @return void
 */
function inorder($root, &$nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nums
 * @param $l
 * @param $r
 * @return TreeNode|null
 */
function build($nums, $l, $r) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$root1 = [1,null,2,null,3,null,4,null,null];
$root2 = [2,1,3];

echo balanceBST($root1) . "\n"; // Output: [2,1,3,null,null,null,4]
echo balanceBST($root2) . "\n"; // Output: [2,1,3]
?>
```

### Explanation:

Let's break down the solution into steps:

1. **In-order Traversal:**  
   We traverse the given tree to gather all the node values in sorted order. The in-order traversal visits the left subtree, then the node, and finally the right subtree. This gives us a sorted array of node values.

2. **Recursive Tree Construction:**  
   Using the sorted array, we pick the middle element as the root of the subtree. This step ensures the tree is balanced. Then we repeat the process for the left and right halves of the array to construct the left and right subtrees.

### Example Walkthrough

Consider the input tree:

```
    1
     \
      2
       \
        3
         \
          4
```

1. **In-order Traversal:**  
   After performing an in-order traversal on the original tree, we get the sorted array: `[1, 2, 3, 4]`.

2. **Recursive Construction:**
    - The middle element of the array `[1, 2, 3, 4]` is `2`. This will be the root of the new balanced tree.
    - The left half of the array is `[1]`, which will become the left subtree of node `2`.
    - The right half of the array is `[3, 4]`, which will become the right subtree of node `2`.

   Repeating this process recursively for `[1]` and `[3, 4]`:
    - The middle of `[3, 4]` is `3`, which becomes the right child of `2`. The remaining element `4` becomes the right child of `3`.

   The final balanced tree is:

```
    2
   / \
  1   3
       \
        4
```

### Time Complexity

- The in-order traversal takes **O(n)** time, where **n** is the number of nodes in the tree.
- The recursive construction of the balanced tree takes **O(n)** time as well, since we visit each node once.

Thus, the overall time complexity is **O(n)**.

### Output for Example

For the input tree:

```
    1
     \
      2
       \
        3
         \
          4
```

The output balanced tree could be:

```
    2
   / \
  1   3
       \
        4
```

Or alternatively:

```
    3
   / \
  2   4
 / 
1  
```

To balance a binary search tree, we use the following steps:

1. Perform an in-order traversal to get a sorted array of values.
2. Recursively build the tree from the sorted array by selecting the middle element as the root at each step.
3. Return the root of the balanced binary search tree.

The solution ensures the tree is balanced while maintaining the properties of the original BST.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
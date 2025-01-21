515\. Find Largest Value in Each Tree Row

**Difficulty:** Medium

**Topics:** `Tree`, `Depth-First Search`, `Breadth-First Search`, `Binary Tree`

Given the `root` of a binary tree, return _an array of the largest value in each row of the tree **(0-indexed)**_.

**Example 1:**

![largest_e1](https://assets.leetcode.com/uploads/2020/08/21/largest_e1.jpg)

- **Input:** root = [1,3,2,5,3,null,9]
- **Output:** [1,3,9]

**Example 2:**

- **Input:** root = [1,2,3]
- **Output:** [1,3]



**Constraints:**

- The number of nodes in the tree will be in the range <code>[0, 10<sup>4</sup>]</code>.
- <code>-2<sup>31</sup> <= Node.val <= 2<sup>31</sup> - 1</code>


**Solution:**

The problem **"Find Largest Value in Each Tree Row"** requires identifying the largest value present at each level (row) of a binary tree. Given a binary tree, the goal is to traverse the tree row by row and collect the maximum value from each row. This problem involves fundamental tree traversal techniques such as **Breadth-First Search (BFS)** or **Depth-First Search (DFS)**.

### **Key Points**
1. **Tree Traversal**: The solution involves traversing all levels of the binary tree to identify the largest value at each level.
2. **Breadth-First Search (BFS)**: BFS is suitable for level-by-level traversal, which simplifies finding the largest value in each row.
3. **Constraints**: Handle edge cases like an empty tree and nodes with large or small integer values within the constraint range.


### **Approach**
The most straightforward approach to finding the largest value in each row is using **BFS**:
- Traverse the tree level by level.
- For each level, keep track of the largest value.

Alternatively, **DFS** can also be used:
- Recursively traverse the tree and maintain a record of the maximum value at each depth.


### **Plan**
1. Initialize an array to store the largest values of each row.
2. Use a queue for BFS traversal:
   - Start with the root node.
   - Process all nodes at the current level before moving to the next.
3. For each level:
   - Iterate through all nodes and find the maximum value.
   - Add this value to the result array.
4. Return the result array after completing the traversal.


### **Solution Steps**
1. **Check Input**: If the root is null, return an empty array.
2. **Setup BFS**:
   - Use a queue initialized with the root node.
   - Initialize an empty result array.
3. **Traverse Levels**:
   - For each level, track the maximum value.
   - Add child nodes to the queue for the next level.
4. **Update Results**:
   - Append the maximum value of each level to the result array.
5. **Return Results**: Return the result array containing the largest values for each row.

Let's implement this solution in PHP: **[515. Find Largest Value in Each Tree Row](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000515-find-largest-value-in-each-tree-row/solution.php)**

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
 * @return Integer[]
 */
function largestValues($root) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$root = new TreeNode(1);
$root->left = new TreeNode(3);
$root->right = new TreeNode(2);
$root->left->left = new TreeNode(5);
$root->left->right = new TreeNode(3);
$root->right->right = new TreeNode(9);

print_r(largestValues($root)); // Output: [1, 3, 9]
?>
```

### Explanation:

#### Input: `[1,3,2,5,3,null,9]`
1. **Level 0**: Node values: `[1]` → Maximum: `1`.
2. **Level 1**: Node values: `[3, 2]` → Maximum: `3`.
3. **Level 2**: Node values: `[5, 3, 9]` → Maximum: `9`.
#### Output: `[1, 3, 9]`.


### **Time Complexity**
- **BFS Traversal**: Each node is processed once → **O(n)**.
- **Finding Maximum**: Done during traversal → **O(1)** per level.
- **Total**: **O(n)**.

### **Space Complexity**
- **Queue Storage**: At most, the width of the tree (number of nodes at the largest level) → **O(w)** where `w` is the maximum width of the tree.


### **Output for Example**
Input: `root = [1,3,2,5,3,null,9]`  
Output: `[1, 3, 9]`.


This BFS-based solution efficiently computes the largest value in each tree row with linear time complexity. It handles large trees, negative values, and edge cases like empty trees effectively.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

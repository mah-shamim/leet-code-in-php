2583\. Kth Largest Sum in a Binary Tree

**Difficulty:** Medium

**Topics:** `Tree`, `Breadth-First Search`, `Sorting`, `Binary Tree`

You are given the `root` of a binary tree and a positive integer `k`.

The **level sum** in the tree is the sum of the values of the nodes that are on the **same** level.

Return _the <code>k<sup>th</sup></code> **largest** level sum in the tree (not necessarily distinct)_. If there are fewer than `k` levels in the tree, return _`-1`_.

**Note** that two nodes are on the same level if they have the same distance from the root.

**Example 1:**

![binaryytreeedrawio-2](https://assets.leetcode.com/uploads/2022/12/14/binaryytreeedrawio-2.png)

- **Input:** root = [5,8,9,2,1,3,7,4,6], k = 2
- **Output:** 13
- **Explanation:** The level sums are the following:
  - Level 1: 5.
  - Level 2: 8 + 9 = 17.
  - Level 3: 2 + 1 + 3 + 7 = 13.
  - Level 4: 4 + 6 = 10.
    The 2<sup>nd</sup> largest level sum is 13.

**Example 2:**

![treedrawio-3](https://assets.leetcode.com/uploads/2022/12/14/treedrawio-3.png)

- **Input:** root = [1,2,null,3], k = 1
- **Output:** 3
- **Explanation:** The largest level sum is 3.


**Constraints:**

- The number of nodes in the tree is `n`.
- <code>2 <= n <= 10<sup>5</sup></code>
- <code>1 <= Node.val <= 10<sup>6</sup></code>
- `1 <= k <= n`


**Hint:**
1. Find the sum of values of nodes on each level and return the kth largest one.
2. To find the sum of the values of nodes on each level, you can use a DFS or BFS algorithm to traverse the tree and keep track of the level of each node.



**Solution:**

We'll follow these steps:

1. **Level Order Traversal**: We will use a Breadth-First Search (BFS) to traverse the tree level by level.
2. **Calculate Level Sums**: During the BFS traversal, we'll calculate the sum of node values at each level.
3. **Sort and Find k-th Largest Sum**: After calculating the sums for all levels, we'll sort the sums and retrieve the k-th largest value.

Let's implement this solution in PHP: **[2583. Kth Largest Sum in a Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002583-kth-largest-sum-in-a-binary-tree/solution.php)**

```php
<?php
// Definition for a binary tree node.
class TreeNode {
    public $val;
    public $left;
    public $right;
    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

/**
 * @param TreeNode $root
 * @param Integer $k
 * @return Integer
 */
function kthLargestLevelSum($root, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1:
// Input: root = [5,8,9,2,1,3,7,4,6], k = 2
$root1 = new TreeNode(5);
$root1->left = new TreeNode(8);
$root1->right = new TreeNode(9);
$root1->left->left = new TreeNode(2);
$root1->left->right = new TreeNode(1);
$root1->right->left = new TreeNode(3);
$root1->right->right = new TreeNode(7);
$root1->left->left->left = new TreeNode(4);
$root1->left->left->right = new TreeNode(6);
echo kthLargestLevelSum($root1, 2); // Output: 13

// Example 2:
// Input: root = [1,2,null,3], k = 1
$root2 = new TreeNode(1);
$root2->left = new TreeNode(2);
$root2->left->left = new TreeNode(3);
echo kthLargestLevelSum($root2, 1); // Output: 3
?>
```

### Explanation:

1. **TreeNode Class**: We define the `TreeNode` class to represent a node in the binary tree, where each node has a value (`val`), a left child (`left`), and a right child (`right`).

2. **BFS Traversal**: The function `kthLargestLevelSum` uses a queue to perform a BFS traversal. For each level, we sum the values of the nodes and store the result in an array (`$levelSums`).

3. **Sorting Level Sums**: After traversing the entire tree and calculating the level sums, we sort the sums in descending order using `rsort`. This allows us to easily access the k-th largest sum.

4. **Edge Case Handling**: If there are fewer than `k` levels, we return `-1`.

### Time Complexity:
- **BFS Traversal**: O(n), where n is the number of nodes in the tree.
- **Sorting**: O(m log m), where m is the number of levels in the tree. Since m is much smaller than n, sorting is relatively fast.
- Overall time complexity: O(n + m log m).

### Space Complexity:
- **Queue**: O(n), for storing nodes during BFS.
- **Level Sums**: O(m), for storing the sum of each level.
- Overall space complexity: O(n).

This approach ensures that we traverse the tree efficiently and return the correct k<sup>th</sup> **largest** level sum.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


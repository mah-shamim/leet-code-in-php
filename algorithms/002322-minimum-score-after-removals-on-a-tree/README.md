2322\. Minimum Score After Removals on a Tree

**Difficulty:** Hard

**Topics:** `Array`, `Bit Manipulation`, `Tree`, `Depth-First Search`, `Weekly Contest 299`

There is an undirected connected tree with n nodes labeled from `0` to `n - 1` and `n - 1` edges.

You are given a **0-indexed** integer array `nums` of length `n` where `nums[i]` represents the value of the <code>i<sub>th</sub></code> node. You are also given a 2D integer array `edges` of length `n - 1` where <code>edges[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> indicates that there is an edge between nodes <code>a<sub>i</sub></code> and <code>b<sub>i</sub></code> in the tree.

Remove two **distinct** edges of the tree to form three connected components. For a pair of removed edges, the following steps are defined:

1. Get the XOR of all the values of the nodes for **each** of the three components respectively.
2. The **difference** between the **largest** XOR value and the **smallest** XOR value is the **score** of the pair.

- For example, say the three components have the node values: `[4,5,7]`, `[1,9]`, and `[3,3,3]`. The three XOR values are `4 ^ 5 ^ 7 = 6`, `1 ^ 9 = 8`, and `3 ^ 3 ^ 3 = 3`. The largest XOR value is `8` and the smallest XOR value is `3`. The score is then `8 - 3 = 5`.

Return _the **minimum** score of any possible pair of edge removals on the given tree_.

**Example 1:**

![ex1drawio](https://assets.leetcode.com/uploads/2022/05/03/ex1drawio.png)

- **Input:** nums = [1,5,5,4,11], edges = [[0,1],[1,2],[1,3],[3,4]]
- **Output:** 9
- **Explanation:** The diagram above shows a way to make a pair of removals.
  - The 1<sup>st</sup> component has nodes [1,3,4] with values [5,4,11]. Its XOR value is 5 ^ 4 ^ 11 = 10.
  - The 2<sup>nd</sup> component has node [0] with value [1]. Its XOR value is 1 = 1.
  - The 3<sup>rd</sup> component has node [2] with value [5]. Its XOR value is 5 = 5.
    The score is the difference between the largest and smallest XOR value which is 10 - 1 = 9.
    It can be shown that no other pair of removals will obtain a smaller score than 9.

**Example 2:**

![ex2drawio](https://assets.leetcode.com/uploads/2022/05/03/ex2drawio.png)

- **Input:** nums = [5,5,2,4,4,2], edges = [[0,1],[1,2],[5,2],[4,3],[1,3]]
- **Output:** 0
- **Explanation:** The diagram above shows a way to make a pair of removals.
  - The 1st component has nodes [3,4] with values [4,4]. Its XOR value is 4 ^ 4 = 0.
  - The 2nd component has nodes [1,0] with values [5,5]. Its XOR value is 5 ^ 5 = 0.
  - The 3rd component has nodes [2,5] with values [2,2]. Its XOR value is 2 ^ 2 = 0.
    The score is the difference between the largest and smallest XOR value which is 0 - 0 = 0.
    We cannot obtain a smaller score than 0.

**Constraints:**

- `n == nums.length`
- `3 <= n <= 1000`
- <code>1 <= nums[i] <= 108</code>
- `edges.length == n - 1`
- `edges[i].length == 2`
- <code>0 <= a<sub>i</sub>, b<sub>i</sub> < n</code>
- <code>a<sub>i</sub> != b<sub>i</sub></code>
- `edges` represents a valid tree.


**Hint:**
1. Consider iterating over the first edge to remove, and then doing some precalculations on the 2 resulting connected components.
2. Will calculating the XOR of each subtree help?






**Solution:**

We need to find the minimum score after removing two distinct edges from a tree, resulting in three connected components. The score is defined as the difference between the largest and smallest XOR values of the three components.

### Approach
1. **Tree Representation**: Represent the tree using an adjacency list for efficient traversal.
2. **DFS Traversal**: Perform a depth-first search (DFS) to compute the following for each node:
    - **In-time and Out-time**: These help in identifying if a node lies within the subtree of another node.
    - **Subtree XOR**: The XOR of all node values in the subtree rooted at each node.
3. **Total XOR Calculation**: Compute the XOR of all node values in the entire tree.
4. **Edge Removal Simulation**: For each edge (represented by its child node), simulate its removal as the first removal. This splits the tree into two parts:
    - **Subtree (T1)**: The subtree rooted at the child node.
    - **Remaining Tree (T2)**: The rest of the tree.
5. **Second Removal Handling**: For each first removal, consider two types of second removals:
    - **Type 1**: The second edge is in the subtree (T1). This splits T1 into two components.
    - **Type 2**: The second edge is in the remaining tree (T2). This splits T2 into two components.
6. **Component XOR Calculation**: For each type, compute the XOR values of the three resulting components:
    - **Type 1**: The components are the subtree of the second edge's child, the remaining part of T1, and T2.
    - **Type 2**: The components are T1, the subtree of the second edge's child (adjusted if the child is an ancestor of the first removal's child), and the remaining part of T2.
7. **Score Calculation**: For each scenario, compute the score (difference between the maximum and minimum XOR values of the three components) and track the minimum score encountered.

Let's implement this solution in PHP: **[2322. Minimum Score After Removals on a Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002322-minimum-score-after-removals-on-a-tree/solution.php)**

```php
<?php
class Solution {
    private $graph;
    private $nums;
    private $in_time;
    private $out_time;
    private $parent;
    private $subtree_xor;
    private $time;

    /**
     * @param Integer[] $nums
     * @param Integer[][] $edges
     * @return Integer
     */
    function minimumScore($nums, $edges) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param $u
     * @param $p
     * @return void
     */
    function dfs($u, $p) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

// Test cases
$sol = new Solution();
// Example 1
$nums = [1, 5, 5, 4, 11];
$edges = [[0,1],[1,2],[1,3],[3,4]];
echo "Output: " . $sol->minimumScore($nums, $edges) . "\n"; // Expected: 9

// Example 2
$nums = [5,5,2,4,4,2];
$edges = [[0,1],[1,2],[5,2],[4,3],[1,3]];
echo "Output: " . $sol->minimumScore($nums, $edges) . "\n"; // Expected: 0
?>
```

### Explanation:

1. **Tree Representation**: The tree is built using an adjacency list from the given edges.
2. **DFS Traversal**: The DFS function computes in-time, out-time, parent, and subtree XOR for each node. In-time and out-time help in determining subtree relationships, while subtree XOR stores the cumulative XOR of node values in the subtree.
3. **Total XOR**: The XOR of all node values is derived from the root node's subtree XOR.
4. **Edge Removal Simulation**: For each edge (represented by its child node `v`), the tree is split into two parts: the subtree rooted at `v` (T1) and the remaining tree (T2).
5. **Second Removal Handling**:
    - **Type 1**: The second edge is within T1. The components are the subtree of the second edge's child, the remainder of T1, and T2.
    - **Type 2**: The second edge is within T2. If the second edge's child is an ancestor of `v`, the subtree XOR is adjusted by excluding `v`'s subtree. The components are T1, the adjusted subtree, and the remainder of T2.
6. **Score Calculation**: For each scenario, the score is the difference between the maximum and minimum XOR values of the three components. The minimum score across all scenarios is returned.

This approach efficiently explores all possible pairs of edge removals by leveraging subtree properties and XOR operations, ensuring optimal performance for the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
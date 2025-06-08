3372\. Maximize the Number of Target Nodes After Connecting Trees I

**Difficulty:** Medium

**Topics:** `Tree`, `Depth-First Search`, `Breadth-First Search`

There exist two **undirected** trees with `n` and `m` nodes, with **distinct** labels in ranges `[0, n - 1]` and `[0, m - 1]`, respectively.

You are given two 2D integer arrays `edges1` and `edges2` of lengths `n - 1` and `m - 1`, respectively, where <code>edges1[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> indicates that there is an edge between nodes <code>a<sub>i</sub></code> and <code>b<sub>i</sub></code> in the first tree and <code>edges2[i] = [u<sub>i</sub>, v<sub>i</sub>]</code> indicates that there is an edge between nodes <code>u<sub>i</sub></code> and <code>v<sub>i</sub></code> in the second tree. You are also given an integer `k`.

Node `u` is **target** to node `v` if the number of edges on the path from `u` to `v` is less than or equal to `k`. **Note** that a node is _always_ **target** to itself.

Return an array of `n` integers `answer`, where `answer[i]` is the **maximum** possible number of nodes **target** to node `i` of the first tree if you have to connect one node from the first tree to another node in the second tree.

**Note** that queries are independent from each other. That is, for every query you will remove the added edge before proceeding to the next query.

**Example 1:**

- **Input:** edges1 = [[0,1],[0,2],[2,3],[2,4]], edges2 = [[0,1],[0,2],[0,3],[2,7],[1,4],[4,5],[4,6]], k = 2
- **Output:** [9,7,9,8,8]
- **Explanation:**
  - For i = 0, connect node 0 from the first tree to node 0 from the second tree.
  - For i = 1, connect node 1 from the first tree to node 0 from the second tree.
  - For i = 2, connect node 2 from the first tree to node 4 from the second tree.
  - For i = 3, connect node 3 from the first tree to node 4 from the second tree.
  - For i = 4, connect node 4 from the first tree to node 4 from the second tree.
  ![3982-1](https://assets.leetcode.com/uploads/2024/09/24/3982-1.png)

**Example 2:**

- **Input:** edges1 = [[0,1],[0,2],[0,3],[0,4]], edges2 = [[0,1],[1,2],[2,3]], k = 1
- **Output:** [6,3,3,3,3]
- **Explanation:**
   - For every `i`, connect node `i` of the first tree with any node of the second tree.
   ![3928-2](https://assets.leetcode.com/uploads/2024/09/24/3928-2.png)



**Constraints:**

- `2 <= n, m <= 1000`
- `edges1.length == n - 1`
- `edges2.length == m - 1`
- `edges1[i].length == edges2[i].length == 2`
- <code>edges1[i] = [a<sub>i</sub>, b<sub>i</sub>]</code>
- <code>0 <= a<sub>i</sub>, b<sub>i</sub> < n</code>
- <code>edges2[i] = [u<sub>i</sub>, v<sub>i</sub>]</code>
- <code>0 <= u<sub>i</sub>, v<sub>i</sub> < m</code>
- The input is generated such that `edges1` and `edges2` represent valid trees.
- `0 <= k <= 1000`


**Hint:**
1. For each node `u` in the first tree, find the number of nodes at a distance of at most `k` from node `u`.
2. For each node `v` in the second tree, find the number of nodes at a distance of at most `k - 1` from node `v`.



**Solution:**

We need to maximize the number of target nodes for each node in the first tree after connecting it to a node in the second tree. A target node for a given node is any node within a distance of at most `k` from it. The solution involves efficiently calculating the number of nodes within the specified distance in both trees and then combining these counts optimally.

### Approach
1. **Problem Analysis**: The problem requires us to compute, for each node in the first tree, the maximum number of target nodes achievable by connecting it to any node in the second tree. The target nodes include nodes from both trees that are within a distance `k` from the node in the first tree. The connection between the trees allows paths that traverse through the added edge.

2. **Intuition**:
    - For any node `i` in the first tree, the number of target nodes within the first tree is simply the count of nodes within distance `k` from `i` in the first tree.
    - When connecting `i` to a node `j` in the second tree, the number of target nodes in the second tree is the count of nodes within distance `k-1` from `j` in the second tree (since the edge `i-j` adds 1 to the path length).
    - To maximize the total target nodes for `i`, we should choose `j` in the second tree that maximizes the count of nodes within distance `k-1` from it.

3. **Algorithm Selection**:
    - **Breadth-First Search (BFS)**: For each node in both trees, perform BFS to count nodes within the specified distance. BFS is suitable because it efficiently explores nodes level by level, allowing us to stop once we exceed the distance limit.
    - **Precomputation**:
        - For each node in the first tree, precompute the count of nodes within distance `k`.
        - For each node in the second tree, precompute the count of nodes within distance `k-1` (if `k >= 1`), and find the maximum such count (`M`).
    - **Result Calculation**: For each node in the first tree, the result is the sum of its precomputed count and `M`.

4. **Complexity Analysis**:
    - **Tree1 Processing**: For each of the `n` nodes, BFS runs in O(n) time, leading to O(n²) time.
    - **Tree2 Processing**: Similarly, for each of the `m` nodes, BFS runs in O(m) time, leading to O(m²) time.
    - Overall complexity is O(n² + m²), which is feasible given the constraints (n, m ≤ 1000).

Let's implement this solution in PHP: **[3372. Maximize the Number of Target Nodes After Connecting Trees I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003372-maximize-the-number-of-target-nodes-after-connecting-trees-i/solution.php)**

```php
<?php
/**
 * @param Integer[][] $edges1
 * @param Integer[][] $edges2
 * @param Integer $k
 * @return Integer[]
 */
function maxTargetNodes($edges1, $edges2, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$edges1 = [[0,1],[0,2],[2,3],[2,4]];
$edges2 = [[0,1],[0,2],[0,3],[2,7],[1,4],[4,5],[4,6]];
$k = 2;
print_r(maxTargetNodes($edges1, $edges2, $k)); // [9,7,9,8,8]

// Example 2
$edges1 = [[0,1],[0,2],[0,3],[0,4]];
$edges2 = [[0,1],[1,2],[2,3]];
$k = 1;
print_r(maxTargetNodes($edges1, $edges2, $k)); // [6,3,3,3,3]
?>
```

### Explanation:

1. **Graph Construction**: The adjacency lists for both trees are built from the given edges.
2. **BFS for Tree1**: For each node in the first tree, BFS is used to count nodes within distance `k`. The count is stored in `count1_arr`.
3. **BFS for Tree2**: If `k >= 1`, for each node in the second tree, BFS counts nodes within distance `k-1`. The maximum count across all nodes in the second tree is stored in `M`.
4. **Result Calculation**: For each node in the first tree, the result is the sum of its count from `count1_arr` and `M`, representing the maximum target nodes achievable by connecting it to the optimal node in the second tree.

This approach efficiently computes the solution by leveraging BFS for distance-based counts and combines results from both trees to maximize the target nodes for each query. The complexity is manageable within the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
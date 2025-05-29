3373\. Maximize the Number of Target Nodes After Connecting Trees II

**Difficulty:** Hard

**Topics:** `Tree`, `Depth-First Search`, `Breadth-First Search`

There exist two **undirected** trees with `n` and `m` nodes, labeled from `[0, n - 1]` and `[0, m - 1]`, respectively.

You are given two 2D integer arrays `edges1` and `edges2` of lengths `n - 1` and `m - 1`, respectively, where <code>edges1[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> indicates that there is an edge between nodes <code>a<sub>i</sub></code> and <code>b<sub>i</sub></code> in the first tree and <code>edges2[i] = [u<sub>i</sub>, v<sub>i</sub>]</code> indicates that there is an edge between nodes <code>u<sub>i</sub></code> and <code>v<sub>i</sub></code> in the second tree.

Node `u` is **target** to node `v` if the number of edges on the path from `u` to `v` is even. **Note** that a node is _always_ **target** to itself.

Return an array of `n` integers `answer`, where `answer[i]` is the **maximum** possible number of nodes that are **target** to node `i` of the first tree if you had to connect one node from the first tree to another node in the second tree.

**Note** that queries are independent from each other. That is, for every query you will remove the added edge before proceeding to the next query.

**Example 1:**

- **Input:** edges1 = [[0,1],[0,2],[2,3],[2,4]], edges2 = [[0,1],[0,2],[0,3],[2,7],[1,4],[4,5],[4,6]]
- **Output:** [8,7,7,8,8]
- **Explanation:**
  - For `i = 0`, connect node 0 from the first tree to node 0 from the second tree.
  - For `i = 1`, connect node 1 from the first tree to node 4 from the second tree.
  - For `i = 2`, connect node 2 from the first tree to node 7 from the second tree.
  - For `i = 3`, connect node 3 from the first tree to node 0 from the second tree.
  - For `i = 4`, connect node 4 from the first tree to node 4 from the second tree.

![3982-1](https://assets.leetcode.com/uploads/2024/09/24/3982-1.png)


**Example 2:**

- **Input:** edges1 = [[0,1],[0,2],[0,3],[0,4]], edges2 = [[0,1],[1,2],[2,3]]
- **Output:** [3,6,6,6,6]
- **Explanation:** For every i, connect node i of the first tree with any node of the second tree.

![ex2](https://assets.leetcode.com/uploads/2020/09/03/ex2.jpg)



**Constraints:**

- <code>2 <= n, m <= 10<sup>5</sup></code>
- `edges1.length == n - 1`
- `edges2.length == m - 1`
- `edges1[i].length == edges2[i].length == 2`
- <code>edges1[i] = [a<sub>i</sub>, b<sub>i</sub>]</code>
- <code>0 <= a<sub>i</sub>, b<sub>i</sub> < n</code>
- <code>edges2[i] = [u<sub>i</sub>, v<sub>i</sub>]</code>
- <code>0 <= u<sub>i</sub>, v<sub>i</sub> < m</code>
- The input is generated such that `edges1` and `edges2` represent valid trees.



**Hint:**
1. Compute an array `even` where `even[u]` is the number of nodes at an even distance from node `u`, for every `u` of the first tree.
2. Compute an array `odd` where `odd[u]` is the number of nodes at an odd distance from node `u`, for every `u` of the second tree.
3. `answer[i] = even[i]+ max(odd[1], odd[2], …, odd[m - 1])`



**Solution:**

We need to maximize the number of target nodes for each node in the first tree after connecting it to any node in the second tree. A node is considered a target to another node if the path between them has an even number of edges.

### Approach
1. **Problem Analysis**:
    - **Target Node Definition**: A node `u` is a target to node `v` if the number of edges on the path from `u` to `v` is even. This includes the node itself (distance 0).
    - **Connection Strategy**: For each node `i` in the first tree, we connect it to some node `j` in the second tree. The goal is to choose `j` such that the number of target nodes for `i` is maximized.

2. **Key Insight**:
    - **Bipartite Coloring**: Trees are bipartite graphs, meaning nodes can be colored with two colors such that adjacent nodes have different colors. The parity of the path length between two nodes depends on their colors:
        - If two nodes have the same color, the path length between them is even.
        - If they have different colors, the path length is odd.
    - **Maximizing Target Nodes**:
        - **First Tree (Tree1)**: The number of target nodes for `i` within Tree1 is the count of nodes in Tree1 that have the same color as `i`.
        - **Second Tree (Tree2)**: By connecting `i` to a node `j` in Tree2, the number of target nodes in Tree2 for `i` is the count of nodes in Tree2 that have the opposite color of `j`. To maximize this, we choose `j` such that the count of opposite-colored nodes in Tree2 is maximized.

3. **Algorithm**:
    - **Tree2 Processing**:
        - Perform BFS starting from node 0 to color all nodes in Tree2 (0 or 1).
        - Count nodes with color 0 (`count0`) and color 1 (`count1`). The maximum of these counts (`base = max(count0, count1)`) gives the maximum possible target nodes from Tree2 for any node in Tree1.
    - **Tree1 Processing**:
        - Perform BFS starting from node 0 to color all nodes in Tree1.
        - Count nodes with color 0 (`cnt0`) and color 1 (`cnt1`).
    - **Result Calculation**: For each node `i` in Tree1:
        - If `i` has color 0, the number of target nodes in Tree1 is `cnt0`.
        - If `i` has color 1, the number of target nodes in Tree1 is `cnt1`.
        - The total target nodes for `i` is the sum of target nodes in Tree1 and `base`.

Let's implement this solution in PHP: **[3373. Maximize the Number of Target Nodes After Connecting Trees II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003373-maximize-the-number-of-target-nodes-after-connecting-trees-ii/solution.php)**

```php
<?php
/**
 * @param Integer[][] $edges1
 * @param Integer[][] $edges2
 * @return Integer[]
 */
function maxTargetNodes($edges1, $edges2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// === Test ===

$edges1 = [[0,1],[0,2],[2,3],[2,4]];
$edges2 = [[0,1],[0,2],[0,3],[2,7],[1,4],[4,5],[4,6]];
print_r(maxTargetNodes($edges1, $edges2)); // Expected: [8,7,7,8,8]

$edges1 = [[0,1],[0,2],[0,3],[0,4]];
$edges2 = [[0,1],[1,2],[2,3]];
print_r(maxTargetNodes($edges1, $edges2)); // Expected: [3,6,6,6,6]
?>
```

### Explanation:

1. **Tree2 Processing**:
    - We build an adjacency list for Tree2 and perform BFS starting from node 0 to color nodes. Nodes at an even distance from node 0 are colored 0, and those at an odd distance are colored 1.
    - We count nodes colored 0 (`count0`) and 1 (`count1`). The maximum of these counts (`base`) represents the maximum target nodes achievable from Tree2 when connecting any node in Tree1 to Tree2.

2. **Tree1 Processing**:
    - Similarly, we build an adjacency list for Tree1 and perform BFS starting from node 0 to color nodes.
    - We count nodes colored 0 (`cnt0`) and 1 (`cnt1`).

3. **Result Calculation**:
    - For each node `i` in Tree1, if `i` is colored 0, the target nodes in Tree1 are `cnt0`; otherwise, they are `cnt1`.
    - The total target nodes for `i` is the sum of target nodes in Tree1 and `base` (the maximum target nodes from Tree2).

This approach efficiently leverages bipartite properties of trees to compute the solution in linear time relative to the number of nodes and edges.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
1857\. Largest Color Value in a Directed Graph

**Difficulty:** Hard

**Topics:** `Hash Table`, `Dynamic Programming`, `Graph`, `Topological Sort`, `Memoization`, `Counting`

There is a **directed graph** of `n` colored nodes and `m` edges. The nodes are numbered from `0` to `n - 1`.

You are given a string `colors` where `colors[i]` is a lowercase English letter representing the color of the <code>i<sup>th</sup></code> node in this graph (**0-indexed**). You are also given a 2D array `edges` where <code>edges[j] = [a<sub>j</sub>, b<sub>j</sub>]</code> indicates that there is a **directed edge** from node <code>a<sub>j</sub></code> to node <code>b<sub>j</sub></code>.

A valid **path** in the graph is a sequence of nodes <code>x<sub>1</sub> -> x<sub>2</sub> -> x<sub>3</sub> -> ... -> x<sub>k</sub></code> such that there is a directed edge from <code>x<sub>i</sub></code> to <code>x<sub>i+1</sub></code> for every <code>1 <= i < k</code>. The **color value** of the path is the number of nodes that are colored the **most frequently** occurring color along that path.

Return _the **largest color value** of any valid path in the given graph, or `-1` if the graph contains a cycle_.

**Example 1:**

![leet1](https://assets.leetcode.com/uploads/2021/04/21/leet1.png)

- **Input:** colors = "abaca", edges = [[0,1],[0,2],[2,3],[3,4]]
- **Output:** 3
- **Explanation:** The path 0 -> 2 -> 3 -> 4 contains 3 nodes that are colored `"a" (red in the above image)`.

**Example 2:**

![leet2](https://assets.leetcode.com/uploads/2021/04/21/leet2.png)

- **Input:** colors = "a", edges = [[0,0]]
- **Output:** -1
- **Explanation:** There is a cycle from 0 to 0.



**Constraints:**

- `n == colors.length`
- `m == edges.length`
- <code>1 <= n <= 10<sup>5</sup></code>
- <code>0 <= m <= 10<sup>5</sup></code>
- `colors` consists of lowercase English letters.
- <code>0 <= a<sub>j</sub>, b<sub>j</sub> < n</code>


**Hint:**
1. Use topological sort.
2. let dp[u][c] := the maximum count of vertices with color c of any path starting from vertex u. (by JerryJin2905)



**Solution:**

We need to determine the largest color value in a directed graph, considering possible cycles. If the graph contains a cycle, we return -1. Otherwise, we compute the maximum color value using dynamic programming combined with topological sorting.

### Approach
1. **Cycle Detection and Topological Sort**: Use Kahn's algorithm to perform a topological sort. If the number of processed nodes is less than the total nodes, the graph contains a cycle, and we return -1.
2. **Dynamic Programming (DP)**: For each node processed in topological order, maintain a DP array where `dp[u][c]` represents the maximum count of color `c` in any path ending at node `u`.
3. **Reverse Adjacency List**: Track predecessors for each node to efficiently update DP values based on incoming edges.
4. **Color Count Update**: For each node, initialize its DP array with its own color count. Then, update the DP values by considering all paths from predecessors, incrementing the count if the current node's color matches.

Let's implement this solution in PHP: **[1857. Largest Color Value in a Directed Graph](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001857-largest-color-value-in-a-directed-graph/solution.php)**

```php
<?php
/**
 * @param String $colors
 * @param Integer[][] $edges
 * @return Integer
 */
function largestPathValue($colors, $edges) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

$colors = "abaca";
$edges = [[0,1],[0,2],[2,3],[3,4]];
echo largestPathValue($colors, $edges);  // Output: 3

$colors = "a";
$edges = [[0,0]];
echo largestPathValue($colors, $edges);  // Output: -1
?>
```

### Explanation:

1. **Topological Sorting**: Using Kahn's algorithm, we process nodes in a topological order. This ensures that each node is processed only after all its predecessors have been processed, which is crucial for correctly updating DP values.
2. **Cycle Detection**: If the topological sort processes fewer nodes than the total nodes, a cycle exists, and we return -1.
3. **DP Initialization**: Each node starts with a DP array initialized to 0 except for its own color, which is set to 1.
4. **Updating DP Values**: For each node, we update its DP array by considering all incoming edges (predecessors). For each predecessor, we check all color counts and update the current node's DP values to reflect the maximum possible counts from all paths ending at the current node.
5. **Result Calculation**: The maximum value in the DP array for each node is tracked to determine the largest color value in any valid path.

This approach efficiently combines topological sorting and dynamic programming to solve the problem in linear time relative to the number of edges and nodes, making it suitable for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
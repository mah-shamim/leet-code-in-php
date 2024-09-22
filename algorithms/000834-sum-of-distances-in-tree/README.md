834\. Sum of Distances in Tree

**Difficulty:** Hard

**Topics:** `Dynamic Programming`, `Tree`, `Depth-First Search`, `Graph`

There is an undirected connected tree with `n` nodes labeled from `0` to `n - 1` and `n - 1` edges.

You are given the integer `n` and the array `edges` where <code>edges[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> indicates that there is an edge between nodes a<sub>i</sub> and b<sub>i</sub> in the tree.

Return an array `answer` of length `n` where `answer[i]` is the sum of the distances between the <code>i<sup>th</sup></code> node in the tree and all other nodes.

**Example 1:**

![lc-sumdist1](https://assets.leetcode.com/uploads/2021/07/23/lc-sumdist1.jpg)

- **Input:** n = 6, edges = [[0,1],[0,2],[2,3],[2,4],[2,5]]
- **Output:** [8,12,6,10,10,10]
- **Explanation:** The tree is shown above.
  We can see that dist(0,1) + dist(0,2) + dist(0,3) + dist(0,4) + dist(0,5)
  equals 1 + 1 + 2 + 2 + 2 = 8.
  Hence, answer[0] = 8, and so on.

**Example 2:**

![lc-sumdist2](https://assets.leetcode.com/uploads/2021/07/23/lc-sumdist2.jpg)

- **Input:** n = 1, edges = []
- **Output:** [0]

**Example 3:**

![lc-sumdist3](https://assets.leetcode.com/uploads/2021/07/23/lc-sumdist3.jpg)

- **Input:** n = 2, edges = [[1,0]]
- **Output:** [1,1]

**Constraints:**

- <code>1 <= n <= 3 * 10<sup>4</sup></code>
- `edges.length == n - 1`
- `edges[i].length == 2`
- <code>0 <= a<sub>i</sub>, b<sub>i</sub> < n</code>
- <code>a<sub>i</sub> != b<sub>i</sub></code>
- The given input represents a valid tree.



**Solution:**

We use a combination of Depth-First Search (DFS) and dynamic programming techniques. The goal is to efficiently compute the sum of distances for each node in a tree with `n` nodes and `n-1` edges.

### Approach:

1. **Tree Representation**: Represent the tree using an adjacency list. This helps in efficient traversal using DFS.
2. **First DFS (`dfs1`)**:
  - Calculate the size of each subtree.
  - Compute the sum of distances from the root node to all other nodes.
3. **Second DFS (`dfs2`)**:
  - Use the results from the first DFS to compute the sum of distances for all nodes.
  - Adjust the results based on the parent's result.

### Detailed Steps:

1. **Build the Graph**: Convert the edge list into an adjacency list for efficient traversal.
2. **First DFS**:
  - Start from the root node (typically node `0`).
  - Compute the size of each subtree and the total distance from the root node to all other nodes.
3. **Second DFS**:
  - Compute the distance sums for all nodes using the information from the first DFS.
  - Adjust the distance sum based on the parent node’s result.

Let's implement this solution in PHP: **[834. Sum of Distances in Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000834-sum-of-distances-in-tree/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @return Integer[]
 */
function sumOfDistancesInTree($n, $edges) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$n1 = 6;
$edges1 = [[0,1],[0,2],[2,3],[2,4],[2,5]];
print_r(sumOfDistancesInTree($n1, $edges1));  // Output: [8,12,6,10,10,10]

$n2 = 1;
$edges2 = [];
print_r(sumOfDistancesInTree($n2, $edges2));  // Output: [0]

$n3 = 2;
$edges3 = [[1,0]];
print_r(sumOfDistancesInTree($n3, $edges3));  // Output: [1,1]
?>
```

### Explanation:

1. **Graph Construction**: `array_fill` initializes the adjacency list, `ans`, and `size` arrays.
2. **`dfs1` Function**: Calculates the total distance from the root and subtree sizes.
3. **`dfs2` Function**: Adjusts distances for all nodes based on the result from `dfs1`.

This approach efficiently computes the required distances using two DFS traversals, achieving a time complexity of `O(n)`, which is suitable for large trees as specified in the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

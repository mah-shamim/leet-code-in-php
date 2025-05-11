2685\. Count the Number of Complete Components

**Difficulty:** Medium

**Topics:** `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Graph`

You are given an integer `n`. There is an **undirected** graph with `n` vertices, numbered from `0` to `n - 1`. You are given a 2D integer array `edges` where <code>edges[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> denotes that there exists an **undirected** edge connecting vertices <code>a<sub>i</sub></code> and <code>b<sub>i</sub></code>.

Return _the number of **complete connected components** of the graph_.

A **connected component** is a subgraph of a graph in which there exists a path between any two vertices, and no vertex of the subgraph shares an edge with a vertex outside of the subgraph.

A connected component is said to be **complete** if there exists an edge between every pair of its vertices.

**Example 1:**

![screenshot-from-2023-04-11-23-31-23](https://assets.leetcode.com/uploads/2023/04/11/screenshot-from-2023-04-11-23-31-23.png)

- **Input:** n = 6, edges = [[0,1],[0,2],[1,2],[3,4]]
- **Output:** 3
- **Explanation:** From the picture above, one can see that all of the components of this graph are complete.

**Example 2:**

![screenshot-from-2023-04-11-23-32-00](https://assets.leetcode.com/uploads/2023/04/11/screenshot-from-2023-04-11-23-32-00.png)

- **Input:**  n = 6, edges = [[0,1],[0,2],[1,2],[3,4],[3,5]]
- **Output:** 1
- **Explanation:** The component containing vertices 0, 1, and 2 is complete since there is an edge between every pair of two vertices. On the other hand, the component containing vertices 3, 4, and 5 is not complete since there is no edge between vertices 4 and 5. Thus, the number of complete components in this graph is 1.



**Constraints:**

- `1 <= n <= 50`
- `0 <= edges.length <= n * (n - 1) / 2`
- `edges[i].length == 2`
- <code>0 <= a<sub>i</sub>, b<sub>i</sub> <= n - 1</code>
- <code>a<sub>i</sub> != b<sub>i</sub></code>
- There are no repeated edges.


**Hint:**
1. Find the connected components of an undirected graph using depth-first search (DFS) or breadth-first search (BFS).
2. For each connected component, count the number of nodes and edges in the component.
3. A connected component is complete if and only if the number of edges in the component is equal to `m*(m-1)/2`, where m is the number of nodes in the component.



**Solution:**

We need to count the number of complete connected components in an undirected graph. A complete connected component is one where every pair of vertices is connected by an edge.

### Approach
1. **Graph Representation**: Represent the graph using an adjacency list to facilitate traversal and a set to store edges for quick lookup.
2. **Connected Components Identification**: Use BFS (Breadth-First Search) to identify all connected components in the graph.
3. **Check Completeness**: For each connected component, check if it is complete by verifying if the number of edges in the component matches the number of edges required for a complete graph of that size. The required number of edges for a component with `m` nodes is `m*(m-1)/2`.

Let's implement this solution in PHP: **[2685. Count the Number of Complete Components](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002685-count-the-number-of-complete-components/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @return Integer
 */
function countCompleteComponents($n, $edges) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$n = 6;
$edges = [[0,1],[0,2],[1,2],[3,4]];
echo countCompleteComponents($n, $edges); // Output: 3

$n2 = 6;
$edges2 = [[0,1],[0,2],[1,2],[3,4],[3,5]];
echo countCompleteComponents($n2, $edges2); // Output: 1
?>
```

### Explanation:

1. **Graph Representation**: The graph is represented using an adjacency list `adj` for efficient traversal and a set `edgeSet` for quick edge existence checks.
2. **BFS for Connected Components**: For each unvisited node, BFS is used to explore all nodes in the connected component. This helps in collecting all nodes that form a connected component.
3. **Completeness Check**: For each component, the number of nodes `m` is determined. The required number of edges for a complete graph with `m` nodes is calculated. The actual number of edges in the component is counted by checking all possible pairs of nodes in the component against the edge set. If the actual count matches the required count, the component is complete.

This approach efficiently identifies and checks each connected component, ensuring the solution is both correct and optimal for the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
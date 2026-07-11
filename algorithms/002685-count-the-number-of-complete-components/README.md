2685\. Count the Number of Complete Components

**Difficulty:** Medium

**Topics:** `Staff`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Graph`, `Weekly Contest 345`

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

**Example 3:**

- **Input:**  n = 1, edges = []
- **Output:** 1

**Example 4:**

- **Input:**  n = 4, edges = [[0,1],[2,3]]
- **Output:** 2

**Example 5:**

- **Input:**  n = 4, edges = [[0,1],[0,2],[0,3],[1,2],[1,3],[2,3]]
- **Output:** 1

**Example 6:**

- **Input:**  n = 5, edges = []
- **Output:** 5

**Example 7:**

- **Input:**  n = 3, edges = [[0,1],[1,2]]
- **Output:** 0

**Example 8:**

- **Input:**  n = 5, edges = [[0,1],[0,2],[1,2],[3,4]]
- **Output:** 2



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


**Similar Questions:**
1. [323. Number of Connected Components in an Undirected Graph](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000323-number-of-connected-components-in-an-undirected-graph)



**Solution:**

We used an **adjacency list** to traverse the graph, found each connected component using **BFS**, and verified completeness by checking if the number of edges in the component equals the total possible edges for that many vertices.

### Approach

- Build an **undirected graph** using an adjacency list and store all edges in a set for **O(1)** edge lookup.
- Traverse all nodes, and for each **unvisited** node, perform **BFS** to collect all vertices in that connected component.
- For each component:
    - Count its vertices (`m`).
    - Count the actual edges inside it by checking every pair of vertices in the component.
    - If the actual edges equal `m * (m - 1) / 2` (maximum possible edges), it's a **complete** component.
- Return the count of complete components.

Let's implement this solution in PHP: **[2685. Count the Number of Complete Components](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002685-count-the-number-of-complete-components/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @return Integer
 */
function countCompleteComponents(int $n, array $edges): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo countCompleteComponents(6, [[0,1],[0,2],[1,2],[3,4]]);                         // Output: 3
echo countCompleteComponents(6, [[0,1],[0,2],[1,2],[3,4],[3,5]]);                   // Output: 1
echo countCompleteComponents(1, []);                                                // Output: 1
echo countCompleteComponents(4, [[0,1],[2,3]]);                                     // Output: 2
echo countCompleteComponents(4, [[0,1],[0,2],[0,3],[1,2],[1,3],[2,3]]);             // Output: 1
echo countCompleteComponents(5, []);                                                // Output: 5
echo countCompleteComponents(3, [[0,1],[1,2]]);                                     // Output: 0
echo countCompleteComponents(5, [[0,1],[0,2],[1,2],[3,4]]);                         // Output: 2
?>
```

### Explanation:

- **Graph Representation**
    - Used an adjacency list (`$adj`) for traversal.
    - Stored edges as a string key (e.g., `"0,1"`) in `$edgeSet` for quick edge existence checks.
- **Component Discovery**
    - Iterated over all nodes `0` to `n-1`.
    - For each unvisited node, initiated a **BFS** queue to discover its entire connected component.
- **Completeness Check**
    - For a component with `m` nodes, a complete graph requires exactly `m*(m-1)/2` edges.
    - Iterated over all unordered pairs inside the component using `$edgeSet` to count actual edges.
    - Compared actual edge count with the required number.
- **Isolated Vertex Handling**
    - A single vertex with no edges is trivially complete, so it is counted directly.
- **Result Accumulation**
    - Incremented the answer for each component that passed the completeness test.

## Complexity Analysis

- **Time Complexity:** `O(n + e + sum(m_i²))`
    - `O(n + e)` for BFS traversal across all nodes and edges.
    - `O(sum(m_i²))` for pair checks inside each component, where `m_i` is the component size.
    - In the worst case (one large component), this becomes `O(n²)`.
- **Space Complexity:** `O(n + e)`
    - For adjacency list, edge set, visited array, and BFS queue.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
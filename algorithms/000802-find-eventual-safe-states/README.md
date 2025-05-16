802\. Find Eventual Safe States

**Difficulty:** Medium

**Topics:** `Depth-First Search`, `Breadth-First Search`, `Graph`, `Topological Sort`

There is a directed graph of `n` nodes with each node labeled from `0` to `n - 1`. The graph is represented by a **0-indexed** 2D integer array `graph` where `graph[i]` is an integer array of nodes adjacent to node `i`, meaning there is an edge from node `i` to each node in `graph[i]`.

A node is a **terminal node** if there are no outgoing edges. A node is a **safe node** if every possible path starting from that node leads to a **terminal node** (or another safe node).

Return _an array containing all the **safe nodes** of the graph_. The answer should be sorted in **ascending** order.

**Example 1:**

![picture1](https://s3-lc-upload.s3.amazonaws.com/uploads/2018/03/17/picture1.png)

- **Input:** graph = [[1,2],[2,3],[5],[0],[5],[],[]]
- **Output:** [2,4,5,6]
- **Explanation:** The given graph is shown above.
  Nodes 5 and 6 are terminal nodes as there are no outgoing edges from either of them.
  Every path starting at nodes 2, 4, 5, and 6 all lead to either node 5 or 6.

**Example 2:**

- **Input:** graph = [[1,2,3,4],[1,2],[3,4],[0,4],[]]
- **Output:** [4]
- **Explanation:** Only node 4 is a terminal node, and every path starting at node 4 leads to node 4.



**Constraints:**

- `n == graph.length`
- <code>1 <= n <= 10<sup>4</sup></code>
- `0 <= graph[i].length <= n`
- `0 <= graph[i][j] <= n - 1`
- `graph[i]` is sorted in a strictly increasing order.
- The graph may contain self-loops.
- The number of edges in the graph will be in the range <code>[1, 4 * 10<sup>4</sup>]</code>.



**Solution:**

We need to identify all the safe nodes in the graph. This involves checking if starting from a given node, every path eventually reaches a terminal node or another safe node. The solution uses Depth-First Search (DFS) to detect cycles and classify nodes as safe or unsafe.

### Key Insights:

1. **Terminal Nodes**: A node with no outgoing edges is a terminal node.
2. **Safe Nodes**: A node is safe if, starting from that node, all paths eventually lead to terminal nodes or other safe nodes.
3. **Cycle Detection**: If a node is part of a cycle, it's not a safe node because paths starting from it won't lead to terminal nodes.

### Approach:

- We use DFS to explore each node and determine if it’s part of a cycle. Nodes that are part of cycles or lead to cycles are marked unsafe.
- Nodes that eventually lead to terminal nodes or other safe nodes are marked safe.

We use a `visited` array with three states:
- `0`: The node has not been visited yet.
- `1`: The node is currently being visited (i.e., in the recursion stack).
- `2`: The node has been fully processed and is safe.

### Steps:

1. Perform DFS for each node.
2. Use the visited states to mark safe/unsafe nodes.
3. Collect all the nodes that are safe.

Let's implement this solution in PHP: **[802. Find Eventual Safe States](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000802-find-eventual-safe-states/solution.php)**

```php
<?php
/**
 * @param Integer[][] $graph
 * @return Integer[]
 */
function eventualSafeNodes($graph) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * DFS helper function
 *
 * @param $node
 * @param $graph
 * @param $visited
 * @return int|mixed
 */
function dfs($node, $graph, &$visited) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$graph1 = [[1,2],[2,3],[5],[0],[5],[],[]];
$graph2 = [[1,2,3,4],[1,2],[3,4],[0,4],[]];

print_r(eventualSafeNodes($graph1)) . "\n"; // Output: [2,4,5,6]
print_r(eventualSafeNodes($graph2)) . "\n"; // Output: [4]
?>
```

### Explanation:

1. **DFS Function**:
   - The `dfs` function performs a depth-first search on the node, marking it as "visiting" (1) when it starts and "safe" (2) when all its neighbors are safe.
   - If any of its neighbors leads to a cycle (indicated by `dfs($neighbor) == 1`), the node is marked unsafe (1).
   - If all neighbors lead to terminal nodes or safe nodes, it is marked as safe (2).

2. **Main Function**:
   - We iterate through all the nodes and use DFS to check whether each node is safe or not.
   - All safe nodes are collected in the `$safeNodes` array and returned.

### Example Walkthrough:

#### Example 1:
```php
$graph = [[1,2],[2,3],[5],[0],[5],[],[]];
print_r(eventualSafeNodes($graph));
```

- In this example, nodes 5 and 6 are terminal nodes (no outgoing edges).
- Node 4 leads to node 5, so it is also safe.
- Node 2 leads to node 5, so it is safe.
- Nodes 1 and 0 eventually lead to a cycle or unsafe nodes, so they are not safe.

**Output:**
```
[2, 4, 5, 6]
```

#### Example 2:
```php
$graph = [[1,2,3,4],[1,2],[3,4],[0,4],[]];
print_r(eventualSafeNodes($graph));
```

- In this example, only node 4 is a terminal node, and all paths starting from node 4 lead to node 4.
- All other nodes eventually lead to cycles or unsafe nodes.

**Output:**
```
[4]
```

### Time and Space Complexity:

- **Time Complexity**: _**O(n + e)**_, where _**n**_ is the number of nodes and _**e**_ is the number of edges. We visit each node once and process each edge once.
- **Space Complexity**: _**O(n)**_ for the `visited` array and recursion stack.

This solution efficiently determines the safe nodes using DFS, ensuring that the problem constraints are met.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
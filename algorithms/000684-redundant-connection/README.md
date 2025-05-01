684\. Redundant Connection

**Difficulty:** Medium

**Topics:** `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Graph`

In this problem, a tree is an **undirected graph** that is connected and has no cycles.

You are given a graph that started as a tree with `n` nodes labeled from `1` to `n`, with one additional edge added. The added edge has two **different** vertices chosen from `1` to `n`, and was not an edge that already existed. The graph is represented as an array `edges` of length `n` where <code>edges[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> indicates that there is an edge between nodes <code>a<sub>i</sub></code> and <code>b<sub>i</sub></code> in the graph.

Return _an edge that can be removed so that the resulting graph is a tree of `n` nodes_. If there are multiple answers, return _the answer that occurs last in the input_.

**Example 1:**

![reduntant1-1-graph](https://assets.leetcode.com/uploads/2021/05/02/reduntant1-1-graph.jpg)

- **Input:** edges = [[1,2],[1,3],[2,3]]
- **Output:** [2,3]

**Example 2:**

![reduntant1-2-graph](https://assets.leetcode.com/uploads/2021/05/02/reduntant1-2-graph.jpg)

- **Input:** edges = [[1,2],[2,3],[3,4],[1,4],[1,5]]
- **Output:** [1,4]



**Constraints:**

- `n == edges.length`
- `3 <= n <= 1000`
- `edges[i].length == 2`
- <code>1 <= a<sub>i</sub> < b<sub>i</sub> <= edges.length</code>
- <code>a<sub>i</sub> != b<sub>i</sub></code>
- There are no repeated edges.
- The given graph is connected.



**Solution:**

The **Redundant Connection** problem asks us to identify an edge in a graph that can be removed to turn the graph into a valid tree. A tree is an undirected graph that is connected and acyclic. We are given a graph that started as a tree but was modified by adding one extra edge. Our goal is to find and return this extra edge.


### Key Points

1. The graph is **undirected** and **connected**.
2. The resulting graph after removing the redundant edge must have no cycles.
3. The answer should return the edge that appears **last** in the input, in case of multiple valid solutions.
4. The graph can have at most one cycle due to the single extra edge.


### Approach

The approach involves using **Depth-First Search (DFS)** to detect cycles:

1. **Adjacency List Representation**:
   - Use an adjacency list to represent the graph. This structure is suitable for performing DFS efficiently.

2. **Cycle Detection via DFS**:
   - Before adding an edge to the graph, use DFS to check if there is already a path between the two vertices of the edge. If there is, adding this edge would form a cycle.

3. **Returning the Edge**:
   - If a cycle is detected, return the current edge as the redundant connection.


### Plan

1. Parse the input edges.
2. Maintain an adjacency list to track the graph's connections dynamically.
3. For each edge:
   - Use a recursive DFS function to check if a path exists between the two vertices.
   - If a path exists, return the edge as the redundant connection.
   - Otherwise, add the edge to the adjacency list.
4. Return an empty result if no redundant edge is found (though this won't happen as per the problem constraints).

Let's implement this solution in PHP: **[684. Redundant Connection](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000684-redundant-connection/solution.php)**

```php
<?php
/**
 * @param Integer[][] $edges
 * @return Integer[]
 */
function findRedundantConnection($edges) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to perform DFS and check connectivity
 *
 * @param $src
 * @param $target
 * @param $visited
 * @param $adjList
 * @return bool
 */
private function isConnected($src, $target, &$visited, &$adjList) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$edges1 = [[1,2],[1,3],[2,3]];
$edges2 = [[1,2],[2,3],[3,4],[1,4],[1,5]];

print_r(findRedundantConnection($edges1)) . "\n"; // Output: [2,3]
print_r(findRedundantConnection($edges2)) . "\n"; // Output: [1,4]
?>
```

### Explanation:

1. **DFS Implementation**:
   - Start from one node and recursively visit its neighbors.
   - Use a `visited` array to avoid revisiting nodes.
   - If the target node is reached during the traversal, a path exists.

2. **Edge Addition**:
   - If no path exists between the vertices of the edge, add the edge to the adjacency list and proceed to the next edge.

3. **Redundant Edge**:
   - If a path already exists, return the current edge as it forms a cycle.


### Example Walkthrough

#### Example 1:
**Input**: `edges = [[1, 2], [1, 3], [2, 3]]`

**Steps**:
1. Initialize the adjacency list as `[]`.
2. Process the edges:
   - Add `[1, 2]` → Graph: `{1: [2], 2: [1]}`
   - Add `[1, 3]` → Graph: `{1: [2, 3], 2: [1], 3: [1]}`
   - Check `[2, 3]`: DFS finds a path → Return `[2, 3]`.

**Output**: `[2, 3]`

#### Example 2:
**Input**: `edges = [[1, 2], [2, 3], [3, 4], [1, 4], [1, 5]]`

**Steps**:
1. Initialize the adjacency list as `[]`.
2. Process the edges:
   - Add `[1, 2]` → Graph: `{1: [2], 2: [1]}`
   - Add `[2, 3]` → Graph: `{1: [2], 2: [1, 3], 3: [2]}`
   - Add `[3, 4]` → Graph: `{1: [2], 2: [1, 3], 3: [2, 4], 4: [3]}`
   - Check `[1, 4]`: DFS finds a path → Return `[1, 4]`.

**Output**: `[1, 4]`


### Time Complexity

1. **DFS Traversal**:
   - For each edge, we perform a DFS to check connectivity.
   - Worst case: _**O(V + E)**_, where _**V**_ is the number of vertices and _**E**_ is the number of edges.

2. **Total Complexity**:
   - Since we perform DFS for every edge, the overall complexity is _**O(E × (V + E))**_.

3. **Space Complexity**:
   - Adjacency list: _**O(V + E)**_.
   - Visited array: _**O(V)**_.
   - Total: _**O(V + E)**_.


### Output for Examples

#### Example 1:
**Input**: `[[1, 2], [1, 3], [2, 3]]`  
**Output**: `[2, 3]`

#### Example 2:
**Input**: `[[1, 2], [2, 3], [3, 4], [1, 4], [1, 5]]`  
**Output**: `[1, 4]`


The problem can be efficiently solved using a **DFS-based approach** to detect cycles. This method dynamically builds the graph and checks for redundant edges at each step. The solution ensures correctness by adhering to the problem constraints and outputs the edge that forms a cycle and occurs last in the input.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
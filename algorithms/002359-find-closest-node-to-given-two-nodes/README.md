2359\. Find Closest Node to Given Two Nodes

**Difficulty:** Medium

**Topics:** `Depth-First Search`, `Graph`

You are given a **directed** graph of `n` nodes numbered from `0` to `n - 1`, where each node has at **most one** outgoing edge.

The graph is represented with a given **0-indexed** array `edges` of size `n`, indicating that there is a directed edge from node `i` to node `edges[i]`. If there is no outgoing edge from `i`, then `edges[i] == -1`.

You are also given two integers `node1` and `node2`.

Return _the **index** of the node that can be reached from both `node1` and `node2`, such that the **maximum** between the distance from `node1` to that node, and from `node2` to that node is **minimized**_. If there are multiple answers, return the node with the **smallest** index, and if no possible answer exists, return `-1`.

Note that `edges` may contain cycles.

**Example 1:**

![graph4drawio-2](https://assets.leetcode.com/uploads/2022/06/07/graph4drawio-2.png)

- **Input:** edges = [2,2,3,-1], node1 = 0, node2 = 1
- **Output:** 2
- **Explanation:** The distance from node 0 to node 2 is 1, and the distance from node 1 to node 2 is 1.
  The maximum of those two distances is 1. It can be proven that we cannot get a node with a smaller maximum distance than 1, so we return node 2.

**Example 2:**

![graph4drawio-4](https://assets.leetcode.com/uploads/2022/06/07/graph4drawio-4.png)

- **Input:** edges = [1,2,-1], node1 = 0, node2 = 2
- **Output:** 2
- **Explanation:** The distance from node 0 to node 2 is 2, and the distance from node 2 to itself is 0.
  The maximum of those two distances is 2. It can be proven that we cannot get a node with a smaller maximum distance than 2, so we return node 2.



**Constraints:**

- `n == edges.length`
- <code>2 <= n <= 10<sup>5</sup></code>
- `-1 <= edges[i] < n`
- `edges[i] != i`
- `0 <= node1, node2 < n`


**Hint:**
1. How can you find the shortest distance from one node to all nodes in the graph?
2. Use BFS to find the shortest distance from both node1 and node2 to all nodes in the graph. Then iterate over all nodes, and find the node with the minimum max distance.



**Solution:**

We need to find the closest node in a directed graph that is reachable from two given nodes, `node1` and `node2`, such that the maximum of the distances from `node1` and `node2` to this node is minimized. If multiple nodes satisfy this condition, we return the smallest index among them. If no such node exists, we return `-1`.

### Approach
1. **Problem Analysis**: The graph is represented as a directed graph where each node has at most one outgoing edge. This structure simplifies traversal since each node leads to a unique path (or a cycle). The goal is to find a common node reachable from both `node1` and `node2` that minimizes the maximum of their distances to this node.
2. **Intuition**: For each node, we need the shortest distances from `node1` and `node2`. Given the graph's deterministic nature (each node has at most one outgoing edge), we can traverse the graph starting from each node to record distances to all reachable nodes. This avoids complex shortest-path algorithms like BFS for general graphs.
3. **Algorithm Selection**:
    - **Distance Calculation**: For each starting node (`node1` and `node2`), traverse the graph while recording the distance to each visited node. Stop when encountering a node already visited (indicating a cycle) or a node with no outgoing edge.
    - **Finding the Optimal Node**: Iterate through all nodes. For nodes reachable from both `node1` and `node2`, compute the maximum of their distances. Track the node with the smallest such maximum distance. If multiple nodes have the same minimized maximum distance, choose the smallest index.
4. **Complexity Analysis**:
    - **Time Complexity**: O(n), where n is the number of nodes. Each traversal processes each node at most once, and the final iteration is linear.
    - **Space Complexity**: O(n) for storing distances from `node1` and `node2`.

Let's implement this solution in PHP: **[2359. Find Closest Node to Given Two Nodes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002359-find-closest-node-to-given-two-nodes/solution.php)**

```php
<?php
/**
 * @param Integer[] $edges
 * @param Integer $node1
 * @param Integer $node2
 * @return Integer
 */
function closestMeetingNode($edges, $node1, $node2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$edges = [2, 2, 3, -1];
$node1 = 0;
$node2 = 1;
echo closestMeetingNode($edges, $node1, $node2) . "\n"; // Output: 2

// Example 2
$edges = [1, 2, -1];
$node1 = 0;
$node2 = 2;
echo closestMeetingNode($edges, $node1, $node2) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Initialization**: Two distance arrays, `dist1` and `dist2`, are initialized to `-1` (indicating unreachable nodes) for all nodes.
2. **Traversal from `node1`**: Starting at `node1`, traverse the graph, recording the distance to each node encountered. Stop if a node is revisited (cycle detected) or no outgoing edge exists.
3. **Traversal from `node2`**: Repeat the same process starting from `node2`.
4. **Finding Optimal Node**: For each node, if it is reachable from both `node1` and `node2`, compute the maximum of the two distances. Track the node with the smallest such maximum distance. If multiple nodes have the same minimized maximum, the smallest index is chosen.
5. **Result**: Return the optimal node or `-1` if no common reachable node exists.

This approach efficiently leverages the graph's deterministic structure to compute distances and find the optimal meeting node with minimal computational overhead.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
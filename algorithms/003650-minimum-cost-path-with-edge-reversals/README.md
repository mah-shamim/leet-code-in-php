3650\. Minimum Cost Path with Edge Reversals

**Difficulty:** Medium

**Topics:** `Graph Theory`, `Heap (Priority Queue)`, `Shortest Path`, `Biweekly Contest 163`

You are given a directed, weighted graph with `n` nodes labeled from `0` to `n - 1`, and an array `edges` where `edges[i] = [uᵢ, vᵢ, wᵢ]` represents a directed edge from node `uᵢ` to node `vᵢ` with cost `wᵢ`.

Each node `uᵢ` has a switch that can be used **at most once**: when you arrive at `uᵢ` and have not yet used its switch, you may activate it on one of its incoming edges `vᵢ → uᵢ` reverse that edge to `uᵢ → vᵢ` and **immediately** traverse it.

The reversal is only valid for that single move, and using a reversed edge costs `2 * wᵢ`.

Return the **minimum** total cost to travel from node 0 to node `n - 1`. If it is not possible, return `-1`.

**Example 1:**

- **Input:** n = 4, edges = [[0,1,3],[3,1,1],[2,3,4],[0,2,2]]
- **Output:** 5
- **Explanation:**

   ![e1drawio](https://assets.leetcode.com/uploads/2025/05/07/e1drawio.png)
  - Use the path `0 → 1` (cost 3).
  - At node 1 reverse the original edge `3 → 1` into `1 → 3` and traverse it at cost `2 * 1 = 2`.
  - Total cost is `3 + 2 = 5`.


**Example 2:**

- **Input:** n = 4, edges = [[0,2,1],[2,1,1],[1,3,1],[2,3,3]]
- **Output:** 3
- **Explanation:**
  - No reversal is needed. Take the path `0 → 2` (cost 1), then `2 → 1` (cost 1), then `1 → 3` (cost 1).
  - Total cost is `1 + 1 + 1 = 3`.


**Constraints:**

- `2 <= n <= 5 * 10⁴`
- `1 <= edges.length <= 10⁵`
- `edges[i] = [uᵢ, vᵢ, wᵢ]`
- `0 <= uᵢ, vᵢ <= n - 1`
- `1 <= wᵢ <= 1000`



**Hint:**
1. Do we only need to reverse at most one edge for each node? If so, can we add reversed edges for each node and use the one that helps in the shortest path?
2. Add reverse edges: `{u, v, w}` -> `{v, u, 2 * w}`, and use Dijkstra.


**Similar Questions:**
1. [1928. Minimum Cost to Reach Destination in Time](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001928-minimum-cost-to-reach-destination-in-time)






**Solution:**

We need to find the shortest path from node 0 to node n-1 in a directed graph where at each node, we can optionally reverse one incoming edge to use as an outgoing edge with doubled weight. This is essentially a graph problem where we need to consider both original edges and "reversed" edges.

### Approach:

- **Graph modeling**: Create two adjacency lists:
    1. Standard adjacency list for outgoing edges
    2. Reverse adjacency list storing incoming edges (for potential reversal)

- **State representation**: Each node has two states: with switch used or not. We maintain a visited dictionary keyed by `node_switchState`.

- **Modified Dijkstra's algorithm**: Use a priority queue to explore states, where each state is `(cost, node, usedSwitchAtNode)`.

- **Transition rules**:
    - From any state, we can traverse outgoing edges normally
    - If we haven't used the switch at the current node, we can reverse any incoming edge (traverse it backward with double cost)

- **Termination**: Return the cost when we first reach node `n-1`.

Let's implement this solution in PHP: **[3650. Minimum Cost Path with Edge Reversals](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003650-minimum-cost-path-with-edge-reversals/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @return Integer
 */
function minCost(int $n, array $edges): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minCost([1, 2, 3, 10, 4, 2, 3, 5]) . "\n"; // Output: 3
echo minCost([5, 4, 3, 2, 1]) . "\n";           // Output: 4
echo minCost([1, 2, 3]) . "\n";                 // Output: 0
?>
```

### Explanation:

1. **Graph Construction**:
    - Build `adj` for normal edges: `u → v` with weight `w`
    - Build `reverseAdj` for incoming edges: store `(v, w)` for each `v → u`

2. **State Space**:
    - Each node can be visited in two states: `(node, false)` or `(node, true)`
    - `false` means we haven't used the switch at this node yet
    - `true` means we've already used the switch at this node

3. **Algorithm Execution**:
    - Start from `(0, false)` with cost 0
    - While priority queue is not empty:
        - If current node is destination `n-1`, return cost (Dijkstra guarantees minimality)
        - Skip if state already visited
        - Mark current state as visited
        - **Normal transitions**: For each outgoing edge, traverse normally
        - **Switch transitions**: If switch not used at current node, reverse each incoming edge with cost `2 × weight`

4. **Optimizations**:
    - Use priority queue (min-heap) for efficient shortest path search
    - Track visited states to avoid cycles
    - Early termination when destination is reached

5. **Edge Cases**:
    - Return `-1` if destination is unreachable
    - Handle cases where no reversal is needed (Example 2)
    - The algorithm naturally handles multiple potential reversals by exploring all possibilities

### Complexity
- **Time Complexity**: `O((V + E) log V)` where `V = n` and `E = edges.length`
- **Space Complexity**: `O(V + E)` for adjacency lists and priority queue

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
3620\. Network Recovery Pathways

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Binary Search`, `Dynamic Programming`, `Graph Theory`, `Topological Sort`, `Heap (Priority Queue)`, `Shortest Path`, `Biweekly Contest 161`

You are given a directed acyclic graph of `n` nodes numbered from 0 to `n − 1`. This is represented by a 2D array `edges` of length `m`, where `edges[i] = [uᵢ, vᵢ, costᵢ]` indicates a one‑way communication from node `uᵢ` to node `vᵢ` with a recovery cost of `costᵢ`.

Some nodes may be offline. You are given a boolean array `online` where` online[i] = true` means node `i` is online. Nodes 0 and `n − 1` are always online.

A path from 0 to `n − 1` is **valid** if:

- All intermediate nodes on the path are online.
- The total recovery cost of all edges on the path does not exceed `k`.

For each valid path, define its **score** as the minimum edge‑cost along that path.

Return the **maximum** path score (i.e., the largest **minimum**-edge cost) among all valid paths. If no valid path exists, return -1.

**Example 1:**

- **Input:** edges = [[0,1,5],[1,3,10],[0,2,3],[2,3,4]], online = [true,true,true,true], k = 10
- **Output:** [0,1]
- **Explanation:**
   ![graph-10](https://assets.leetcode.com/uploads/2025/06/06/graph-10.png)
    - The graph has two possible routes from node 0 to node 3:
        1. Path `0 → 1 → 3`
            - Total cost = `5 + 10 = 15`, which exceeds k (`15 > 10`), so this path is invalid.
        2. Path `0 → 2 → 3`
            - Total cost = `3 + 4 = 7 <= k`, so this path is valid.
            - The minimum edge‐cost along this path is `min(3, 4) = 3`.
    - There are no other valid paths. Hence, the maximum among all valid path‐scores is 3.


**Example 2:**

- **Input:** edges = [[0,1,7],[1,4,5],[0,2,6],[2,3,6],[3,4,2],[2,4,6]], online = [true,true,true,false,true], k = 12
- **Output:** 6
- **Explanation:**
   ![graph-11](https://assets.leetcode.com/uploads/2025/06/06/graph-11.png)
    - Node 3 is offline, so any path passing through 3 is invalid.
    - Consider the remaining routes from 0 to 4:
        1. Path `0 → 1 → 4`
            - Total cost = `7 + 5 = 12 <= k`, so this path is valid.
            - The minimum edge‐cost along this path is `min(7, 5) = 5`.
        2. Path `0 → 2 → 3 → 4`
            - Node 3 is offline, so this path is invalid regardless of cost.
        3. Path `0 → 2 → 4`
            - Total cost = `6 + 6 = 12 <= k`, so this path is valid.
            - The minimum edge‐cost along this path is `min(6, 6) = 6`.
    - Among the two valid paths, their scores are 5 and 6. Therefore, the answer is 6.

**Constraints:**

- `n == online.length`
- `2 <= n <= 5 * 10⁴`
- `0 <= m == edges.length <= min(10⁵, n * (n - 1) / 2)`
- `edges[i] = [uᵢ, vᵢ, costᵢ]`
- `0 <= uᵢ, vᵢ < n`
- `uᵢ != vᵢ`
- `0 <= costᵢ <= 10⁹`
- `0 <= k <= 5 * 10¹³`
- `online[i]` is either `true` or `false`, and both `online[0]` and `online[n − 1]` are `true`.
- The given graph is a directed acyclic graph.


**Hint:**
1. Use binary search on `ans`.
2. Check if a particular `ans` is possible by including only the edges with weights ≥ `mid` (the current binary‐search pivot).
3. Implement the check function using either `Dijkstra` or DP (via topological sorting, since the graph is a DAG).


**Solution:**

We approached this problem by recognizing that it requires finding the maximum possible minimum edge weight along any valid path from source to destination, subject to total cost constraints and node availability. Our solution employs a binary search on the answer combined with a feasibility check using topological sorting and dynamic programming, leveraging the DAG property of the graph for efficient computation.

## Approach

- **Binary Search Strategy**: Since we need to find the maximum possible "minimum edge cost" (score), we binary search over the range of possible edge costs (0 to maximum edge cost) to find the largest value that can be achieved by some valid path.
- **Feasibility Check (canAchieve)**: For a given minimum edge threshold, we filter edges to only those with cost ≥ threshold. Then we compute the minimum total path cost from node 0 to node n-1 using only these high-cost edges, while also ensuring all intermediate nodes are online.
- **Topological Order Preprocessing**: Since the graph is a DAG, we compute the topological order once. This allows us to perform DP in linear time for each feasibility check, avoiding the overhead of Dijkstra or repeated sorting.
- **DP for Minimum Total Cost**: Using the topological order, we compute the minimum cumulative cost to reach each node. If the minimum cost to reach node n-1 does not exceed k, then there exists a valid path with all edges ≥ threshold.

Let's implement this solution in PHP: **[3620. Network Recovery Pathways](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003620-network-recovery-pathways/solution.php)**

```php
<?php
/**
 * @param Integer[][] $edges
 * @param Boolean[] $online
 * @param Integer $k
 * @return Integer
 */
function findMaxPathScore(array $edges, array $online, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $minCost
 * @param $edges
 * @param $online
 * @param $k
 * @param $n
 * @param $topo
 * @return bool
 */
function canAchieve($minCost, $edges, $online, $k, $n, $topo): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findMaxPathScore([[0,1,5],[1,3,10],[0,2,3],[2,3,4]], [true,true,true,true], 10) .  "\n";                           // Output: 3
echo findMaxPathScore([[0,1,7],[1,4,5],[0,2,6],[2,3,6],[3,4,2],[2,4,6]], [true,true,true,false,true], 12) .  "\n";      // Output: 6
?>
```

### Explanation:

- **Binary Search Initialization**: We set `low = 0` and `high = maxCost` (the maximum edge cost in the graph). The answer is initialized to -1 (no valid path found yet).
- **Edge Filtering in Feasibility Check**: For a given mid value, we only consider edges where `cost >= mid`. This ensures that any path found using these edges will have a minimum edge cost of at least mid.
- **Node Validity Check**: We require both endpoints of any edge to be online (except source and destination which are guaranteed online). This ensures paths don't pass through offline nodes.
- **DP Recurrence**: For each node u in topological order, if we can reach u with some total cost, we relax all outgoing edges to v:
  ```
  dp[v] = min(dp[v], dp[u] + cost)
  ```
  This works because in a DAG, when processing in topological order, all predecessors of a node have been processed before the node itself.
- **Feasibility Decision**: If `dp[n-1] <= k`, then there exists a valid path with all edges ≥ mid and total cost ≤ k, so mid is achievable. We then try to increase mid.
- **Binary Search Termination**: The search continues until low > high, at which point answer holds the maximum achievable score. If no valid path exists (answer remains -1), we return -1.

## Complexity Analysis

- **Time Complexity**: _**O((n + m) * log(maxCost))**_
   - Preprocessing topological sort: _**O(n + m)**_
   - Each feasibility check: _**O(n + m)**_ for filtering edges and DP
   - Binary search iterations: _**O(log(maxCost))**_ where _**maxCost ≤ 10⁹**_
   - Total: _**O((n + m) * log(maxCost))**_

- **Space Complexity**: _**O(n + m)**_
   - Graph adjacency storage: _**O(n + m)**_
   - DP array and auxiliary structures: _**O(n)**_
   - Topological order storage: _**O(n)**_

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
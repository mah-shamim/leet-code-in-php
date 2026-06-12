3559\. Number of Ways to Assign Edge Weights II

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Math`, `Dynamic Programming`, `Bit Manipulation`, `Tree`, `Depth-First Search`, `Biweekly Contest 157`

There is an undirected tree with `n` nodes labeled from 1 to `n`, rooted at node 1. The tree is represented by a 2D integer array `edges` of length `n - 1`, where `edges[i] = [uᵢ, vᵢ]` indicates that there is an edge between nodes `uᵢ` and `vᵢ`.

Initially, all edges have a weight of 0. You must assign each edge a weight of either **1** or **2**.

The cost of a path between any two nodes `u` and `v` is the total weight of all edges in the path connecting them.

You are given a 2D integer array `queries`. For each `queries[i] = [uᵢ, vᵢ]`, determine the number of ways to assign weights to edges **in the path** such that the cost of the path between `uᵢ` and `vᵢ` is **odd**.

Return an array `answer`, where `answer[i]` is the number of valid assignments for `queries[i]`.

Since the answer may be large, apply **modulo** `10⁹ + 7` to each `answer[i]`.

**Note:** For each query, disregard all edges **not** in the path between node `uᵢ` and `vᵢ`.

**Example 1:**

![screenshot-2025-03-24-at-060006](https://assets.leetcode.com/uploads/2025/03/23/screenshot-2025-03-24-at-060006.png)

- **Input:** edges = [[1,2]], queries = [[1,1],[1,2]]
- **Output:** [0,1]
- **Explanation:**
  - Query `[1,1]`: The path from Node 1 to itself consists of no edges, so the cost is 0. Thus, the number of valid assignments is 0.
  - Query `[1,2]`: The path from Node 1 to Node 2 consists of one edge (`1 → 2`). Assigning weight 1 makes the cost odd, while 2 makes it even. Thus, the number of valid assignments is 1.


**Example 2:**

![screenshot-2025-03-24-at-055820](https://assets.leetcode.com/uploads/2025/03/23/screenshot-2025-03-24-at-055820.png)

- **Input:** edges = [[1,2],[1,3],[3,4],[3,5]], queries = [[1,4],[3,4],[2,5]]
- **Output:** [2,1,4]
- **Explanation:**
  - Query `[1,4]`: The path from Node 1 to Node 4 consists of two edges (`1 → 3` and `3 → 4`). Assigning weights (1,2) or (2,1) results in an odd cost. Thus, the number of valid assignments is 2.
  - Query `[3,4]`: The path from Node 3 to Node 4 consists of one edge (`3 → 4`). Assigning weight 1 makes the cost odd, while 2 makes it even. Thus, the number of valid assignments is 1.
  - Query `[2,5]`: The path from Node 2 to Node 5 consists of three edges (`2 → 1, 1 → 3`, and `3 → 5`). Assigning (1,2,2), (2,1,2), (2,2,1), or (1,1,1) makes the cost odd. Thus, the number of valid assignments is 4.


**Constraints:**

- `2 <= n <= 10⁵`
- `edges.length == n - 1`
- `edges[i] == [uᵢ, vᵢ]`
- `1 <= queries.length <= 10⁵`
- `queries[i] == [uᵢ, vᵢ]`
- `1 <= uᵢ, vᵢ <= n`
- `edges` represents a valid tree.



**Hint:**
1. Dynamic programming with states `chainLength` and `sumParity`.
2. Use Lowest Common Ancestor to find the distance between any two nodes quickly in `O(logn)`.






**Solution:**

The problem asks: given a tree where each edge can be weighted **1** or **2**, for each query `(u, v)`, count the number of weight assignments to the edges **only on the path from u to v** such that the total cost of that path is **odd**.

The key observation is that if a path has `k` edges, then each edge contributes either 1 or 2 to the sum. The sum is odd if the number of edges with weight 1 is odd. So, for `k` edges, the number of ways to choose an odd number of them to be 1 is:

- If `k > 0`, the number of ways = `2⁽ᵏ⁻¹⁾`.
- If `k = 0` (u == v), the answer is 0.

Thus, the problem reduces to:
1. Find the distance `k` (number of edges) between u and v.
2. If `k == 0`, answer 0.
3. Else, answer `2⁽ᵏ⁻¹⁾ mod (10⁹+7)`.

We use **LCA (Lowest Common Ancestor)** to find the distance efficiently.

### Approach:

- **Observation** For a path with `k` edges, there are `2ᵏ` total assignments. Exactly half of them (if `k>0`) have an odd sum because flipping any one weight changes parity. So count = `2⁽ᵏ⁻¹⁾`.
- **Distance in tree** Distance between u and v in a tree = `depth[u] + depth[v] - 2*depth[lca(u,v)]`.
- **LCA using binary lifting** Preprocess parents up to `log(n)` levels so that LCA queries are O(log n).
- **Power modulo** Compute `2⁽ᵏ⁻¹⁾ mod MOD` using fast exponentiation.
- **Special case** If u == v, distance = 0, answer = 0.

Let's implement this solution in PHP: **[3559. Number of Ways to Assign Edge Weights II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003559-number-of-ways-to-assign-edge-weights-ii/solution.php)**

```php
<?php
/**
 * @param Integer[][] $edges
 * @param Integer[][] $queries
 * @return Integer[]
 */
function assignEdgeWeights(array $edges, array $queries): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $u
 * @param $p
 * @param $graph
 * @param $parent
 * @param $depth
 * @param $d
 * @return void
 */
private function dfs($u, $p, &$graph, &$parent, &$depth, $d): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $u
 * @param $v
 * @param $parent
 * @param $depth
 * @param $LOG
 * @return mixed
 */
function lca($u, $v, &$parent, &$depth, $LOG): mixed
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $x
 * @param $n
 * @return int
 */
function modPow($x, $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo assignEdgeWeights([[1,2]], [[1,1],[1,2]]) . "\n";                              // Output: [0,1]
echo assignEdgeWeights([[1,2],[1,3],[3,4],[3,5]], [[1,4],[3,4],[2,5]]) . "\n";      // Output: [2,1,4]
?>
```

### Explanation:

- **DFS preprocessing**  
  - First DFS sets depth of each node and immediate parent.  
  - Then build binary lifting table: `parent[k][v]` = 2ᵏ-th ancestor of v.
- **LCA function**  
  - Step 1: Bring both nodes to same depth.  
  - Step 2: If they are the same, return.  
  - Step 3: Lift both up together until just below LCA, then return parent.
- **Answer per query** Compute distance `dist`. If `dist == 0`, output 0. Else output `2⁽ᵈᶦˢᵗ⁻¹⁾ mod MOD`.
- **ModPow** Recursive modular exponentiation ensures result fits in modulo space.

### Complexity
- **Time Complexity**:
   - Preprocessing DFS: O(n)
   - Binary lifting table: O(n log n)
   - Each query: O(log n)
   - Total: O(n log n + q log n)  
     → Efficient for `n, q ≤ 1e5`.
- **Space Complexity**:
   - O(n log n) for binary lifting table
   - O(n) for depth and adjacency list

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
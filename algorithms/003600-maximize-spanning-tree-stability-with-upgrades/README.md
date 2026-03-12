3600\. Maximize Spanning Tree Stability with Upgrades

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Binary Search`, `Greedy`, `Union-Find`, `Graph Theory`, `Minimum Spanning Tree`, `Weekly Contest 456`

You are given an integer `n`, representing `n` nodes numbered from 0 to `n - 1` and a list of `edges`, where `edges[i] = [uᵢ, vᵢ, sᵢ, mustᵢ]`:

- `uᵢ` and `vᵢ` indicates an undirected edge between nodes `uᵢ` and `vᵢ`.
- `sᵢ` is the strength of the edge.
- `mustᵢ` is an integer (0 or 1). If `mustᵢ == 1`, the edge **must** be included in the **spanning tree**. These edges **cannot** be **upgraded**.

You are also given an integer `k`, the **maximum** number of upgrades you can perform. Each upgrade **doubles** the strength of an edge, and each eligible edge (with `mustᵢ == 0`) can be upgraded **at most** once.

The **stability** of a spanning tree is defined as the **minimum** strength score among all edges included in it.

Return the **maximum** possible stability of any valid spanning tree. If it is impossible to connect all nodes, return `-1`.

**Note**: A **spanning tree** of a graph with `n` nodes is a subset of the edges that connects all nodes together (i.e. the graph is **connected**) without forming any cycles, and uses **exactly** `n - 1` edges.

**Example 1:**

- **Input:** n = 3, edges = [[0,1,2,1],[1,2,3,0]], k = 1
- **Output:** 2
- **Explanation:**
  - Edge `[0,1]` with strength = 2 must be included in the spanning tree.
  - Edge `[1,2]` is optional and can be upgraded from 3 to 6 using one upgrade.
  - The resulting spanning tree includes these two edges with strengths 2 and 6.
  - The minimum strength in the spanning tree is 2, which is the maximum possible stability.


**Example 2:**

- **Input:** n = 3, edges = [[0,1,4,0],[1,2,3,0],[0,2,1,0]], k = 2
- **Output:** 6
- **Explanation:**
  - Since all edges are optional and up to `k = 2` upgrades are allowed.
  - Upgrade edges `[0,1]` from 4 to 8 and `[1,2]` from 3 to 6.
  - The resulting spanning tree includes these two edges with strengths 8 and 6.
  - The minimum strength in the tree is 6, which is the maximum possible stability.


**Example 3:**

- **Input:** n = 3, edges = [[0,1,1,1],[1,2,1,1],[2,0,1,1]], k = 0
- **Output:** -1
- **Explanation:** All edges are mandatory and form a cycle, which violates the spanning tree property of acyclicity. Thus, the answer is -1.

**Constraints:**

- `2 <= n <= 10⁵`
- `1 <= edges.length <= 10⁵`
- `edges[i] = [uᵢ, vᵢ, sᵢ, mustᵢ]`
- `0 <= uᵢ, vᵢ < n`
- `uᵢ != vᵢ`
- `1 <= sᵢ <= 10⁵`
- `mustᵢ` is either `0` or `1`.
- `0 <= k <= n`
- There are no duplicate edges.



**Hint:**
1. Sort the `edges` array in descending order of weights.
2. Try using binary search on `ans`.
3. Implement a `chk` function which first adds all the edges with `must = 1`, and then adds the edges with `must = 0`, using any remaining upgrades greedily.
4. Use a `DSU` with path compression and union by size/rank to maintain connected components.
5. Don't forget the case where you cannot form an MST because more than one component remains after processing all edges.






**Solution:**

We need to find the maximum possible *stability* (minimum edge strength) of a spanning tree over `n` nodes, given edges that may be mandatory (`must = 1`) and a budget `k` of upgrades that double the strength of optional edges. The solution uses **binary search** on the target stability value and a **Union‑Find (DSU)** data structure to test feasibility efficiently. It first enforces mandatory edges, then greedily adds optional edges that already meet the threshold, and finally applies upgrades to remaining optional edges that can reach the threshold. If all nodes become connected without exceeding `k` upgrades, the threshold is feasible.

### Approach:

- **Binary search** on the answer `T` (stability) in the range `[1, 2 * max(s_i)]`.
- For each candidate `T`, define a **check function** that returns whether a spanning tree with stability ≥ `T` exists:
   1. Initialize DSU with `n` nodes.
   2. Process all **mandatory** edges:
      - If any has strength `< T`, fail immediately.
      - Otherwise, union its endpoints. If a cycle is formed (union returns false), also fail (a spanning tree cannot contain a cycle).
   3. Process **optional** edges that already have strength ≥ `T` (no upgrade needed): union them if they connect different components.
   4. Process optional edges that can reach strength ≥ `T` **after one upgrade** (i.e. `2 * s_i ≥ T`): try to union them, counting each successful union as one upgrade. If the count exceeds `k`, fail.
   5. After all edges, if the graph is connected (exactly one component), return true; otherwise false.
- Perform binary search to find the largest `T` for which `check(T)` is true. If no feasible tree exists at all, return -1.

Let's implement this solution in PHP: **[3600. Maximize Spanning Tree Stability with Upgrades](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003600-maximize-spanning-tree-stability-with-upgrades/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @param Integer $k
 * @return Integer
 */
function maxStability(int $n, array $edges, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

class DSU {
    private array $parent;
    private array $size;

    /**
     * @param $n
     */
    public function __construct($n) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $x
     * @return mixed
     */
    public function find($x): mixed
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
     * @param $y
     * @return bool
     */
    public function union($x, $y): bool
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Test cases
echo maxStability(3, [[0,1,2,1],[1,2,3,0]], 1) . "\n";                      // Output: 2
echo maxStability(3, [[0,1,4,0],[1,2,3,0],[0,2,1,0]], 2) . "\n";            // Output: 6
echo maxStability(3, [[0,1,1,1],[1,2,1,1],[2,0,1,1]], 0) . "\n";            // Output: -1
?>
```

### Explanation:

- **Why binary search?** Stability is the minimum edge strength in the tree. If we can achieve stability `T`, we can also achieve any lower value (by ignoring some upgrades). This monotonicity allows binary search.
- **Handling mandatory edges:** They must appear in the tree, so they must already satisfy `T` and they must not create cycles (otherwise no spanning tree is possible).
- **Greedy use of optional edges:**
   - Edges that already meet `T` are used first because they cost no upgrades and can only help connectivity.
   - Edges that need an upgrade are considered only if they connect different components; we apply upgrades as needed, respecting the budget `k`.
- **Union‑Find** tracks connectivity efficiently and detects cycles.
- **Edge cases:**
   - If mandatory edges alone already form a cycle, the answer is -1.
   - If after processing all edges the graph is still disconnected, the candidate `T` is infeasible.
   - If no feasible stability exists at all (e.g., mandatory edges disconnect the graph), binary search will return -1.

### Complexity
- **Time Complexity:**
   - Sorting edges is not required – we only filter by strength during each check.
   - Each `check` runs in `O((n + m) * α(n))` due to DSU operations, where `m` is the number of edges.
   - Binary search performs `O(log(2 * maxStrength)) ≈ O(log(max(s)))` checks.
   - Total: `O((n + m) * α(n) * log(max(s)))` – efficient for `n, m ≤ 10⁵`.
- **Space Complexity:** _**O(n)**_, for DSU arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
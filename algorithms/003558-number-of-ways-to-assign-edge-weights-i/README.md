3558\. Number of Ways to Assign Edge Weights I

**Difficulty:** Medium

**Topics:** `Staff`, `Math`, `Tree`, `Depth-First Search`, `Biweekly Contest 157`

There is an undirected tree with `n` nodes labeled from 1 to `n`, rooted at node 1. The tree is represented by a 2D integer array `edges` of length `n - 1`, where `edges[i] = [uᵢ, vᵢ]` indicates that there is an edge between nodes `uᵢ` and `vᵢ`.

Initially, all edges have a weight of 0. You must assign each edge a weight of either **1** or **2**.

The **cost** of a path between any two nodes `u` and `v` is the total weight of all edges in the path connecting them.

Select any one node `x` at the **maximum** depth. Return the number of ways to assign edge weights in the path from node 1 to `x` such that its total cost is **odd**.

Since the answer may be large, return it **modulo** `10⁹ + 7`.

`Note:` Ignore all edges `not` in the path from node 1 to `x`.

**Example 1:**

![screenshot-2025-03-24-at-060006](https://assets.leetcode.com/uploads/2025/03/23/screenshot-2025-03-24-at-060006.png)

- **Input:** edges = [[1,2]]
- **Output:** 1
- **Explanation:**
  - The path from Node 1 to Node 2 consists of one edge (`1 → 2`).
  - Assigning weight 1 makes the cost odd, while 2 makes it even. Thus, the number of valid assignments is 1.


**Example 2:**

![screenshot-2025-03-24-at-055820](https://assets.leetcode.com/uploads/2025/03/23/screenshot-2025-03-24-at-055820.png)

- **Input:** edges = [[1,2],[1,3],[3,4],[3,5]]
- **Output:** 2
- **Explanation:**
  - The maximum depth is 2, with nodes 4 and 5 at the same depth. Either node can be selected for processing.
  - For example, the path from Node 1 to Node 4 consists of two edges (`1 → 3` and `3 → 4`).
  - Assigning weights (1,2) or (2,1) results in an odd cost. Thus, the number of valid assignments is 2.


**Example 3:**

- **Input:** edges = [[1,2],[2,3],[3,4]]
- **Output:** 4

**Constraints:**

- `2 <= n <= 10⁵`
- `edges.length == n - 1`
- `edges[i] == [uᵢ, vᵢ]`
- `1 <= uᵢ, vᵢ <= n`
- `edges` represents a valid tree.



**Hint:**
1. Depth‑First Search (DFS) to compute the depth of each node from the root.
2. Find the maximum depth, `max_depth`.
3. The number of `2`s doesn’t affect parity; we only need an odd number of `1`s along the path.
4. The number of ways to choose an odd count of 1s among `max_depth` edges is `2⁽ᵐᵃˣ_ᵈᵉᵖᵗʰ⁻¹⁾`.






**Solution:**

The problem asks for the number of ways to assign weights (1 or 2) to the edges along the path from the root (node 1) to a deepest node (maximum depth) so that the **total cost** of that path is **odd**.  
The key observation is that the parity of the total cost depends only on the number of edges assigned weight **1** (odd number of 1s → odd cost). Therefore, the answer is simply the number of ways to choose an odd number of edges from the total `maxDepth` edges to be weight 1, which is **2⁽ᵐᵃˣᴰᵉᵖᵗʰ−¹⁾**.

### Approach:

- **Step 1:** Build an adjacency list from the given edges.
- **Step 2:** Perform a DFS from node 1 to find the **maximum depth** of any node in the tree.
- **Step 3:** Use the combinatorial insight: among `maxDepth` edges, if we choose an odd number of them to be weight 1 (and the rest weight 2), the total cost will be odd. The number of such choices is exactly half of all possible assignments → `2⁽ᵐᵃˣᴰᵉᵖᵗʰ−¹⁾`.
- **Step 4:** Return the result modulo `10⁹ + 7`.

Let's implement this solution in PHP: **[3558. Number of Ways to Assign Edge Weights I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003558-number-of-ways-to-assign-edge-weights-i/solution.php)**

```php
<?php
/**
 * @param Integer[][] $edges
 * @return Integer
 */
function assignEdgeWeights(array $edges): int
{
    $n = count($edges) + 1;
    $adj = array_fill(0, $n + 1, []);

    foreach ($edges as $edge) {
        $u = $edge[0];
        $v = $edge[1];
        $adj[$u][] = $v;
        $adj[$v][] = $u;
    }

    $maxDepth = 0;

    dfs(1, -1, 0, $adj, $maxDepth);

    $mod = 1000000007;
    return powMod(2, $maxDepth - 1, $mod);
}

/**
 * @param $node
 * @param $parent
 * @param $depth
 * @param $adj
 * @param $maxDepth
 * @return void
 */
function dfs($node, $parent, $depth, &$adj, &$maxDepth): void
{
    $maxDepth = max($maxDepth, $depth);
    foreach ($adj[$node] as $neighbor) {
        if ($neighbor != $parent) {
            dfs($neighbor, $node, $depth + 1, $adj, $maxDepth);
        }
    }
}

/**
 * @param $base
 * @param $exp
 * @param $mod
 * @return int
 */
function powMod($base, $exp, $mod): int
{
    $result = 1;
    while ($exp > 0) {
        if ($exp % 2 == 1) {
            $result = ($result * $base) % $mod;
        }
        $base = ($base * $base) % $mod;
        $exp = intdiv($exp, 2);
    }
    return $result;
}

// Test cases
echo assignEdgeWeights([[1,2]]) . "\n";                             // Output: 1
echo assignEdgeWeights([[1,2],[1,3],[3,4],[3,5]]) . "\n";           // Output: 2
echo assignEdgeWeights([[1,2],[2,3],[3,4]]) . "\n";                 // Output: 4
?>
```

### Explanation:

- **Parity observation:**  
  - Weight 2 is even, so it doesn’t affect parity.  
  - Weight 1 is odd, so the total cost is odd iff the count of weight-1 edges along the path is odd.
- **Counting odd selections:**  
  - For `m` edges, total assignments = 2ᵐ.  
  - Half of these have an odd number of 1s (by symmetry in binary sequences), so number with odd count = 2ᵐ⁻¹.
- **Tree depth:**  
  - The path from root to a deepest node has length = `maxDepth`.  
  - Number of edges in that path = `maxDepth` (since depth is measured in edges here).
- **Modular exponentiation:** Use fast exponentiation to compute `2⁽ᵐᵃˣᴰᵉᵖᵗʰ−¹⁾ mod (10⁹+7)` efficiently.

### Complexity
- **Time Complexity**:
   - Building adjacency: _**O(n)**_
   - DFS traverses all nodes exactly once.
   - Fast exponentiation takes _**O(log(maxDepth))**_, which is _**O(log n)**_.
   - Total: _**O(n)**_
- **Space Complexity**: _**O(n)**_
   - Adjacency list and recursion stack (worst-case depth _**O(n)**_ for skewed tree).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
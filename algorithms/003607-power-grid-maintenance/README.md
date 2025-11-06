3607\. Power Grid Maintenance

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Graph`, `Heap (Priority Queue)`, `Ordered Set`, `Weekly Contest 457`

You are given an integer `c` representing `c` power stations, each with a unique identifier `id` from 1 to `c` (1‑based indexing).

These stations are interconnected via `n` **bidirectional** cables, represented by a 2D array `connections`, where each element `connections[i] = [uᵢ vᵢ]` indicates a connection between station `uᵢ` and station `vᵢ`. Stations that are directly or indirectly connected form a **power grid**.

Initially, **all** stations are online (operational).

You are also given a 2D array `queries`, where each query is one of the following two types:

- `[1, x]`: A maintenance check is requested for station `x`. If station `x` is online, it resolves the check by itself. If station `x` is offline, the check is resolved by the operational station with the smallest `id` in the same **power grid** as `x`. If **no operational** station exists in that grid, return -1.

- `[2, x]`: Station `x` goes offline (i.e., it becomes non-operational).

Return an array of integers representing the results of each query of type `[1, x]` in the **order** they appear.

**Note:** The power grid preserves its structure; an offline (non‑operational) node remains part of its grid and taking it offline does not alter connectivity.

**Example 1:**

- **Input:** c = 5, connections = [[1,2],[2,3],[3,4],[4,5]], queries = [[1,3],[2,1],[1,1],[2,2],[1,2]]
- **Output:** [3,2,3]
- **Explanation:** 

  ![powergrid](https://assets.leetcode.com/uploads/2025/04/15/powergrid.jpg)
  - Initially, all stations `{1, 2, 3, 4, 5}` are online and form a single power grid.
  - Query `[1,3]`: Station 3 is online, so the maintenance check is resolved by station 3.
  - Query `[2,1]`: Station 1 goes offline. The remaining online stations are `{2, 3, 4, 5}`.
  - Query `[1,1]`: Station 1 is offline, so the check is resolved by the operational station with the smallest id among `{2, 3, 4, 5}`, which is station 2.
  - Query `[2,2]`: Station 2 goes offline. The remaining online stations are `{3, 4, 5}`.
  - Query `[1,2]`: Station 2 is offline, so the check is resolved by the operational station with the smallest id among `{3, 4, 5}`, which is station 3.



**Example 2:**

- **Input:** c = 3, connections = [], queries = [[1,1],[2,1],[1,1]]
- **Output:** [1,-1]
- **Explanation:**
  - There are no connections, so each station is its own-isolated grid.
  - Query `[1,1]`: Station 1 is online in its isolated grid, so the maintenance check is resolved by station 1.
  - Query `[2,1]`: Station 1 goes offline.
  - Query `[1,1]`: Station 1 is offline and there are no other stations in its grid, so the result is -1.


**Constraints:**

- `1 <= c <= 10⁵`
- `0 <= n == connections.length <= min(10⁵, c * (c - 1) / 2)`
- `connections[i].length == 2`
- `1 <= uᵢ, vᵢ <= c`
- `uᵢ != vᵢ`
- `1 <= queries.length <= 2 * 10⁵`
- `queries[i].length == 2`
- `queries[i][0]` is either 1 or 2.
- `1 <= queries[i][1] <= c`



**Hint:**
1. Use DFS or BFS to assign each station a component ID
2. For each component, maintain a sorted set of online station IDs
3. For query `[2, x]`, remove `x` from the set of its component
4. For query `[1, x]`, if `x` is in its component’s set return `x`; otherwise if the set is non-empty return its smallest element; else return `-1`
5. Precompute all components and then handle each query in O(log n) time using the sorted sets






**Solution:**

We need to handle two types of queries on a power grid where stations can go offline, and I need to find the smallest operational station in the same connected component.

## Approach

1. **Union-Find for Connectivity**: First, I'll use Union-Find to group stations into connected components based on the given connections.

2. **Track Operational Status**: Maintain an array to track which stations are operational (online).

3. **Component Minimum Tracking**: For each component, track the smallest operational station ID. When stations go offline, I need to efficiently update this minimum.

4. **Query Processing**:
    - For type 1 queries: If station is online, return itself; otherwise return the minimum operational station in its component
    - For type 2 queries: Mark station as offline and update the component's minimum if needed

Let's implement this solution in PHP: **[3607. Power Grid Maintenance](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003607-power-grid-maintenance/solution.php)**

```php
<?php
/**
 * @param Integer[] $c
 * @param Integer[][] $connections
 * @param Integer[][] $queries
 * @return Integer[]
 */
function processQueries($c, $connections, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(processQueries(5, [[1,2],[2,3],[3,4],[4,5]], [[1,3],[2,1],[1,1],[2,2],[1,2]])); // Output: [3, 2, 3]
print_r(processQueries(3, [], [[1,1],[2,1],[1,1]]); // Output: [1,-1]
?>
```

### Explanation:

1. **Union-Find efficiently manages connectivity** between stations
2. **Min-heaps provide O(log k) access** to the smallest operational station in each component
3. **Lazy deletion** from heaps avoids expensive removal operations
4. The solution handles both edge cases: when all stations in a component are offline, and when stations are isolated

### Complexity
- Building components: O(c + n) where c is stations, n is connections
- Each query: O(log k) where k is component size (for heap operations)
- Total: O((c + n) + q log k) where q is number of queries

**Space Complexity:** O(c + n) for storing graph and component data

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
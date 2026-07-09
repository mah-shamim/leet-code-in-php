3532\. Path Existence Queries in a Graph I

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Hash Table`, `Binary Search`, `Union-Find`, `Graph Theory`, `Weekly Contest 447`

You are given an integer `n` representing the number of nodes in a graph, labeled from 0 to `n - 1`.

You are also given an integer array `nums` of length `n` sorted in **non-decreasing** order, and an integer `maxDiff`.

An **undirected** edge exists between nodes `i` and `j` if the **absolute** difference between `nums[i]` and `nums[j]` is **at most** `maxDiff` (i.e., `|nums[i] - nums[j]| <= maxDiff`).

You are also given a 2D integer array `queries`. For each `queries[i] = [uᵢ, vᵢ]`, determine whether there exists a path between nodes `uᵢ` and `vᵢ`.

Return a boolean array `answer`, where `answer[i]` is `true` if there exists a path between `uᵢ` and `vᵢ` in the `iᵗʰ query and `false` otherwise.

**Example 1:**

- **Input:** n = 2, nums = [1,3], maxDiff = 1, queries = [[0,0],[0,1]]
- **Output:** [true,false]
- **Explanation:**
  - Query `[0,0]`: Node 0 has a trivial path to itself.
  - Query `[0,1]`: There is no edge between Node 0 and Node 1 because `|nums[0] - nums[1]| = |1 - 3| = 2`, which is greater than `maxDiff`.
  - Thus, the final answer after processing all the queries is `[true, false]`.


**Example 2:**

- **Input:** n = 4, nums = [2,5,6,8], maxDiff = 2, queries = [[0,1],[0,2],[1,3],[2,3]]
- **Output:** [false,false,true,true]
- **Explanation:**
  - The resulting graph is:
   ![screenshot-2025-03-26-at-122249](https://assets.leetcode.com/uploads/2025/03/25/screenshot-2025-03-26-at-122249.png)
    - Query `[0,1]`: There is no edge between Node 0 and Node 1 because `|nums[0] - nums[1]| = |2 - 5| = 3`, which is greater than `maxDiff`.
    - Query `[0,2]`: There is no edge between Node 0 and Node 2 because `|nums[0] - nums[2]| = |2 - 6| = 4`, which is greater than `maxDiff`.
    - Query `[1,3]`: There is a path between Node 1 and Node 3 through Node 2 since `|nums[1] - nums[2]| = |5 - 6| = 1` and `|nums[2] - nums[3]| = |6 - 8| = 2`, both of which are within `maxDiff`.
    - Query `[2,3]`: There is an edge between Node 2 and Node 3 because `|nums[2] - nums[3]| = |6 - 8| = 2`, which is equal to `maxDiff`.
    - Thus, the final answer after processing all the queries is `[false, false, true, true]`.


**Example 3:**

- **Input:** n = 1, nums = [5], maxDiff = 10, queries = [[0,0]]
- **Output:** [true]


**Example 4:**

- **Input:** n = 5, nums = [1,2,3,4,5], maxDiff = 1, queries = [[0,4],[1,3],[0,2]]
- **Output:** [true,true,true]


**Example 5:**

- **Input:** n = 3, nums = [0,10,20], maxDiff = 5, queries = [[0,1],[1,2],[0,2]]
- **Output:** [false,false,false]


**Example 6:**

- **Input:** n = 6, nums = [1,3,5,10,12,14], maxDiff = 2, queries = [[0,2],[3,5],[0,5],[2,3]]
- **Output:** [true,true,false,false]


**Example 7:**

- **Input:** n = 3, nums = [0,100,100], maxDiff = 0, queries = [[1,2],[0,1]]
- **Output:** [true,false]

**Constraints:**

- `1 <= n == nums.length <= 10⁵`
- `0 <= nums[i] <= 10⁵`
- `nums` is sorted in **non-decreasing** order.
- `0 <= maxDiff <= 10⁵`
- `1 <= queries.length <= 10⁵`
- `queries[i] == [uᵢ, vᵢ]`
- `0 <= uᵢ, vᵢ < n`


**Hint:**
1. How do the connected components look? Do they appear in segments (i.e., are they continuous)?
2. Preprocess the connected components.


**Solution:**

We solve the path existence queries problem by leveraging the fact that the graph's connected components form continuous segments in the sorted array. We preprocess the components in a single pass, assigning each node a component ID based on consecutive value differences. Then each query is answered in _**O(1)**_ time by checking if both nodes belong to the same component.

## Approach

- **Key Insight**: Since the graph connects nodes based on value differences, and `nums` is sorted, connected components will always be contiguous segments of indices. If consecutive values differ by ≤ maxDiff, they belong to the same component; if the difference exceeds maxDiff, it creates a boundary between components.
- **Component Assignment**: Traverse the sorted array once, extending each component as long as the gap between consecutive elements is ≤ maxDiff. Assign the same component ID to all nodes in that contiguous segment.
- **Query Processing**: For each query `[u, v]`, simply check if `component[u] == component[v]`. If they share the same component ID, a path exists; otherwise, it doesn't.
- **Self-Query Handling**: The approach naturally handles `u == v` queries since both indices will have the same component ID, returning `true` as required.

Let's implement this solution in PHP: **[3532. Path Existence Queries in a Graph I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003532-path-existence-queries-in-a-graph-i/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[] $nums
 * @param Integer $maxDiff
 * @param Integer[][] $queries
 * @return Boolean[]
 */
function pathExistenceQueries(int $n, array $nums, int $maxDiff, array $queries): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo json_encode(pathExistenceQueries(2, [1,3], 1, [[0,0],[0,1]])) .  "\n";                             // Output: [true, false]
echo json_encode(pathExistenceQueries(4, [2,5,6,8], 2, [[0,1],[0,2],[1,3],[2,3]])) .  "\n";             // Output: [false, false, true, true]
echo json_encode(pathExistenceQueries(1, [5], 10, [[0,0]]) .  "\n";                                     // Output: [true]
echo json_encode(pathExistenceQueries(5, [1,2,3,4,5], 1, [[0,4],[1,3],[0,2]])) .  "\n";                 // Output: [true, true, true]
echo json_encode(pathExistenceQueries(3, [0,10,20], 5, [[0,1],[1,2],[0,2]])) .  "\n";                   // Output: [false, false, false]
echo json_encode(pathExistenceQueries(6, [1,3,5,10,12,14], 2, [[0,2],[3,5],[0,5],[2,3]])) .  "\n";      // Output: [true, true, false, false]
echo json_encode(pathExistenceQueries(3, [0,100,100], 0, [[1,2],[0,1]])) .  "\n";                       // Output: [true, false]
?>
```

### Explanation:

- **Single Pass Component Detection**: We iterate through the array with two pointers. The outer pointer `i` starts each new component, and the inner pointer `j` extends the component while `nums[j+1] - nums[j] ≤ maxDiff`. This works because `nums` is sorted, so the absolute difference is just the difference between consecutive elements.
- **Why Components are Contiguous**: If node `i` connects to node `i+1` (difference ≤ maxDiff), and node `i+1` connects to node `i+2`, then node `i` connects to node `i+2` through `i+1`. Therefore, once a connection chain breaks (difference > maxDiff), no further connections can cross that boundary because values only increase.
- **Constant-Time Queries**: After preprocessing, each query is answered by a single array comparison, making the solution extremely efficient for large query sets.
- **Memory Efficiency**: We only store the component array of size `n` and process queries on the fly, avoiding any heavy graph construction.

## Complexity Analysis

- **Time Complexity**: _**O(n + q)**_ where `n` is the number of nodes and `q` is the number of queries. The preprocessing scans `nums` once, and each query is answered in O(1) time.
- **Space Complexity**: _**O(n)**_ for the component array. No additional data structures are needed for graph representation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
3534\. Path Existence Queries in a Graph II

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Two Pointers`, `Binary Search`, `Dynamic Programming`, `Greedy`, `Bit Manipulation`, `Graph Theory`, `Sorting`, `Weekly Contest 447`

You are given an integer `n` representing the number of nodes in a graph, labeled from 0 to `n - 1`.

You are also given an integer array `nums` of length n and an integer `maxDiff`.

An undirected edge exists between nodes `i` and `j` if the **absolute** difference between `nums[i]` and `nums[j]` is **at most** `maxDiff` (i.e., `|nums[i] - nums[j]| <= maxDiff`).

You are also given a 2D integer array `queries`. For each `queries[i] = [uᵢ, vᵢ]`, find the **minimum** distance between nodes `uᵢ` and `vᵢ`. If no path exists between the two nodes, return -1 for that query.

Return an array `answer`, where `answer[i]` is the result of the `iᵗʰ` query.

**Note:** The edges between the nodes are unweighted.

**Example 1:**

- **Input:** n = 5, nums = [1,8,3,4,2], maxDiff = 3, queries = [[0,3],[2,4]]
- **Output:** [1,1]
- **Explanation:**
  - The resulting graph is:
   ![4149example1drawio](https://assets.leetcode.com/uploads/2025/03/25/4149example1drawio.png)

| Query	  | Shortest Path	 | Minimum Distance |
|--------|---------------|------------------|
| [0, 3]	 | 0 → 3	         | 1                |
| [2, 4]	 | 2 → 4	         | 1                |

   - Thus, the output is `[1, 1]`.

**Example 2:**

- **Input:** n = 5, nums = [5,3,1,9,10], maxDiff = 2, queries = [[0,1],[0,2],[2,3],[4,3]]
- **Output:** [1,2,-1,1]
- **Explanation:**
  - The resulting graph is:
   ![4149example2drawio](https://assets.leetcode.com/uploads/2025/03/25/4149example2drawio.png)

| Query	  | Shortest Path	 | Minimum Distance |
|--------|---------------|------------------|
| [0, 1]	 | 0 → 1	         | 1                |
| [0, 2]	 | 0 → 1 → 2	     | 2                |
| [2, 3]	 | None	          | -1               |
| [4, 3]	 | 3 → 4	         | 1                |

   - Thus, the output is [1, 2, -1, 1].

**Example 3:**

- **Input:** n = 3, nums = [3,6,1], maxDiff = 1, queries = [[0,0],[0,1],[1,2]]
- **Output:** [0,-1,-1]
- **Explanation:**
   - There are no edges between any two nodes because:
     - Nodes 0 and 1: `|nums[0] - nums[1]| = |3 - 6| = 3 > 1`
     - Nodes 0 and 2: `|nums[0] - nums[2]| = |3 - 1| = 2 > 1`
     - Nodes 1 and 2: `|nums[1] - nums[2]| = |6 - 1| = 5 > 1`
   - Thus, no node can reach any other node, and the output is `[0, -1, -1]`.

**Example 4:**

- **Input:** n = 1, nums = [5], maxDiff = 10, queries = [[0,0]]
- **Output:** [0]

**Example 5:**

- **Input:** n = 4, nums = [1,2,3,4], maxDiff = 10, queries = [[0,3],[1,2]]
- **Output:** [1,1]

**Example 6:**

- **Input:** n = 6, nums = [10,20,15,25,5,30], maxDiff = 5, queries = [[0,1],[0,2],[2,4],[3,5]]
- **Output:** [2,1,3,2]

**Example 7:**

- **Input:** n = 6, nums = [0,2,4,6,8,10], maxDiff = 2, queries = [[0,5]]
- **Output:** [5]

**Example 8:**

- **Input:** n = 4, nums = [1,2,100,101], maxDiff = 1, queries = [[0,2],[1,3]]
- **Output:** [-1,-1]

**Example 9:**

- **Input:** n = 7, nums = [1,50,2,51,52,3,53], maxDiff = 2, queries = [[0,6],[1,2]]
- **Output:** 2,-1]

**Example 10:**

- **Input:** n = 5, nums = [5,5,5,5,5], maxDiff = 0, queries = [[0,4],[1,3]]
- **Output:** [1,1]

**Example 11:**

- **Input:** n = 4, nums = [1,2,3,4], maxDiff = 0, queries = [[0,1],[0,2]]
- **Output:** [-1,-1]

**Constraints:**

- `1 <= n == nums.length <= 10⁵`
- `0 <= nums[i] <= 10⁵`
- `0 <= maxDiff <= 10⁵`
- `1 <= queries.length <= 10⁵`
- `queries[i] == [uᵢ, vᵢ]`
- `0 <= uᵢ, vᵢ < n`


**Hint:**
1. Sort the nodes according to `nums[i]`.
2. Can we use binary jumping?
3. Use binary jumping with a sparse table data structure.


**Solution:**

We present an efficient solution for answering path existence queries in a graph where edges are defined by value differences. We transform the problem by sorting nodes by their `nums` values, which allows us to build a binary lifting (sparse table) structure to answer `shortest` path queries in logarithmic time. This approach handles up to 100,000 nodes and queries efficiently, avoiding the need to explicitly construct the graph.

## Approach

- **Sort nodes by value**: We sort nodes based on their `nums[i]` values while preserving original indices. This ordering creates a monotonic property where edges exist between nodes whose values differ by at most `maxDiff`.
- **Build jump table**: For each sorted position `i`, we compute `jump[i][0]` as the farthest position reachable in one "jump" (edge) - this is the maximum index `right` such that `sortedNums[right] - sortedNums[i] <= maxDiff`. Since the array is sorted, we can use a two-pointer technique to compute this efficiently.
- **Binary lifting optimization**: We build a sparse table where `jump[i][k]` represents the farthest position reachable by making `2ᵏ` jumps from position `i`. This allows us to skip multiple edges at once.
- **Query processing with greedy descent**: For each query `[u, v]`, we map original indices to their sorted positions. We then find the minimum number of jumps needed to go from `min(start, end)` to `max(start, end)` using binary lifting. If the destination is unreachable, we return -1.

Let's implement this solution in PHP: **[3534. Path Existence Queries in a Graph II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003534-path-existence-queries-in-a-graph-ii/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[] $nums
 * @param Integer $maxDiff
 * @param Integer[][] $queries
 * @return Integer[]
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

/**
 * @param array $jump
 * @param int $start
 * @param int $end
 * @param int $level
 * @return int
 */
function minJumps(array $jump, int $start, int $end, int $level): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo pathExistenceQueries(5, [1,8,3,4,2], 3, [[0,3],[2,4]]) .  "\n";                            // Output: [1,1]
echo pathExistenceQueries(5, [5,3,1,9,10], 2, [[0,1],[0,2],[2,3],[4,3]]) .  "\n";               // Output: [1,2,-1,1]
echo pathExistenceQueries(3, [3,6,1], 1, [[0,0],[0,1],[1,2]]) .  "\n";                          // Output: [0,-1,-1]
echo pathExistenceQueries(1, [5], 10, [[0,0]]) .  "\n";                                         // Output: [0]
echo pathExistenceQueries(4, [1,2,3,4], 10, [[0,3],[1,2]]) .  "\n";                             // Output: [1,1]
echo pathExistenceQueries(6, [10,20,15,25,5,30], 5, [[0,1],[0,2],[2,4],[3,5]]) .  "\n";         // Output: [2,1,3,2]
echo pathExistenceQueries(6, [0,2,4,6,8,10], 2, [[0,5]]) .  "\n";                               // Output: [5]
echo pathExistenceQueries(4, [1,2,100,101], 1, [[0,2],[1,3]]) .  "\n";                          // Output: [-1,-1]
echo pathExistenceQueries(7, [1,50,2,51,52,3,53], 2, [[0,6],[1,2]]) .  "\n";                    // Output: [2,-1]
echo pathExistenceQueries(5, [5,5,5,5,5], 0, [[0,4],[1,3]]) .  "\n";                            // Output: [1,1]
echo pathExistenceQueries(4, [1,2,3,4], 0, [[0,1],[0,2]]) .  "\n";                              // Output: [-1,-1]
?>
```

### Explanation:

- **Graph transformation insight**: The graph is defined by value differences, not original node ordering. By sorting nodes by value, edges become intervals of contiguous indices. This transforms the shortest path problem into finding the minimum number of interval jumps to go from one position to another in the sorted order.
- **Jump table construction**: Using a two-pointer approach, we compute `right[i]` as the rightmost position reachable from `i` in one jump. Because `sortedNums` is sorted, as `i` increases, `right[i]` is non-decreasing, making this computation O(n).
- **Binary lifting mechanics**: For each node and each power of two level, `jump[i][k] = jump[jump[i][k-1]][k-1]`. This means from position `i`, after `2ᵏ` jumps, we can reach position `jump[i][k]`. This allows us to jump large distances in logarithmic time.
- **Query answering strategy**:
    - Start from the left position (`start`) and target the right position (`end`)
    - Check if we can reach in 1 jump: return 1
    - Find the highest level where we don't overshoot `end`
    - Make that jump and recursively compute the remaining distance
    - Sum the jump sizes to get the total distance
- **Unreachable detection**: If even the largest possible jump from `start` (using all levels) doesn't reach `end`, the nodes are in different connected components. We detect this when `jump[start][maxLevel] < end` and return -1.

## Complexity Analysis

- **Time Complexity**:
    - Sorting: _**O(n log n)**_
    - Jump table construction: _**O(n log n)**_ where `maxLevel = O(log n)`
    - Each query: _**O(log n)**_ using binary lifting
    - Overall: _**O((n + q) log n)**_ where q is number of queries
- **Space Complexity**: _**O(n log n)**_ for the jump table, plus _**O(n)**_ for auxiliary arrays

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
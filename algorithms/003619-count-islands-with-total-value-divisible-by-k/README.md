3619\. Count Islands With Total Value Divisible by K

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Depth-First Search`, `Breadth-First Search`, `Union-Find`, `Matrix`, `Biweekly Contest 161`

You are given an `m x n` matrix `grid` and a positive integer `k`. An **island** is a group of **positive** integers (representing land) that are **4-directionally** connected (horizontally or vertically).

The **total value** of an island is the sum of the values of all cells in the island.

Return the number of islands with a total value **divisible by** `k`.

**Example 1:**

- **Input:** grid = [[0,2,1,0,0],[0,5,0,0,5],[0,0,1,0,0],[0,1,4,7,0],[0,2,0,0,8]], k = 5
- **Output:** 2
- **Explanation:** The grid contains four islands. The islands highlighted in blue have a total value that is divisible by 5, while the islands highlighted in red do not.

**Example 2:**

- **Input:** grid = [[3,0,3,0],[0,3,0,3],[3,0,3,0]], k = 3
- **Output:** 6
- **Explanation:** The grid contains six islands, each with a total value that is divisible by 3.

**Example 3:**

- **Input:** grid = [[1]], k = 1
- **Output:** 1
- **Explanation:** There is one island with total value 1, which is divisible by 1.

**Example 4:**

- **Input:** grid = [[1]], k = 2
- **Output:** 0
- **Explanation:** There is one island with total value 1, which is not divisible by 2.

**Example 5:**

- **Input:** grid = [[0]], k = 5
- **Output:** 0
- **Explanation:** The grid contains only water, so there are no islands.

**Example 6:**

- **Input:** grid = [[1,1,1],[1,1,1],[1,1,1]], k = 9
- **Output:** 1
- **Explanation:** The grid contains one island with total value 9, which is divisible by 9.

**Example 7:**

- **Input:** grid = [[1,1,1],[1,1,1],[1,1,1]], k = 5
- **Output:** 0
- **Explanation:** The grid contains one island with total value 9, which is not divisible by 5.

**Example 8:**

- **Input:** grid = [[1,0,1],[0,0,0],[1,0,1]], k = 1
- **Output:** 4
- **Explanation:** The grid contains four islands, each with total value 1. Since every value is divisible by 1, all four islands count.

**Example 9:**

- **Input:** grid = [[1000000]], k = 1000000
- **Output:** 1
- **Explanation:** There is one island with total value 1000000, which is divisible by 1000000.

**Example 10:**

- **Input:** grid = [[2,2,0,0],[2,0,0,0],[0,0,4,4],[0,0,4,0]], k = 2
- **Output:** 2
- **Explanation:** The grid contains two islands with total values 6 and 12. Both are divisible by 2.

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 1000`
- `1 <= m * n <= 10⁵`
- `0 <= grid[i][j] <= 10⁶`
- `1 <= k <= 10⁶`


**Hint:**

1. Use a BFS/DFS to find connected components.


**Similar Questions:**

1. [200. Number of Islands](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00200-number-of-islands)


**Solution:**

We implemented an iterative Depth-First Search (DFS) using an explicit stack to traverse the grid and discover all 4-directionally connected islands of positive integers. For each island we accumulate its total value, then check whether that sum is divisible by `k`. We mutate the input grid in place (setting visited cells to `0`) to avoid a separate visited array, keeping memory usage minimal. The final answer is the count of islands whose total value passes the divisibility check.

## Approach

- Iterate over every cell in the `m × n` grid using nested loops.
- Skip any cell whose value is `<= 0` (water or already visited).
- When a positive cell is found, treat it as the seed of a new island:
  - Initialize the island's running `sum` with the seed's value.
  - Mark the seed as visited by setting it to `0`.
  - Push the seed onto a stack for DFS traversal.
- While the stack is non-empty:
  - Pop the current cell.
  - Inspect all four orthogonal neighbors (up, down, left, right).
  - For each in-bounds neighbor with a positive value:
    - Add its value to the island `sum`.
    - Mark it visited by setting it to `0`.
    - Push it onto the stack.
- After the stack drains, the island is fully explored:
  - If `sum % k == 0`, increment the answer counter.
- Return the final count.

Let's implement this solution in PHP: **[3619. Count Islands With Total Value Divisible by K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003619-count-islands-with-total-value-divisible-by-k/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $k
 * @return Integer
 */
function countIslands(array $grid, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countIslands([[0,2,1,0,0],[0,5,0,0,5],[0,0,1,0,0],[0,1,4,7,0],[0,2,0,0,8]], 5) . "\n";     // Output: 2
echo countIslands([[3,0,3,0],[0,3,0,3],[3,0,3,0]], 3) . "\n";                                   // Output: 6
echo countIslands([[1]], 1) . "\n";                                                             // Output: 1
echo countIslands([[1]], 2) . "\n";                                                             // Output: 0
echo countIslands([[0]], 5) . "\n";                                                             // Output: 0
echo countIslands([[1,1,1],[1,1,1],[1,1,1]], 9) . "\n";                                         // Output: 1
echo countIslands([[1,1,1],[1,1,1],[1,1,1]], 5) . "\n";                                         // Output: 0
echo countIslands([[1,0,1],[0,0,0],[1,0,1]], 1) . "\n";                                         // Output: 4
echo countIslands([[1000000]], 1000000) . "\n";                                                 // Output: 1
echo countIslands([[2,2,0,0],[2,0,0,0],[0,0,4,4],[0,0,4,0]], 2) . "\n";                         // Output: 2
?>
```

### Explanation:

- **In-place marking** — Setting visited cells to `0` reuses the existing grid as the visited set, saving `O(m·n)` auxiliary space for a boolean matrix.
- **Iterative DFS with explicit stack** — Avoids PHP recursion depth limits that can be hit on large connected islands (up to `10⁵` cells).
- **Positive-only check** — `grid[r][c] <= 0` covers both water cells (value `0`) and already-visited land cells (now `0`), so it doubles as the "should we explore?" and "already seen?" check.
- **Ordering of operations** — We add the value to `sum` **before** zeroing it out, so we never lose the contribution of a cell.
- **Divisibility test** — Because `k` can be up to `10⁶` and values up to `10⁶` across `10⁵` cells, integer overflow could occur in fixed-width languages, but PHP integers are 64-bit on modern platforms, so `sum % k` is safe.
- **Four-direction traversal** — The `$directions` array encodes (down, up, right, left); only orthogonal neighbors count as connected, matching the problem's 4-directional definition.

## Complexity Analysis

- **Time Complexity:** `O(m · n)` — each cell is pushed onto the stack and popped at most once, and each pop examines exactly 4 neighbors.
- **Space Complexity:** `O(m · n)` worst case — the explicit stack may hold up to `O(m · n)` cells for a single large connected island (e.g., a fully land-filled grid). No additional visited array is allocated.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
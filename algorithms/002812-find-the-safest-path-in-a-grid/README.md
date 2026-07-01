2812\. Find the Safest Path in a Grid 

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Binary Search`, `Breadth-First Search`, `Union-Find`, `Heap (Priority Queue)`, `Matrix`, `Weekly Contest 357`

You are given a **0-indexed** 2D matrix `grid` of size `n x n`, where `(r, c)` represents:

- A cell containing a thief if `grid[r][c] = 1`
- An empty cell if `grid[r][c] = 0`

You are initially positioned at cell `(0, 0)`. In one move, you can move to any adjacent cell in the grid, including cells containing thieves.

The **safeness factor** of a path on the grid is defined as the **minimum** manhattan distance from any cell in the path to any thief in the grid.

Return _the **maximum safeness factor** of all paths leading to cell `(n - 1, n - 1)`_.

An **adjacent** cell of cell `(r, c)`, is one of the cells `(r, c + 1)`, `(r, c - 1)`, `(r + 1, c)` and `(r - 1, c)` if it exists.

The **Manhattan distance** between two cells `(a, b)` and `(x, y)` is equal to `|a - x| + |b - y|`, where `|val|` denotes the absolute value of val.

**Example 1:**

![example1](https://assets.leetcode.com/uploads/2023/07/02/example1.png)

- **Input:** grid = [[1,0,0],[0,0,0],[0,0,1]]
- **Output:** 0
- **Explanation:** All paths from (0, 0) to (n - 1, n - 1) go through the thieves in cells (0, 0) and (n - 1, n - 1).

**Example 2:**

![example2](https://assets.leetcode.com/uploads/2023/07/02/example2.png)

- **Input:** All paths from (0, 0) to (n - 1, n - 1) go through the thieves in cells (0, 0) and (n - 1, n - 1).
- **Output:** 2
- **Explanation:** The path depicted in the picture above has a safeness factor of 2 since:
  - The closest cell of the path to the thief at cell (0, 2) is cell (0, 0). The distance between them is | 0 - 0 | + | 0 - 2 | = 2.
  - It can be shown that there are no other paths with a higher safeness factor.

**Example 3:**

![example3](https://assets.leetcode.com/uploads/2023/07/02/example3.png)

- **Input:** grid = [[0,0,0,1],[0,0,0,0],[0,0,0,0],[1,0,0,0]]
- **Output:** 2
- **Explanation:** The path depicted in the picture above has a safeness factor of 2 since:
  - The closest cell of the path to the thief at cell (0, 3) is cell (1, 2). The distance between them is | 0 - 1 | + | 3 - 2 | = 2.
  - The closest cell of the path to the thief at cell (3, 0) is cell (3, 2). The distance between them is | 3 - 3 | + | 0 - 2 | = 2.
  - It can be shown that there are no other paths with a higher safeness factor.

**Constraints:**

- `1 <= grid.length == n <= 400`
- `grid[i].length == n`
- `grid[i][j]` is either `0` or `1`.
- There is at least one thief in the `grid`.

**Hint:**
1. Consider using both BFS and binary search together.
2. Launch a BFS starting from all the cells containing thieves to calculate `d[x][y]` which is the smallest Manhattan distance from `(x, y)` to the nearest grid that contains thieves.
3. To check if the bottom-right cell of the grid can be reached through a path of safeness factor `v`, eliminate all cells `(x, y)` such that `grid[x][y] < v`. if `(0, 0)` and `(n - 1, n - 1)` are still connected, there exists a path between `(0, 0)` and `(n - 1, n - 1)` of safeness factor `v`.
4. Binary search over the final safeness factor `v`.


**Similar Questions:**
1. [1631. Path With Minimum Effort](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001631-path-with-minimum-effort)


**Solution:**

We solve the problem of finding the maximum safeness factor in a grid by combining a multi-source BFS to compute distances to the nearest thief for each cell, followed by a binary search over possible safeness factors and a DFS connectivity check. This approach efficiently handles grids up to 400x400 by transforming the problem into a path existence problem with a threshold.

## Approach

- **Multi-Source BFS** to compute the minimum Manhattan distance from each cell to any thief
- **Binary Search** over the safeness factor value (0 to maximum possible distance)
- **DFS Connectivity Check** to verify if a path exists from start to end using only cells with distance >= current threshold
- **Early Termination** during DFS when reaching the destination

Let's implement this solution in PHP: **[2812. Find the Safest Path in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002812-find-the-safest-path-in-a-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function maximumSafenessFactor(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumSafenessFactor([[1,0,0],[0,0,0],[0,0,1]]) .  "\n"; // Output: 0
echo maximumSafenessFactor([[0,0,1],[0,0,0],[0,0,0]]) .  "\n"; // Output: 2
echo maximumSafenessFactor([[0,0,0,1],[0,0,0,0],[0,0,0,0],[1,0,0,0]]) .  "\n"; // Output: 2
?>
```

### Explanation:

### Initial Distance Computation
- All thief cells are used as initial sources in a BFS queue
- BFS propagates outward level by level, assigning each cell its minimum distance to any thief
- This effectively computes the "safeness score" for every cell in the grid

### Binary Search Strategy
- The safeness factor is bounded between 0 and the maximum BFS level
- For each candidate value `mid`, we check if a valid path exists
- If a path exists at threshold `mid`, we try higher values (move `left = mid + 1`)
- Otherwise, we try lower values (move `right = mid`)

### Path Validation with DFS
- The DFS explores only cells with distance >= current threshold
- Starting from `(0,0)`, it attempts to reach `(n-1, n-1)`
- Marking visited cells prevents infinite loops and improves performance
- Returns `true` immediately when the destination is reached

## Complexity Analysis

- **Time Complexity:** O(n² × log(n)) where n is the grid dimension
  - BFS: O(n²) to compute all distances
  - Binary Search: O(log n) iterations
  - Each DFS check: O(n²) in worst case
  - Total: O(n² + n² × log n) = O(n² × log n)

- **Space Complexity:** O(n²)
  - Distance matrix: O(n²)
  - Visited matrix: O(n²)
  - Queue for BFS: O(n²) in worst case

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
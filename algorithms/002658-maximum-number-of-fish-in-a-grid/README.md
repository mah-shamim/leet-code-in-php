2658\. Maximum Number of Fish in a Grid

**Difficulty:** Medium

**Topics:** `Array`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Matrix`

You are given a **0-indexed** 2D matrix `grid` of size `m x n`, where `(r, c)` represents:

- A **land** cell if `grid[r][c] = 0`, or
- A **water** cell containing `grid[r][c]` fish, if `grid[r][c] > 0`.

A fisher can start at any **water** cell `(r, c)` and can do the following operations any number of times:

- Catch all the fish at cell `(r, c)`, or
- Move to any adjacent **water** cell.

Return _the **maximum** number of fish the fisher can catch if he chooses his starting cell optimally, or `0` if no water cell exists_.

An **adjacent** cell of the cell `(r, c)`, is one of the cells `(r, c + 1)`, `(r, c - 1)`, `(r + 1, c)` or `(r - 1, c)` if it exists.

**Example 1:**

![example](https://assets.leetcode.com/uploads/2023/03/29/example.png)

- **Input:** grid = [[0,2,1,0],[4,0,0,3],[1,0,0,4],[0,3,2,0]]
- **Output:** 7
- **Explanation:** The fisher can start at cell `(1,3)` and collect 3 fish, then move to cell `(2,3)` and collect 4 fish.

**Example 2:**

![example2](https://assets.leetcode.com/uploads/2023/03/29/example2.png)

- **Input:** grid = [[1,0,0,0],[0,0,0,0],[0,0,0,0],[0,0,0,1]]
- **Output:** 1
- **Explanation:** The fisher can start at cells (0,0) or (3,3) and collect a single fish.



**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 10`
- `0 <= grid[i][j] <= 10`


**Hint:**
1. Run DFS from each non-zero cell.
2. Each time you pick a cell to start from, add up the number of fish contained in the cells you visit.



**Solution:**

The problem is to find the maximum number of fish that a fisher can catch by starting at any water cell in a grid. The fisher can catch fish at the current cell and move to any adjacent water cell (up, down, left, or right) repeatedly.

### Key Points:
1. The grid contains cells that are either land (value `0`) or water (value > `0`).
2. The fisher can only move to adjacent water cells.
3. The objective is to find the maximum number of fish collectable, starting from the best possible water cell.

### Approach:
1. Use **Depth-First Search (DFS)** to explore all possible paths starting from each water cell.
2. For each unvisited water cell, run a DFS to calculate the total fish in the connected component.
3. Track the maximum fish collected from any connected component.

### Plan:
1. Initialize a 2D `visited` array to track whether a cell has been explored.
2. Iterate through each cell in the grid.
3. If the cell contains water and is not visited:
   - Run a DFS starting from that cell.
   - Accumulate the total fish in the connected water cells.
   - Update the maximum fish collected so far.
4. Return the maximum fish count after exploring all cells.

Let's implement this solution in PHP: **[2658. Maximum Number of Fish in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002658-maximum-number-of-fish-in-a-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function findMaxFish($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function for DFS
 * @param $r
 * @param $c
 * @param $grid
 * @param $visited
 * @param $rows
 * @param $cols
 * @param $directions
 * @return array|bool|int|int[]|mixed|null
 */
function dfs($r, $c, &$grid, &$visited, $rows, $cols, $directions) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
grid = [[0,2,1,0],[4,0,0,3],[1,0,0,4],[0,3,2,0]];
echo getMaxFish($grid); // Output: 7

// Example 2
$grid = [[1,0,0,0],[0,0,0,0],[0,0,0,0],[0,0,0,1]];
echo getMaxFish($grid); // Output: 1
?>
```

### Explanation:

#### DFS Implementation:
- For each water cell `(r, c)`, recursively explore its neighbors if they are:
   - Inside the grid boundaries.
   - Unvisited.
   - Water cells (value > 0).
- Accumulate the fish count during the recursion.

#### Steps:
1. Start from a water cell and mark it as visited.
2. Recursively visit its valid neighbors, adding up the fish count.
3. Return the total fish count for the connected component.

### Example Walkthrough:
#### Example Input:
```php
$grid = [
    [0, 2, 1, 0],
    [4, 0, 0, 3],
    [1, 0, 0, 4],
    [0, 3, 2, 0]
];
```

#### Execution:
1. Start at `(1, 3)` (value = 3). Run DFS:
   - `(1, 3)` → `(2, 3)` (value = 4).
   - Total fish = `3 + 4 = 7`.
2. Explore other water cells, but no connected component has a higher total fish count.
3. Output: `7`.

### Time Complexity:
- **DFS Traversal:** Each cell is visited once → O(m × n).
- **Overall Complexity:** O(m × n), where `m` and `n` are grid dimensions.

### Output for Examples:
- **Example 1:** `7`
- **Example 2:** `1`

The solution efficiently uses DFS to explore connected components of water cells and calculates the maximum fish catchable by a fisher starting from any water cell. This approach ensures optimal exploration and works well for the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
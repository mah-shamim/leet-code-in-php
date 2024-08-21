200\. Number of Islands

**Difficulty:** Medium

**Topics:** `Array`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Matrix`

Given an `m x n` 2D binary grid `grid` which represents a map of `'1'`s (land) and `'0'`s (water), return _the number of islands_.

An **island** is surrounded by water and is formed by connecting adjacent lands horizontally or vertically. You may assume all four edges of the grid are all surrounded by water.

**Example 1:**

- **Input:** 
    ```
    grid = [
        ["1","1","1","1","0"],
        ["1","1","0","1","0"],
        ["1","1","0","0","0"],
        ["0","0","0","0","0"]
    ]
    ```
- **Output:** 1

**Example 2:**

- **Input:**
    ```
    grid = [
      ["1","1","0","0","0"],
      ["1","1","0","0","0"],
      ["0","0","1","0","0"],
      ["0","0","0","1","1"]
    ]
    ```
- **Output:** 3

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 300`
- `grid[i][j]` is `'0'` or `'1'`.


**Solution:**


We can use Depth-First Search (DFS) to explore and count the islands in the given 2D binary grid. The approach involves traversing the grid and performing DFS to mark all connected land cells for each island.

Let's implement this solution in PHP: **[200. Number of Islands](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000200-number-of-islands/solution.php)**

```php
<?php
// Example usage
$solution = new Solution();

$grid1 = [
    ["1", "1", "1", "1", "0"],
    ["1", "1", "0", "1", "0"],
    ["1", "1", "0", "0", "0"],
    ["0", "0", "0", "0", "0"]
];

$grid2 = [
    ["1", "1", "0", "0", "0"],
    ["1", "1", "0", "0", "0"],
    ["0", "0", "1", "0", "0"],
    ["0", "0", "0", "1", "1"]
];

echo "Output for grid1: " . $solution->numIslands($grid1) . "\n"; // Output: 1
echo "Output for grid2: " . $solution->numIslands($grid2) . "\n"; // Output: 3
?>
```

### Explanation:

1. **Class and Method Definitions:**
  - `class Solution` defines the class that contains the methods for solving the problem.
  - `numIslands` is the main method to count the number of islands.

2. **`numIslands` Method:**
  - **Parameters:** Takes a 2D grid (`$grid`) where each cell is either '1' (land) or '0' (water).
  - **Validation:** Checks if the grid is empty. If so, it returns 0.
  - **Initialization:** Defines the dimensions of the grid (`$m` for rows and `$n` for columns) and initializes the island count.
  - **Traversal:** Iterates through each cell in the grid:
    - **Land Cell Check:** If a cell contains '1', it starts a DFS from that cell and increments the island count.
    - **DFS Call:** Calls the `dfs` method to mark all connected land cells as visited.
  - **Return:** Returns the total number of islands found.

3. **`dfs` Method:**
  - **Parameters:** Takes a reference to the grid (`$grid`), and coordinates (`$x`, `$y`), and the dimensions of the grid (`$m`, `$n`).
  - **Base Case:** Checks if the current cell is out of bounds or if it is not land ('1'). If so, it returns immediately.
  - **Marking:** Marks the current land cell as visited by setting it to 'x'.
  - **Recursive Calls:** Recursively performs DFS in all four possible directions (up, down, left, right) to visit all connected land cells.

### How It Works

- **Initialization:** The `numIslands` method initializes the island count and begins iterating over each cell in the grid.
- **Island Detection:** Whenever a '1' is encountered, it signifies a new island. The `dfs` method is invoked to explore and mark the entire island, ensuring that all connected land cells are considered part of the same island.
- **DFS Traversal:** The `dfs` method ensures that each cell in an island is visited exactly once, marking it as visited and preventing it from being counted again in future DFS calls.
- **Counting Islands:** The main method counts each distinct DFS call initiation as one island and returns the total count.

This approach efficiently counts the number of islands by exploring each land cell and marking all connected cells, ensuring that each island is counted only once.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

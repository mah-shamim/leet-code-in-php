463\. Island Perimeter

**Difficulty:** Easy

**Topics:** `Array`, `Depth-First Search`, `Breadth-First Search`, `Matrix`

You are given `row x col` `grid` representing a map where `grid[i][j] = 1` represents land and `grid[i][j] = 0` represents water.

Grid cells are connected **horizontally/vertically** (not diagonally). The `grid` is completely surrounded by water, and there is exactly one island (i.e., one or more connected land cells).

The island doesn't have "lakes", meaning the water inside isn't connected to the water around the island. One cell is a square with side length 1. The grid is rectangular, width and height don't exceed 100. Determine the perimeter of the island.

**Example 1:**

![island](https://assets.leetcode.com/uploads/2018/10/12/island.png)

- **Input:** grid = [[0,1,0,0],[1,1,1,0],[0,1,0,0],[1,1,0,0]]
- **Output:** 16
- **Explanation:** The perimeter is the 16 yellow stripes in the image above.

**Example 2:**

- **Input:** grid = [[1]]
- **Output:** 4

**Example 3:**

- **Input:** grid = [[1,0]]
- **Output:** 4

**Constraints:**

- `row == grid.length`
- `col == grid[i].length`
- `1 <= row, col <= 100`
- `grid[i][j]` is `0` or `1`.
- There is exactly one island in `grid`.


**Solution:**

We can iterate through each cell in the grid and apply the following logic:

1. **Count Land Cells**: For each land cell (`grid[i][j] = 1`), assume it contributes `4` to the perimeter (each side of the cell).
2. **Subtract Shared Edges**: If a land cell has a neighboring land cell either to its right (`grid[i][j + 1] = 1`) or below it (`grid[i + 1][j] = 1`), the perimeter is reduced by `2` for each shared edge, since two adjacent cells share a side.

The overall perimeter can be computed by summing up the individual contributions from each land cell, adjusted for shared edges.

Let's implement this solution in PHP: **[463. Island Perimeter](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000463-island-perimeter/solution.php)**

```php
<?php
function islandPerimeter($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$grid = [
    [0,1,0,0],
    [1,1,1,0],
    [0,1,0,0],
    [1,1,0,0]
];
echo islandPerimeter($grid); // Output: 16
?>
```

### Explanation:

- **Initialization**:
    - `$rows` and `$cols` store the dimensions of the grid.
    - `$perimeter` is initialized to `0` and will store the total perimeter.

- **Nested Loops**:
    - We iterate through each cell in the grid using two nested loops.
    - If the cell is land (`grid[i][$j] == 1`), we initially add `4` to the perimeter.
    - We then check for shared edges:
        - **Right Neighbor**: If there's a land cell to the right, reduce the perimeter by `2` (one edge is shared).
        - **Bottom Neighbor**: If there's a land cell below, reduce the perimeter by `2`.

- **Result**:
    - The function returns the calculated perimeter after considering all the land cells and their shared edges.

### Example Output:

For the provided grid:

```php
$grid = [
    [0,1,0,0],
    [1,1,1,0],
    [0,1,0,0],
    [1,1,0,0]
];
echo islandPerimeter($grid); // Output: 16
```

The output will be `16`, which matches the expected perimeter for the island in the grid. This approach efficiently computes the perimeter by iterating through the grid once and adjusting the perimeter for shared edges.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

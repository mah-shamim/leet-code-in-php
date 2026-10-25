1254\. Number of Closed Islands

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Depth-First Search`, `Breadth-First Search`, `Union-Find`, `Matrix`, `Weekly Contest 162`

Given a 2D `grid` consists of `0s` (land) and `1s` (water).  An _island_ is a maximal 4-directionally connected group of `0s` and a _closed island_ is an island **totally** (all left, top, right, bottom) surrounded by `1s`.

Return the number of _closed islands_.

**Example 1:**

![sample_3_1610](https://assets.leetcode.com/uploads/2019/10/31/sample_3_1610.png)

- **Input:** grid = [[1,1,1,1,1,1,1,0],[1,0,0,0,0,1,1,0],[1,0,1,0,1,1,1,0],[1,0,0,0,0,1,0,1],[1,1,1,1,1,1,1,0]]
- **Output:** 2
- **Explanation:** Islands in gray are closed because they are completely surrounded by water (group of 1s).

**Example 2:**

![sample_4_1610](https://assets.leetcode.com/uploads/2019/10/31/sample_4_1610.png)

- **Input:** grid = [[0,0,1,0,0],[0,1,0,1,0],[0,1,1,1,0]]
- **Output:** 1

**Example 3:**

- **Input:** grid = [[1,1,1,1,1,1,1], [1,0,0,0,0,0,1], [1,0,1,1,1,0,1], [1,0,1,0,1,0,1], [1,0,1,1,1,0,1], [1,0,0,0,0,0,1], [1,1,1,1,1,1,1]]
- **Output:** 2

**Example 4:**

- **Input:** grid = [[0]]
- **Output:** 0

**Example 5:**

- **Input:** grid = [[1]]
- **Output:** 0

**Example 6:**

- **Input:** grid = [[1,1,1],[1,0,1],[1,1,1]]
- **Output:** 1

**Example 7:**

- **Input:** grid = [[1,1,1],[1,1,1],[1,1,1]]
- **Output:** 0

**Example 8:**

- **Input:** grid = [[0,0,0],[0,0,0],[0,0,0]]
- **Output:** 0

**Constraints:**

- `1 <= grid.length, grid[0].length <= 100`
- `0 <= grid[i][j] <=1`


**Hint:**

1. Exclude connected group of 0s on the corners because they are not closed island.
2. Return number of connected component of `0s` on the grid.


**Solution:**

We solve the problem by first eliminating every `0`-land component that touches the grid boundary, since those cannot be closed islands. After that, every remaining connected component of `0`s is fully surrounded by water (`1`s), so we count those components with another flood fill. The implementation uses iterative DFS with an explicit stack to avoid recursion depth issues.

## Approach

- Treat `0` as land and `1` as water.
- Any land connected to the boundary is not closed, because it is not fully surrounded by water.
- Flood-fill all boundary-connected `0`s and mark them as water/visited.
- Traverse the remaining grid.
- Each unvisited `0` starts a new closed island.
- Flood-fill that component and increment the closed island count.
- Return the count.

Let's implement this solution in PHP: **[1254. Number of Closed Islands](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001254-number-of-closed-islands/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function closedIsland(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param array $grid
 * @param int $row
 * @param int $col
 * @return void
 */
function floodFill(array &$grid, int $row, int $col): void {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo closedIsland([[1,1,1,1,1,1,1,0],[1,0,0,0,0,1,1,0],[1,0,1,0,1,1,1,0],[1,0,0,0,0,1,0,1],[1,1,1,1,1,1,1,0]]) .  "\n";                                 // Output: 2
echo closedIsland([[0,0,1,0,0],[0,1,0,1,0],[0,1,1,1,0]]) .  "\n";                                                                                       // Output: 1
echo closedIsland([[1,1,1,1,1,1,1], [1,0,0,0,0,0,1], [1,0,1,1,1,0,1], [1,0,1,0,1,0,1], [1,0,1,1,1,0,1], [1,0,0,0,0,0,1], [1,1,1,1,1,1,1]]) .  "\n";     // Output: 2
echo closedIsland([[0]]) .  "\n";                                                                                                                       // Output: 0
echo closedIsland([[1]]) .  "\n";                                                                                                                       // Output: 0
echo closedIsland([[1,1,1],[1,0,1],[1,1,1]]) .  "\n";                                                                                                   // Output: 1
echo closedIsland([[1,1,1],[1,1,1],[1,1,1]]) .  "\n";                                                                                                   // Output: 0
echo closedIsland([[0,0,0],[0,0,0],[0,0,0]]) .  "\n";                                                                                                   // Output: 0
?>
```

## Explanation:

- Let `m = count(grid)` and `n = count(grid[0])`.
- Check the first row and last row:
  - If a cell is `0`, flood-fill its entire connected component and mark it visited.
- Check the first column and last column:
  - If a cell is `0`, flood-fill its entire connected component and mark it visited.
- After removing boundary-connected land, scan all cells:
  - If `grid[i][j] === 0`, it is a closed island.
  - Increment the answer.
  - Flood-fill this island so it is not counted again.
- The flood fill uses a stack and processes 4-directional neighbors:
  - Up, down, left, right.
  - Marks each visited land cell as `1`.

## Complexity Analysis

- **Time Complexity:** `O(m * n)`
  - Each cell is visited at most a constant number of times during boundary flood fills and counting.
- **Space Complexity:** `O(m * n)` in the worst case
  - The iterative stack may contain `O(m * n)` cells.
  - The input grid is modified in place.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
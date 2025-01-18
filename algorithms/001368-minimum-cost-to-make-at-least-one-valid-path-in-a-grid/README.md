1368\. Minimum Cost to Make at Least One Valid Path in a Grid

**Difficulty:** Hard

**Topics:** `Array`, `Breadth-First Search`, `Graph`, `Heap (Priority Queue)`, `Matrix`, `Shortest Path`

Given an `m x n` grid. Each cell of the grid has a sign pointing to the next cell you should visit if you are currently in this cell. The sign of `grid[i][j]` can be:

- `1` which means go to the cell to the right. (i.e go from `grid[i][j]` to `grid[i][j + 1]`)
- `2` which means go to the cell to the left. (i.e go from `grid[i][j]` to `grid[i][j - 1]`)
- `3` which means go to the lower cell. (i.e go from `grid[i][j]` to `grid[i + 1][j]`)
- `4` which means go to the upper cell. (i.e go from `grid[i][j]` to `grid[i - 1][j]`)

Notice that there could be some signs on the cells of the grid that point outside the grid.

You will initially start at the upper left cell `(0, 0)`. A valid path in the grid is a path that starts from the upper left cell `(0, 0)` and ends at the bottom-right cell `(m - 1, n - 1)` following the signs on the grid. The valid path does not have to be the shortest.

You can modify the sign on a cell with `cost = 1`. You can modify the sign on a cell one time only.

Return _the minimum cost to make the grid have at least one valid path_.

**Example 1:**

![grid1](https://assets.leetcode.com/uploads/2020/02/13/grid1.png)

- **Input:** grid = [[1,1,1,1],[2,2,2,2],[1,1,1,1],[2,2,2,2]]
- **Output:** 3
- **Explanation:** You will start at point (0, 0).
  The path to (3, 3) is as follows. (0, 0) --> (0, 1) --> (0, 2) --> (0, 3) change the arrow to down with cost = 1 --> (1, 3) --> (1, 2) --> (1, 1) --> (1, 0) change the arrow to down with cost = 1 --> (2, 0) --> (2, 1) --> (2, 2) --> (2, 3) change the arrow to down with cost = 1 --> (3, 3)
  The total cost = 3.

**Example 2:**

![grid2](https://assets.leetcode.com/uploads/2020/02/13/grid2.png)

- **Input:** grid = [[1,1,3],[3,2,2],[1,1,4]]
- **Output:** 0
- **Explanation:** You can follow the path from (0, 0) to (2, 2).


**Example 3:**

![grid3](https://assets.leetcode.com/uploads/2020/02/13/grid3.png)

- **Input:** grid = [[1,2],[4,3]]
- **Output:** 1


**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 100`
- `1 <= grid[i][j] <= 4`


**Hint:**
1. Build a graph where `grid[i][j]` is connected to all the four side-adjacent cells with weighted edge. the weight is `0` if the sign is pointing to the adjacent cell or `1` otherwise.
2. Do BFS from `(0, 0)` visit all edges with `weight = 0` first. the answer is the distance to `(m -1, n - 1)`.



**Solution:**

We can use the **0-1 BFS** approach. The idea is to traverse the grid using a deque (double-ended queue) where the cost of modifying the direction determines whether a cell is added to the front or back of the deque. The grid is treated as a graph where each cell has weighted edges based on whether its current direction matches the movement to its neighbors.

Let's implement this solution in PHP: **[1368. Minimum Cost to Make at Least One Valid Path in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001368-minimum-cost-to-make-at-least-one-valid-path-in-a-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function minCost($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
$grid1 = [[1,1,1,1],[2,2,2,2],[1,1,1,1],[2,2,2,2]];
echo minCost($grid1) . "\n"; // Output: 3

$grid2 = [[1,1,3],[3,2,2],[1,1,4]];
echo minCost($grid2) . "\n"; // Output: 0

$grid3 = [[1,2],[4,3]];
echo minCost($grid3) . "\n"; // Output: 1
?>
```

### Explanation:

1. **Direction Mapping:** Each direction (`1` for right, `2` for left, `3` for down, `4` for up) is mapped to an array of movement deltas `[dx, dy]`.

2. **0-1 BFS:**
   - A deque is used to prioritize cells with lower costs. Cells that do not require modifying the direction are added to the front (`unshift`), while those that require a modification are added to the back (`enqueue`).
   - This ensures that cells are processed in increasing order of cost.

3. **Distance Array:** A 2D array `$dist` keeps track of the minimum cost to reach each cell. It is initialized with `PHP_INT_MAX` for all cells except the starting cell `(0, 0)`.

4. **Edge Weights:**
   - If the current cell's sign matches the intended direction, the cost remains the same.
   - Otherwise, modifying the direction incurs a cost of `1`.

5. **Termination:** The loop terminates once all cells have been processed. The result is the value in `$dist[$m - 1][$n - 1]`, representing the minimum cost to reach the bottom-right corner.

### Complexity:
- **Time Complexity:** _**O(m × n)**_, since each cell is processed once.
- **Space Complexity:** _**O(m × n)**_, for the distance array and deque.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**




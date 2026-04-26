1559\. Detect Cycles in 2D Grid

**Difficulty:** Medium

**Topics:** `Senior Staff`, `Array`, `Depth-First Search`, `Breadth-First Search`, `Union-Find`, `Matrix`, `Biweekly Contest 33`

Given a 2D array of characters `grid` of size `m x n`, you need to find if there exists any cycle consisting of the **same value** in `grid`.

A cycle is a path of **length 4 or more** in the grid that starts and ends at the same cell. From a given cell, you can move to one of the cells adjacent to it - in one of the four directions (up, down, left, or right), if it has the **same value** of the current cell.

Also, you cannot move to the cell that you visited in your last move. For example, the cycle` (1, 1) -> (1, 2) -> (1, 1)` is invalid because from `(1, 2)` we visited `(1, 1)` which was the last visited cell.

Return `true` if any cycle of the same value exists in `grid`, otherwise, return `false`.

**Example 1:**

![1](https://assets.leetcode.com/uploads/2020/07/15/1.png)

- **Input:** grid = [["a","a","a","a"],["a","b","b","a"],["a","b","b","a"],["a","a","a","a"]]
- **Output:** true
- **Explanation:** There are two valid cycles shown in different colors in the image below:
   ![11](https://assets.leetcode.com/uploads/2020/07/15/11.png)

**Example 2:**

![22](https://assets.leetcode.com/uploads/2020/07/15/22.png)

- **Input:** grid = [["c","c","c","a"],["c","d","c","c"],["c","c","e","c"],["f","c","c","c"]]
- **Output:** true
- **Explanation:** There is only one valid cycle highlighted in the image below:
  ![2](https://assets.leetcode.com/uploads/2020/07/15/2.png)

**Example 3:**

![3](https://assets.leetcode.com/uploads/2020/07/15/3.png)

- **Input:** grid = [["a","b","b"],["b","z","b"],["b","b","a"]]
- **Output:** false

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 500`
- `grid` consists only of lowercase English letters.



**Hint:**
1. Keep track of the parent (previous position) to avoid considering an invalid path.
2. Use DFS or BFS and keep track of visited cells to see if there is a cycle.






**Solution:**

We need to detect a cycle where all cells in the cycle have the same character, the cycle length is at least 4, and we cannot instantly go back to the parent cell.
A cycle exists if during DFS/BFS we encounter a cell that is already visited and is **not the parent cell** — because if it’s visited and not parent, then we’ve found a cycle.

### Approach:

We can solve this with **DFS**, keeping track of the `parent` of each cell in the traversal so we can avoid simply backtracking to the previous cell.

**Steps:**

1. Loop through each cell, if not visited, start DFS.
2. In DFS:
   - Mark current cell as visited.
   - Explore all four neighbors with the **same character**.
   - If the neighbor is visited and is not the parent cell → cycle found.
   - If neighbor not visited, recurse with current cell as parent.
3. If at any point we find a cycle, return `true`.
4. If no cycles found after all cells, return `false`.

Let's implement this solution in PHP: **[1559. Detect Cycles in 2D Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001559-detect-cycles-in-2d-grid/solution.php)**

```php
<?php
/**
 * @param String[][] $grid
 * @return Boolean
 */
function containsCycle(array $grid): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo containsCycle([["a","a","a","a"],["a","b","b","a"],["a","b","b","a"],["a","a","a","a"]]) . "\n";           // Output: true
echo containsCycle([["c","c","c","a"],["c","d","c","c"],["c","c","e","c"],["f","c","c","c"]]) . "\n";           // Output: true
echo containsCycle([["a","b","b"],["b","z","b"],["b","b","a"]]) . "\n";                                         // Output: false
?>
```

### Explanation:

- **DFS function** Marks current cell as visited, stores its character, and checks all four directions.
- **Neighbor validity** Ensures neighbor is within bounds and has the same character as the current cell.
- **Cycle check** If neighbor is visited and is **not** the parent → cycle exists → return `true`.
- **Recursive exploration** If neighbor is unvisited, recursively call DFS. If any call returns `true`, propagate result.
- **Main loop** For each unvisited cell, start DFS. If cycle found, return `true` immediately.
- **No cycle found** After traversing all cells, return `false`.

### Complexity
- **Time Complexity**: _**O(m × n)**_, Each cell is visited once in DFS (ignoring constant-time neighbor checks).
- **Space Complexity**: _**O(m × n)**_, For the `visited` matrix and the recursion stack in worst case (e.g., entire grid same char forming a path).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
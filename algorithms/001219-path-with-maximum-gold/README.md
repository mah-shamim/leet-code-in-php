1219\. Path with Maximum Gold

**Difficulty:** Medium

**Topics:** `Array`, `Backtracking`, `Matrix`

In a gold mine `grid` of size `m x n`, each cell in this mine has an integer representing the amount of gold in that cell, `0` if it is empty.

Return the maximum amount of gold you can collect under the conditions:

- Every time you are located in a cell you will collect all the gold in that cell.
- From your position, you can walk one step to the left, right, up, or down.
- You can't visit the same cell more than once.
- Never visit a cell with `0` gold.
- You can start and stop collecting gold from **any** position in the grid that has some gold.


**Example 1:**

- **Input:** grid = [[0,6,0],[5,8,7],[0,9,0]]
- **Output:** 24
- **Explanation:** \
  [[0,6,0],\
  [5,8,7],\
  [0,9,0]]\
  Path to get the maximum gold, 9 -> 8 -> 7.

**Example 2:**

- **Input:** grid = [[1,0,7],[2,0,6],[3,4,5],[0,3,0],[9,0,20]]
- **Output:** 28 
- **Explanation:** \
  [[1,0,7],\
  [2,0,6],\
  [3,4,5],\
  [0,3,0],\
  [9,0,20]]\
  Path to get the maximum gold, 1 -> 2 -> 3 -> 4 -> 5 -> 6 -> 7.


**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 15`
- `0 <= grid[i][j] <= 100`
- There are at most **25** cells containing gold.


**Hint:**
1. Use recursion to try all such paths and find the one with the maximum value.



**Solution:**

The "Path with Maximum Gold" problem is a typical backtracking problem where we need to find the maximum amount of gold we can collect in a grid-based mine. The challenge is to explore different paths under certain conditions like not revisiting any cell and avoiding cells that contain 0 gold. This problem requires recursive exploration of possible paths, which is where the backtracking approach comes in.

### Key Points

1. **Grid Representation**: The grid is a 2D matrix with each cell representing either a gold amount (positive integer) or 0 if it's empty.
2. **Movement**: we can move up, down, left, or right from any given cell.
3. **Goal**: Maximize the total gold collected by exploring valid paths.
4. **Constraints**: we cannot visit the same cell more than once and must avoid cells with 0 gold.

### Approach

1. **Depth-First Search (DFS)**: The idea is to use recursion (DFS) to explore each potential path starting from any cell that contains gold.
2. **Backtracking**: At each cell, after exploring the four possible directions (up, down, left, right), backtrack by restoring the state of the grid (i.e., marking the cell as unvisited).
3. **Memoization**: To avoid re-exploring paths, we can mark cells as visited temporarily by setting their value to 0. Once we return from that path, we restore the cell value.
4. **Track the Maximum**: For each starting cell, run the DFS and track the maximum gold collected by comparing it to the previously found maximum.

### Plan

1. **Initialization**: Get the dimensions of the grid.
2. **DFS Function**: Implement a helper function that takes the current coordinates and recursively explores all four possible directions.
3. **Iterate Through Grid**: Start DFS from each cell that contains gold, keeping track of the maximum gold collected.

Let's implement this solution in PHP: **[1219. Path with Maximum Gold](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001219-path-with-maximum-gold/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function getMaximumGold($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$grid1 = [[0,6,0],[5,8,7],[0,9,0]];
$grid2 = grid = [[1,0,7],[2,0,6],[3,4,5],[0,3,0],[9,0,20]];

echo getMaximumGold($grid1) . "\n"; // Output: 24
echo getMaximumGold($grid2) . "\n"; // Output: 28
?>
```

### Explanation:

The DFS function works as follows:
- If the current position is out of bounds or the cell has no gold (`grid[i][j] == 0`), return 0.
- Temporarily mark the current cell as visited by setting it to 0.
- Explore all four directions (up, down, left, right), and add the gold from the current cell to the maximum gold collected from the next valid positions.
- Restore the cell value after exploring.
- The main function iterates through all cells and keeps track of the maximum gold collected.

### Example Walkthrough

**Example 1:**
```php
grid = [
    [0,6,0],
    [5,8,7],
    [0,9,0]
]
```

- Start from cell `(1,1)` which has 8 gold.
- From there, move to `(1,2)` with 7 gold, then to `(2,2)` with 9 gold.
- Collecting the total gold: `9 + 8 + 7 = 24`.

**Example 2:**
```php
grid = [
    [1,0,7],
    [2,0,6],
    [3,4,5],
    [0,3,0],
    [9,0,20]
]
```

- Start from cell `(4,2)` with 20 gold.
- Then move to `(2,2)` with 5 gold, then to `(2,1)` with 6 gold, and so on.
- Collecting the total gold: `1 + 2 + 3 + 4 + 5 + 6 + 7 = 28`.

### Time Complexity

The time complexity is **O(m * n)**, where `m` is the number of rows and `n` is the number of columns in the grid. This is because each cell is visited once during the DFS exploration.

- **DFS Calls**: Each DFS call explores four possible directions.
- **Worst Case**: In the worst case, we explore all cells, leading to a time complexity of **O(m * n)**.

### Output for Example

For the example inputs:

1. **Input 1:**
```php
grid = [
    [0,6,0],
    [5,8,7],
    [0,9,0]
]
```
**Output:** `24`

2. **Input 2:**
```php
grid = [
    [1,0,7],
    [2,0,6],
    [3,4,5],
    [0,3,0],
    [9,0,20]
]
```
**Output:** `28`


The "Path with Maximum Gold" problem is a great exercise in using DFS with backtracking. It requires careful exploration of all possible paths in a grid while ensuring we do not revisit cells. The approach demonstrated here ensures we can find the maximum amount of gold efficiently by using recursion and backtracking. The time complexity of **O(m * n)** makes the solution feasible even for the largest grid sizes, within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


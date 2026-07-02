3286\. Find a Safe Walk Through a Grid

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Breadth-First Search`, `Graph Theory`, `Heap (Priority Queue)`, `Matrix`, `Shortest Path`, `Biweekly Contest 139`

You are given an `m x n` binary matrix `grid` and an integer `health`.

You start on the upper-left corner `(0, 0)` and would like to get to the lower-right corner `(m - 1, n - 1)`.

You can move up, down, left, or right from one cell to another adjacent cell as long as your health _remains_ **positive**.

Cells `(i, j)` with `grid[i][j] = 1` are considered **unsafe** and reduce your health by 1.

Return `true` if you can reach the final cell with a health value of 1 or more, and `false` otherwise.

**Example 1:**

- **Input:** grid = [[0,1,0,0,0],[0,1,0,1,0],[0,0,0,1,0]], health = 1
- **Output:** true
- **Explanation:** The final cell can be reached safely by walking along the gray cells below.

![3868_examples_1drawio](https://assets.leetcode.com/uploads/2024/08/04/3868_examples_1drawio.png)

**Example 2:**

- **Input:** grid = [[0,1,1,0,0,0],[1,0,1,0,0,0],[0,1,1,1,0,1],[0,0,1,0,1,0]], health = 3
- **Output:** false
- **Explanation:** A minimum of 4 health points is needed to reach the final cell safely.

![3868_examples_2drawio](https://assets.leetcode.com/uploads/2024/08/04/3868_examples_2drawio.png)

**Example 3:**

- **Input:** grid = [[1,1,1],[1,0,1],[1,1,1]], health = 5
- **Output:** true
- **Explanation:** The final cell can be reached safely by walking along the gray cells below.

![3868_examples_3drawio](https://assets.leetcode.com/uploads/2024/08/04/3868_examples_3drawio.png)
   - Any path that does not go through the cell `(1, 1)` is unsafe since your health will drop to 0 when reaching the final cell.

**Example 4:**

- **Input:** grid = [[0,0],[0,0]], health = 2
- **Output:** true

**Example 5:**

- **Input:** grid = [[1,1],[1,1]], health = 3
- **Output:** true

**Example 6:**

- **Input:** grid = [[1,1],[1,1]], health = 2
- **Output:** false

**Example 7:**

- **Input:** grid = [[0,0,0],[0,1,0],[0,0,0]], health = 1
- **Output:** false

**Example 8:**

- **Input:** grid = [[0,0,0],[0,1,0],[0,0,0]], health = 2
- **Output:** true

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 50`
- `2 <= m * n`
- `1 <= health <= m + n`
- `grid[i][j]` is either 0 or 1.


**Hint:**
1. Use 01 BFS.


**Similar Questions:**
1. [1293. Shortest Path in a Grid with Obstacles Elimination](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001293-shortest-path-in-a-grid-with-obstacles-elimination)


**Solution:**

We implement an efficient solution using **0-1 BFS** (Breadth-First Search) to find the minimum health loss path through a grid where unsafe cells (value 1) cost 1 health point and safe cells (value 0) cost 0 health points. This approach treats the grid as a weighted graph with edge weights of 0 or 1, allowing us to find the optimal path using a deque for O(m×n) time complexity rather than the slower Dijkstra's algorithm.

## Approach

- **Problem Modeling**: We model the grid as a graph where each cell is a node, and moving to an adjacent cell has a cost equal to the destination cell's value (`0` or `1`). The starting cell's value is included in the initial cost.
- **0-1 BFS Selection**: Since edge weights are only 0 or 1, we use 0-1 BFS instead of Dijkstra's algorithm. This gives us _**O(m×n)**_ time complexity instead of _**O(m×n × log(m×n))**_, making it more efficient for the given constraints.
- **Distance Tracking**: We maintain a distance array `dist[i][j]` that stores the minimum health loss (accumulated unsafe cells) required to reach cell `(i, j)` from the start.
- **Deque Operations**: We use a double-ended queue (`SplDoublyLinkedList`) where:
   - **0-cost edges** (moving to safe cells) are pushed to the **front** of the deque for immediate processing
   - **1-cost edges** (moving to unsafe cells) are pushed to the **back** of the deque
- **Early Termination Optimization**: While not explicitly implemented, we could terminate early when reaching the destination, but the current implementation computes the full distance array.
- **Final Check**: The algorithm checks if the minimum health loss to reach `(m-1, n-1)` is **less than** the initial health, ensuring we end with health `≥ 1`.

Let's implement this solution in PHP: **[3286. Find a Safe Walk Through a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003286-find-a-safe-walk-through-a-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $health
 * @return Boolean
 */
function findSafeWalk(array $grid, int $health): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findSafeWalk([[0,1,0,0,0],[0,1,0,1,0],[0,0,0,1,0]], 1) .  "\n";                            // Output: true
echo findSafeWalk([[0,1,1,0,0,0],[1,0,1,0,0,0],[0,1,1,1,0,1],[0,0,1,0,1,0]], 3) .  "\n";        // Output: false
echo findSafeWalk([[1,1,1],[1,0,1],[1,1,1]], 5) .  "\n";                                        // Output: true
echo findSafeWalk([[0,0],[0,0]], 2) .  "\n";                                                    // Output: true
echo findSafeWalk([[1,1],[1,1]], 3) .  "\n";                                                    // Output: true
echo findSafeWalk([[1,1],[1,1]], 2) .  "\n";                                                    // Output: false
echo findSafeWalk([[0,0,0],[0,1,0],[0,0,0]], 1) .  "\n";                                        // Output: false
echo findSafeWalk([[0,0,0],[0,1,0],[0,0,0]], 2) .  "\n";                                        // Output: true
?>
```

### Explanation:

- **Initialization**: We start by setting `dist[0][0] = grid[0][0]` because entering the starting cell costs its value. All other distances are set to `PHP_INT_MAX`.
- **BFS Processing**: We pop cells from the front of the deque. For each popped cell, we explore all 4 directional neighbors.
- **Cost Calculation**: When moving to a neighbor `(nx, ny)`, the new cost is `dist[x][y] + grid[nx][ny]`. If this is less than the currently stored distance for that neighbor, we update it.
- **Deque Priority**:
   - If the neighbor is safe (`grid[nx][ny] == 0`), it represents a 0-cost edge, so we push it to the **front** of the deque to prioritize exploring safer paths first.
   - If the neighbor is unsafe (`grid[nx][ny] == 1`), it represents a 1-cost edge, so we push it to the **back** of the deque.
- **Path Validation**: After BFS completes, we check if `dist[m-1][n-1] < health`. This ensures the health remains positive (≥ 1) upon reaching the destination.
- **Correctness Guarantee**: 0-1 BFS guarantees that when we first pop a node from the deque, we have found its shortest distance, similar to how Dijkstra's algorithm works with a priority queue.

## Complexity Analysis

- **Time Complexity**: O(m × n) where m is the number of rows and n is the number of columns. Each cell is processed at most once when popped from the deque, and each edge (4 per cell) is examined once.
- **Space Complexity**: O(m × n) for the distance array and the deque, which in the worst case can hold all cells.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
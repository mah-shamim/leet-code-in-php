417\. Pacific Atlantic Water Flow

**Difficulty:** Medium

**Topics:** `Array`, `Depth-First Search`, `Breadth-First Search`, `Matrix`

There is an `m x n` rectangular island that borders both the **Pacific Ocean** and **Atlantic Ocean**. The **Pacific Ocean** touches the island's left and top edges, and the **Atlantic Ocean** touches the island's right and bottom edges.

The island is partitioned into a grid of square cells. You are given an `m x n` integer matrix `heights` where `heights[r][c]` represents the **height above sea level** of the cell at coordinate `(r, c)`.

The island receives a lot of rain, and the rain water can flow to neighboring cells directly north, south, east, and west if the neighboring cell's height is **less than or equal** to the current cell's height. Water can flow from any cell adjacent to an ocean into the ocean.

Return _a **2D list** of grid coordinates `result` where `result[i] = [rᵢ, cᵢ]` denotes that rain water can flow from cell `(rᵢ, cᵢ)` to **both** the Pacific and Atlantic oceans_.

**Example 1:**

![waterflow-grid](https://assets.leetcode.com/uploads/2021/06/08/waterflow-grid.jpg)

- **Input:** heights = [[1,2,2,3,5],[3,2,3,4,4],[2,4,5,3,1],[6,7,1,4,5],[5,1,1,2,4]]
- **Output:** [[0,4],[1,3],[1,4],[2,2],[3,0],[3,1],[4,0]]
- **Explanation:** The following cells can flow to the Pacific and Atlantic oceans, as shown below:
  [0,4]: [0,4] -> Pacific Ocean
  [0,4] -> Atlantic Ocean
  [1,3]: [1,3] -> [0,3] -> Pacific Ocean
  [1,3] -> [1,4] -> Atlantic Ocean
  [1,4]: [1,4] -> [1,3] -> [0,3] -> Pacific Ocean
  [1,4] -> Atlantic Ocean
  [2,2]: [2,2] -> [1,2] -> [0,2] -> Pacific Ocean
  [2,2] -> [2,3] -> [2,4] -> Atlantic Ocean
  [3,0]: [3,0] -> Pacific Ocean
  [3,0] -> [4,0] -> Atlantic Ocean
  [3,1]: [3,1] -> [3,0] -> Pacific Ocean
  [3,1] -> [4,1] -> Atlantic Ocean
  [4,0]: [4,0] -> Pacific Ocean
  [4,0] -> Atlantic Ocean
  Note that there are other possible paths for these cells to flow to the Pacific and Atlantic oceans.

**Example 2:**

- **Input:** heights = [[1]]
- **Output:** [[0,0]]
- **Explanation:** The water can flow from the only cell to the Pacific and Atlantic oceans.

**Constraints:**

- `m == heights.length`
- `n == heights[r].length`
- `1 <= m, n <= 200`
- `0 <= heights[r][c] <= 10⁵`







**Solution:**

We need to determine which cells in a given grid can allow rainwater to flow to both the Pacific and Atlantic oceans. The Pacific Ocean borders the top and left edges of the grid, while the Atlantic Ocean borders the bottom and right edges. Water can flow from a cell to neighboring cells in the four cardinal directions if the neighboring cell's height is less than or equal to the current cell's height.

### Approach
1. **Problem Analysis**: The problem requires identifying cells from which water can flow to both oceans. Directly checking each cell would be inefficient due to the grid size (up to 200x200). Instead, we use a reverse traversal approach starting from the ocean borders.
2. **Key Insight**: Water flows from higher to lower (or equal) elevations. By starting from the ocean borders and moving inland, we can mark all cells that can reach each ocean. Cells that can be reached from both oceans are our answer.
3. **Algorithm Selection**: We use Depth-First Search (DFS) to traverse the grid from the borders. We maintain two separate matrices to track cells reachable from the Pacific and Atlantic oceans.
4. **Complexity Analysis**: The algorithm processes each cell once for each ocean, resulting in a time complexity of O(m * n), where m and n are the grid dimensions. The space complexity is also O(m * n) to store the visited matrices and the recursion stack.

Let's implement this solution in PHP: **[417. Pacific Atlantic Water Flow](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000417-pacific-atlantic-water-flow/solution.php)**

```php
<?php
/**
 * @param Integer[][] $heights
 * @return Integer[][]
 */
function pacificAtlantic($heights) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$heights1 = [
    [1,2,2,3,5],
    [3,2,3,4,4],
    [2,4,5,3,1],
    [6,7,1,4,5],
    [5,1,1,2,4]
];
print_r(pacificAtlantic($heights1));
// Expected: [[0,4],[1,3],[1,4],[2,2],[3,0],[3,1],[4,0]]

$heights2 = [[1]];
print_r(pacificAtlantic($heights2));
// Expected: [[0,0]]
?>
```

### Explanation:

1. **Initialization**: We create two matrices, `pacific` and `atlantic`, to mark cells reachable from each ocean.
2. **DFS from Borders**: We perform DFS starting from the top and left borders for the Pacific Ocean, and from the bottom and right borders for the Atlantic Ocean. This marks all cells that can flow into each ocean.
3. **Result Collection**: We iterate through all cells to find those marked in both matrices, indicating they can flow to both oceans.
4. **DFS Function**: The DFS function checks all four directions from a cell, continuing the traversal if the adjacent cell is within bounds, unvisited, and has a height greater than or equal to the current cell.

This approach efficiently narrows down the solution by leveraging reverse traversal from the ocean borders, ensuring optimal performance even for the upper constraint limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
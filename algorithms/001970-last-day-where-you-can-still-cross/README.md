1970\. Last Day Where You Can Still Cross

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Matrix`, `Weekly Contest 254`

There is a **1-based** binary matrix where `0` represents land and `1` represents water. You are given integers `row` and `col` representing the number of rows and columns in the matrix, respectively.

Initially on day `0`, the **entire** matrix is **land**. However, each day a new cell becomes flooded with **water**. You are given a **1-based** 2D array `cells`, where `cells[i] = [rᵢ, cᵢ]` represents that on the `iᵗʰ` day, the cell on the `rᵢᵗʰ` row and `cᵢᵗʰ` column (**1-based** coordinates) will be covered with **water** (i.e., changed to `1`).

You want to find the **last** day that it is possible to walk from the **top** to the **bottom** by only walking on land cells. You can start from **any** cell in the top row and end at **any** cell in the bottom row. You can only travel in the **four** cardinal directions (left, right, up, and down).

Return _the **last** day where it is possible to walk from the **top** to the **bottom** by only walking on land cells_.

**Example 1:**

![1](https://assets.leetcode.com/uploads/2021/07/27/1.png)

- **Input:** row = 2, col = 2, cells = [[1,1],[2,1],[1,2],[2,2]]
- **Output:** 2
- **Explanation:** The above image depicts how the matrix changes each day starting from day 0.
  The last day where it is possible to cross from top to bottom is on day 2.

**Example 2:**

![2](https://assets.leetcode.com/uploads/2021/07/27/2.png)

- **Input:** row = 2, col = 2, cells = [[1,1],[1,2],[2,1],[2,2]]
- **Output:** 1
- **Explanation:** The above image depicts how the matrix changes each day starting from day 0.
  The last day where it is possible to cross from top to bottom is on day 1.

**Example 3:**

![3](https://assets.leetcode.com/uploads/2021/07/27/3.png)

- **Input:** row = 3, col = 3, cells = [[1,2],[2,1],[3,3],[2,2],[1,1],[1,3],[2,3],[3,2],[3,1]]
- **Output:** 3
- **Explanation:** The above image depicts how the matrix changes each day starting from day 0.
  The last day where it is possible to cross from top to bottom is on day 3.

**Constraints:**

- `2 <= row, col <= 2 * 10⁴`
- `4 <= row * col <= 2 * 10⁴`
- `cells.length == row * col`
- `1 <= rᵢ <= row`
- `1 <= cᵢ <= col`
- All the values of `cells` are **unique**.



**Hint:**
1. What graph algorithm allows us to find whether a path exists?
2. Can we use binary search to help us solve the problem?


**Similar Questions:**
1. [803. Bricks Falling When Hit](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000803-bricks-falling-when-hit)
2. [2258. Escape the Spreading Fire](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002258-escape-the-spreading-fire)






**Solution:**

We need to find the last day when we can still travel from top to bottom through land cells. The challenge is that we have up to 2×10⁴ cells, so we need an efficient approach.

### Approach:

- **Binary Search:**  
  Leverage binary search over the range of days (1 to `row * col`) to efficiently find the last feasible day. The monotonic nature of the problem—if crossing is possible on day `d`, it's possible on any earlier day, and if impossible on day `d`, it's impossible on any later day—makes binary search applicable.

- **Feasibility Check (BFS):**  
  For each candidate day `mid`, simulate the grid state by flooding the first `mid` cells from `cells`. Then, perform a BFS from all land cells in the top row to determine if a path to the bottom row exists using only land cells.

- **Optimization:**  
  The BFS explores only land cells (value `0`), avoiding water (`1`) and visited cells, ensuring an efficient search for connectivity between the top and bottom rows.

Let's implement this solution in PHP: **[1970. Last Day Where You Can Still Cross](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001970-last-day-where-you-can-still-cross/solution.php)**

```php
<?php
class Solution {
    private int $row;
    private int $col;
    private array $cells;

    /**
     * @param Integer $row
     * @param Integer $col
     * @param Integer[][] $cells
     * @return Integer
     */
    function latestDayToCross(int $row, int $col, array $cells): int
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param int $day
     * @return bool
     */
    private function canCross(int $day): bool
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Test cases

$latestDayToCross = new Solution();
$row = 2;
$col = 2;
$cells = [[1,1],[2,1],[1,2],[2,2]];
$result = $latestDayToCross->latestDayToCross($row, $col, $cells);
echo $result . "\n"; // Output: 2 


$row = 2;
$col = 2;
$cells = [[1,1],[1,2],[2,1],[2,2]];
$result = $latestDayToCross->latestDayToCross($row, $col, $cells);
echo $result . "\n"; // Output: 1


$row = 3;
$col = 3;
$cells = [[1,2],[2,1],[3,3],[2,2],[1,1],[1,3],[2,3],[3,2],[3,1]];
$result = $latestDayToCross->latestDayToCross($row, $col, $cells);
echo $result . "\n"; // Output: 3
?>
```

### Explanation:

1. **Binary Search Setup:**
   - Initialize `left = 1` and `right = row * col`.
   - While `left <= right`, compute `mid` as the midpoint.
   - Use the `canCross` helper to check if crossing is possible on day `mid`.

2. **Grid Simulation for Day `mid`:**
   - Create a `row × col` grid initialized with land (`0`).
   - Flood the first `mid` cells from `cells` by setting their values to water (`1`).

3. **BFS Pathfinding:**
   - Start BFS from every land cell in the top row, marking them as visited.
   - Explore adjacent cells in four cardinal directions, enqueueing unvisited land cells.
   - If any cell in the bottom row is reached, return `true` (crossing is possible).
   - If BFS exhausts without reaching the bottom row, return `false`.

4. **Binary Search Adjustment:**
   - If `canCross(mid)` returns `true`, update the answer to `mid` and search the right half (`left = mid + 1`) for a later feasible day.
   - If `false`, search the left half (`right = mid - 1`) for an earlier feasible day.

5. **Complexity:**
   - **Time Complexity:** O((row * col) log(row * col)), due to O(row * col) BFS per binary search step.
   - **Space Complexity:** O(row * col) for the grid and BFS data structures.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
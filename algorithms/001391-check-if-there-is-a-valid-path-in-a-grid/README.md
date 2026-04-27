1391\. Check if There is a Valid Path in a Grid

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Depth-First Search`, `Breadth-First Search`, `Union-Find`, `Matrix`, `Weekly Contest 181`

You are given an `m x n` `grid`. Each cell of `grid` represents a street. The street of `grid[i][j]` can be:

- `1` which means a street connecting the left cell and the right cell.
- `2` which means a street connecting the upper cell and the lower cell.
- `3` which means a street connecting the left cell and the lower cell.
- `4` which means a street connecting the right cell and the lower cell.
- `5` which means a street connecting the left cell and the upper cell.
- `6` which means a street connecting the right cell and the upper cell.

![main](https://assets.leetcode.com/uploads/2020/03/05/main.png)

You will initially start at the street of the upper-left cell `(0, 0)`. A valid path in the grid is a path that starts from the upper left cell `(0, 0)` and ends at the bottom-right cell `(m - 1, n - 1)`. **The path should only follow the streets**.

**Notice** that you are **not allowed** to change any street.

Return _`true` if there is a valid path in the grid or `false` otherwise_.


**Example 1:**

![e1](https://assets.leetcode.com/uploads/2020/03/05/e1.png)

- **Input:** grid = [[2,4,3],[6,5,2]]
- **Output:** true
- **Explanation:** As shown you can start at cell `(0, 0)` and visit all the cells of the grid to reach `(m - 1, n - 1)`.

**Example 2:**

![e2](https://assets.leetcode.com/uploads/2020/03/05/e2.png)

- **Input:** grid = [[1,2,1],[1,2,1]]
- **Output:** false
- **Explanation:** As shown you the street at cell `(0, 0)` is not connected with any street of any other cell and you will get stuck at cell `(0, 0)`

**Example 3:**

- **Input:** grid = [[1,1,2]]
- **Output:** false
- **Explanation:** You will get stuck at cell `(0, 1)` and you cannot reach cell `(0, 2)`.

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 300`
- `1 <= grid[i][j] <= 6`



**Hint:**
1. Start DFS from the node `(0, 0)` and follow the path till you stop.
2. When you reach a cell and cannot move anymore check that this cell is `(m - 1, n - 1)` or `not`.



**Similar Questions:**
1. [2267. Check if There Is a Valid Parentheses String Path](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002267-check-if-there-is-a-valid-parentheses-string-path)






**Solution:**

The problem requires checking whether there exists a valid path from the **top-left** cell `(0, 0)` to the **bottom-right** cell `(m-1, n-1)` strictly following the predefined connections of each street type. A **DFS (Depth-First Search)** approach is used to explore connected cells according to street shapes, ensuring movement is only possible when the current street and the neighbor’s street align properly.

### Approach:

- **Grid Traversal with DFS** Start from the source cell `(0, 0)` and recursively explore reachable cells.
- **Street Connection Mapping** Each street type (1–6) has specific connection directions:  `0=Up`, `1=Right`, `2=Down`, `3=Left`.
- **Compatibility Check Between Cells** When moving from a cell to a neighbor, the neighbor must support the *opposite movement direction* relative to the current cell.
- **Visited Tracking** Prevent revisiting cells to avoid infinite loops.
- **Termination Condition** Stop and return `true` if the bottom-right cell is reached.

Let's implement this solution in PHP: **[1391. Check if There is a Valid Path in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001391-check-if-there-is-a-valid-path-in-a-grid/solution.php)**

```php
<?php
class Solution {
    private int $m;
    private int $n;
    private array $grid;

    // Directions: up, right, down, left
    private array $dirs = [[-1, 0], [0, 1], [1, 0], [0, -1]];

    // For each street type (1-6), list of directions it connects to
    // Up:0, Right:1, Down:2, Left:3
    private array $connections = [
        1 => [1, 3],      // left and right
        2 => [0, 2],      // up and down
        3 => [2, 3],      // down and left
        4 => [1, 2],      // right and down
        5 => [0, 3],      // up and left
        6 => [0, 1]       // up and right
    ];

    // Inverse mapping: from direction to required connection in neighbor
    // If we go from current cell to neighbor in direction d,
    // neighbor must have the opposite direction in its connections
    private array $opposite = [2, 3, 0, 1]; // opposite[0]=2 (up<->down), etc.

    /**
     * @param Integer[][] $grid
     * @return Boolean
     */
    function hasValidPath(array $grid): bool
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $r
     * @param $c
     * @param $visited
     * @return bool
     */
    private function dfs($r, $c, &$visited): bool
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
$solution = new Solution();
$result1 = $solution->hasValidPath([[2,4,3],[6,5,2]]);
echo ($result1 ? "true" : "false") . "\n\n";            // Output: true
$result1 = $solution->hasValidPath([[1,2,1],[1,2,1]]);
echo ($result1 ? "true" : "false") . "\n\n";            // Output: false
$result1 = $solution->hasValidPath([[1,1,2]]);
echo ($result1 ? "true" : "false") . "\n\n";            // Output: false
?>
```

### Explanation:

- **Street Connections Array**  
  - For each street type, store which directions it connects to.  
  - Example:
    - Street 1 (left-right) → `[3, 1]` (Left, Right)
    - Street 2 (up-down) → `[0, 2]` (Up, Down)

- **Opposite Directions Array**  
  - For a given moving direction, the entering direction for the neighbor is opposite.  
  - Example: If we go *right (1)*, the neighbor must accept entry from *left (3)*.

- **DFS Logic**
   1. If current cell is the destination → return `true`.
   2. Mark current cell as visited.
   3. For each allowed direction of current street:
      - Compute neighbor coordinates.
      - If neighbor inside bounds and not visited:
         - Check if neighbor’s connections include the required opposite direction.
         - If yes, recursively DFS from neighbor.
         - If DFS returns `true`, propagate `true`.
   4. If all directions fail, return `false`.

- **Why DFS Works** Since the path is deterministic once you choose a valid direction (no cycles possible except back-and-forth which visited prevents), DFS reliably explores all possible connected routes.


### Complexity
- **Time Complexity**: _**O(m * n)**_, Each cell is visited at most once, and at each cell, only a constant number of directions is checked.
- **Space Complexity**: _**O(m * n)**_, For the visited matrix and recursion stack in worst case (if the grid is fully traversable).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
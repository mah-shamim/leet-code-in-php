1260\. Shift 2D Grid

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Matrix`, `Simulation`, `Weekly Contest 163`

Given a 2D `grid` of size `m x n` and an integer `k`. You need to shift the `grid` `k` times.

In one shift operation:

- Element at `grid[i][j]` moves t`o grid[i][j + 1]`.
- Element at `grid[i][n - 1]` moves to `grid[i + 1][0]`.
- Element at `grid[m - 1][n - 1]` moves to `grid[0][0]`.

Return _the 2D grid after applying shift operation `k` times_.

**Example 1:**

![e1](https://assets.leetcode.com/uploads/2019/11/05/e1.png)

- **Input:** grid = [[1,2,3],[4,5,6],[7,8,9]], k = 1
- **Output:** [[9,1,2],[3,4,5],[6,7,8]]

**Example 2:**

![e2](https://assets.leetcode.com/uploads/2019/11/05/e2.png)

- **Input:** grid = [[3,8,1,9],[19,7,2,5],[4,6,11,10],[12,0,21,13]], k = 4
- **Output:** [[12,0,21,13],[3,8,1,9],[19,7,2,5],[4,6,11,10]]

**Example 3:**

- **Input:** grid = [[1,2,3],[4,5,6],[7,8,9]], k = 9
- **Output:** [[1,2,3],[4,5,6],[7,8,9]]

**Example 4:**

- **Input:** grid = [[5]], k = 3
- **Output:** [[5]]

**Example 5:**

- **Input:** grid = [[1,2,3,4]], k = 2
- **Output:** [[3,4,1,2]]

**Example 6:**

- **Input:** grid = [[1],[2],[3],[4]], k = 2
- **Output:** [[3],[4],[1],[2]]

**Example 7:**

- **Input:** grid = [[1,2],[3,4]], k = 0
- **Output:** [[1,2],[3,4]]

**Example 8:**

- **Input:** grid = [[1,2],[3,4]], k = 100
- **Output:** [[3,4],[1,2]]

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m <= 50`
- `1 <= n <= 50`
- `-1000 <= grid[i][j] <= 1000`
- `0 <= k <= 100`


**Hint:**
1. Simulate step by step. move `grid[i][j]` to `grid[i][j+1]`. handle last column of the grid.
2. Put the matrix row by row to a vector. take `k % vector.length` and move last `k` of the vector to the beginning. put the vector to the matrix back the same way.


**Solution:**

We solve this problem by flattening the 2D grid into a 1D array, performing an efficient rotation using modular arithmetic, and then reconstructing the 2D grid. This approach avoids simulating each shift operation individually, which would be inefficient for larger k values.

## Approach

- **Flatten the matrix** - Convert the 2D grid into a 1D array by traversing row by row
- **Calculate effective shifts** - Use modulo operation (`k % total_elements`) to handle shifts that exceed the array length
- **Rotate the array** - Split the flattened array and rearrange elements by moving the last k elements to the front
- **Reconstruct the grid** - Convert the rotated 1D array back to a 2D grid with the same dimensions

Let's implement this solution in PHP: **[1260. Shift 2D Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001260-shift-2d-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $k
 * @return Integer[][]
 */
function shiftGrid(array $grid, int $k): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(shiftGrid([[1,2,3],[4,5,6],[7,8,9]], 1)) .  "\n";                               // Output: [[9,1,2],[3,4,5],[6,7,8]]
print_r(shiftGrid([[3,8,1,9],[19,7,2,5],[4,6,11,10],[12,0,21,13]], 4)) .  "\n";         // Output: [[12,0,21,13],[3,8,1,9],[19,7,2,5],[4,6,11,10]]
print_r(shiftGrid([[1,2,3],[4,5,6],[7,8,9]], 9)) .  "\n";                               // Output: [[1,2,3],[4,5,6],[7,8,9]]
print_r(shiftGrid([[5]], 3)) .  "\n";                                                   // Output: [[5]]
print_r(shiftGrid([[1,2,3,4]], 2)) .  "\n";                                             // Output: [[3,4,1,2]]
print_r(shiftGrid([[1],[2],[3],[4]], 2)) .  "\n";                                       // Output: [[3],[4],[1],[2]]
print_r(shiftGrid([[1,2],[3,4]], 0)) .  "\n";                                           // Output: [[1,2],[3,4]]
print_r(shiftGrid([[1,2],[3,4]], 100)) .  "\n";                                         // Output: [[3,4],[1,2]]
?>
```

### Explanation
- **Flattening Strategy**: By converting the 2D grid to 1D, we transform the shift operation into a simple array rotation, making the problem easier to solve
- **Modulo Optimization**: Since shifting by `total_elements` returns the grid to its original state, we use `k % total` to reduce unnecessary operations
- **Rotation Mechanics**: The shift operation essentially moves elements to the right in the flattened representation, wrapping around from the end to the beginning
- **Reconstruction**: After rotation, we fill the grid row by row, maintaining the original dimensions m×n
- **Special Cases**: When `k % total == 0`, we return the original grid without any modifications

## Complexity Analysis

- **Time Complexity**: _**O(m × n)**_ - We traverse all elements once to flatten and once to reconstruct the grid
- **Space Complexity**: _**O(m × n)**_ - We create a flattened array and a rotated array, each of size total elements

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
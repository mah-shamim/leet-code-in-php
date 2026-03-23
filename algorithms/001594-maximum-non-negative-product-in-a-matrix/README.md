1594\. Maximum Non-Negative Product in a Matrix

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Dynamic Programming`, `Matrix`, `Weekly Contest 207`

You are given a `m x n` matrix `grid`. Initially, you are located at the top-left corner `(0, 0)`, and in each step, you can only **move right or down** in the matrix.

Among all possible paths starting from the top-left corner `(0, 0)` and ending in the bottom-right corner `(m - 1, n - 1)`, find the path with the **maximum non-negative product**. The product of a path is the product of all integers in the grid cells visited along the path.

Return _the maximum non-negative product **modulo** `10⁹ + 7`. If the maximum product is **negative**, return `-1`_.

Notice that the modulo is performed after getting the maximum product.

**Example 1:**

![product1](https://assets.leetcode.com/uploads/2021/12/23/product1.jpg)

- **Input:** grid = [[-1,-2,-3],[-2,-3,-3],[-3,-3,-2]]
- **Output:** -1
- **Explanation:** It is not possible to get non-negative product in the path from (0, 0) to (2, 2), so return -1.

**Example 2:**

![product2](https://assets.leetcode.com/uploads/2021/12/23/product2.jpg)

- **Input:** grid = [[1,-2,1],[1,-2,1],[3,-4,1]]
- **Output:** 8
- **Explanation:** Maximum non-negative product is shown (1 * 1 * -2 * -4 * 1 = 8).

**Example 3:**

![product3](https://assets.leetcode.com/uploads/2021/12/23/product3.jpg)

- **Input:** grid = [[1,3],[0,-4]]
- **Output:** 0
- **Explanation:** Maximum non-negative product is shown (1 * 0 * -4 = 0).

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 15`
- `-4 <= grid[i][j] <= 4`



**Hint:**
1. Use Dynamic programming. Keep the highest value and lowest value you can achieve up to a point.






**Solution:**

The problem asks for the maximum non‑negative product along any path from the top‑left to the bottom‑right corner of an `m x n` matrix, moving only right or down. Because negative values can flip the sign of the product, a straightforward DP that keeps only the maximum product fails. The solution uses two DP tables: one for the **maximum** product and one for the **minimum** product reachable at each cell. By tracking both extremes, we can correctly propagate products when the current cell contains a negative number. Finally, if the maximum product at the destination is negative, we return `-1`; otherwise, we return it modulo _**10⁹+7**_.

### Approach:

- Use dynamic programming with two tables: `dp_max[i][j]` and `dp_min[i][j]` representing the maximum and minimum product achievable to reach cell `(i, j)`.
- Initialise `dp_max[0][0] = dp_min[0][0] = grid[0][0]`.
- For each cell `(i, j)` (excluding the start), compute the possible products from the top neighbour `(i-1, j)` and the left neighbour `(i, j-1)`:
   - From each neighbour we have two candidate products: `neighbour_max * grid[i][j]` and `neighbour_min * grid[i][j]`.
   - Among all candidates from both directions, keep the overall maximum and overall minimum for the current cell.
- After filling both tables, the answer is `dp_max[m-1][n-1]`. If it is negative, return `-1`; otherwise return it modulo _**10⁹+7**_.

Let's implement this solution in PHP: **[1594. Maximum Non Negative Product in a Matrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001594-maximum-non-negative-product-in-a-matrix/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function maxProductPath(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxProductPath([[-1,-2,-3],[-2,-3,-3],[-3,-3,-2]]) . "\n";         // Output: -1
echo maxProductPath([[1,-2,1],[1,-2,1],[3,-4,1]]) . "\n";               // Output: 8
echo maxProductPath([[1,3],[0,-4]]) . "\n";                             // Output: 0
?>
```

### Explanation:

- The product’s sign can change when multiplying by a negative number. Keeping only the maximum product is insufficient because a smaller (more negative) product from a previous cell might become the largest after multiplying by a negative value.
- By maintaining both the **maximum** and **minimum** product at each cell, we ensure that all sign possibilities are considered. For any positive number, the maximum product is multiplied by the previous maximum; for any negative number, the maximum product is obtained by multiplying the previous minimum (a negative number) by the negative value to get a positive product.
- The DP propagates only from top and left because movement is restricted to right and down.
- The modulo operation is applied only after the final product is determined, because intermediate products must be compared as actual integers to preserve sign and magnitude.

### Complexity
- **Time Complexity**: _**O(m × n)**_ – each cell processes at most 4 candidate products (2 from top, 2 from left) in constant time.
- **Space Complexity**: _**O(m × n)**_ – two DP tables of the same size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
- 
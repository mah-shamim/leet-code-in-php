1931\. Painting a Grid With Three Different Colors

**Difficulty:** Hard

**Topics:** `Dynamic Programming`

You are given two integers `m` and `n`. Consider an `m x n` grid where each cell is initially white. You can paint each cell **red**, **green**, or **blue**. All cells **must** be painted.

Return _the number of ways to color the grid with **no two adjacent cells having the same color**_. Since the answer can be very large, return it **modulo** <code>10<sup>9</sup> + 7</code>.

**Example 1:**

![colorthegrid](https://assets.leetcode.com/uploads/2021/06/22/colorthegrid.png)

- **Input:** m = 1, n = 1
- **Output:** 3
- **Explanation:** The three possible colorings are shown in the image above.

**Example 2:**

![copy-of-colorthegrid](https://assets.leetcode.com/uploads/2021/06/22/copy-of-colorthegrid.png)

- **Input:** m = 1, n = 2
- **Output:** 6
- **Explanation:** The six possible colorings are shown in the image above.


**Example 3:**

- **Input:** m = 5, n = 5
- **Output:** 580986



**Constraints:**

- `1 <= m <= 5`
- `1 <= n <= 1000`


**Hint:**
1. Represent each colored column by a bitmask based on each cell color.
2. Use bitmasks DP with state (currentCell, prevColumn).



**Solution:**

We need to determine the number of ways to paint an `m x n` grid using three colors (red, green, and blue) such that no two adjacent cells (horizontally or vertically) have the same color. The result should be returned modulo _**10<sup>9</sup> + 7**_.

### Approach
1. **Generate Valid Column Configurations**: First, generate all valid column configurations for an `m`-row grid where each cell in the column is colored such that no two consecutive cells have the same color. This can be done using backtracking to explore all possible valid color sequences.

2. **Precompute Compatible Transitions**: For each valid column configuration, determine which other configurations can follow it such that no cells in the same row of consecutive columns have the same color. This is stored in a transition matrix.

3. **Dynamic Programming (DP)**: Use dynamic programming to compute the number of valid ways to paint the grid column by column. The DP state tracks the number of ways to paint up to the current column ending with a specific configuration. Transitions between columns are determined using the precompatible compatibility matrix.

Let's implement this solution in PHP: **[1931. Painting a Grid With Three Different Colors](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001931-painting-a-grid-with-three-different-colors/solution.php)**

```php
<?php
/**
 * @param Integer $m
 * @param Integer $n
 * @return Integer
 */
function colorTheGrid($m, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $m
 * @return array
 */
function generateConfigs($m) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $m
 * @param $row
 * @param $prevColor
 * @param $current
 * @param $configs
 * @return void
 */
function backtrack($m, $row, $prevColor, &$current, &$configs) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo colorTheGrid(1, 1) . "\n"; // Output: 3
echo colorTheGrid(1, 2) . "\n"; // Output: 6
echo colorTheGrid(5, 5) . "\n"; // Output: 580986
?>
```

### Explanation:

1. **Generating Valid Column Configurations**: The `generateConfigs` function uses backtracking to generate all valid column configurations where no two consecutive cells in the column have the same color. Each configuration is represented as an array of colors and an integer for efficient handling.

2. **Compatibility Check**: For each pair of configurations, we check if they can be adjacent columns by ensuring no two cells in the same row have the same color. This is stored in a transition matrix.

3. **Dynamic Programming**: The DP array `dp` tracks the number of ways to paint up to the current column ending with each configuration. For each subsequent column, we update the DP array using the transition matrix to sum valid transitions from the previous column.

This approach efficiently computes the result using dynamic programming and precomputed transitions, ensuring we handle up to the maximum constraints efficiently.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
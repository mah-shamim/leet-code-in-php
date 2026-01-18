1895\. Largest Magic Square

**Difficulty:** Medium

**Topics:** `Array`, `Matrix`, `Prefix Sum`, `Biweekly Contest 54`

A `k x k` **magic square** is a `k x k` grid filled with integers such that every row sum, every column sum, and both diagonal sums are **all equal**. The integers in the magic square **do not have to be distinct**. Every `1 x 1` grid is trivially a **magic square**.

Given an `m x n` integer `grid`, return _the **size** (i.e., the side length `k`) of the **largest magic square** that can be found within this grid_.

**Example 1:**

![magicsquare-grid](https://assets.leetcode.com/uploads/2021/05/29/magicsquare-grid.jpg)

- **Input:** grid = [[7,1,4,5,6],[2,5,1,6,4],[1,5,4,3,2],[1,2,7,3,4]]
- **Output:** 3
- **Explanation:** The largest magic square has a size of 3.
  - Every row sum, column sum, and diagonal sum of this magic square is equal to 12.
  - Row sums: 5+1+6 = 5+4+3 = 2+7+3 = 12
  - Column sums: 5+5+2 = 1+4+7 = 6+3+3 = 12
  - Diagonal sums: 5+4+3 = 6+4+2 = 12

**Example 2:**

![magicsquare2-grid](https://assets.leetcode.com/uploads/2021/05/29/magicsquare2-grid.jpg)

- **Input:** grid = [[5,1,3,1],[9,3,3,1],[1,3,3,8]]
- **Output:** 2

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 50`
- `1 <= grid[i][j] <= 10⁶`



**Hint:**
1. Check all squares in the matrix and find the largest one.



**Similar Questions:**
1. [840. Magic Squares In Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000840-magic-squares-in-grid)






**Solution:**

We need to find the largest `k×k` `subgrid` within an m×n grid that forms a magic square. A magic square requires all row sums, column sums, and both diagonal sums to be equal.

### Approach:

- **Brute Force with Optimization**: Start from the largest possible square size and work downwards, checking each candidate square until a valid magic square is found. Since 1×1 squares are always magic, we return at least 1.

- **Prefix Sums**: Precompute prefix sums for rows and columns to allow O(1) calculation of any row or column segment sum. This avoids repeatedly summing elements during magic square validation.

- **Efficient Validation**: For each candidate k×k square:
   1. Use the first row sum as the target value
   2. Validate all k rows have this sum using prefix sums
   3. Validate all k columns have this sum using prefix sums
   4. Validate both diagonals have this sum (calculated directly since there are only two)

- **Early Termination**: Since we check from largest to smallest k, we can return immediately when we find any valid magic square.

Let's implement this solution in PHP: **[1895. Largest Magic Square](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001895-largest-magic-square/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function largestMagicSquare(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Check if a k×k subgrid starting at (r,c) is a magic square
 *
 * @param $grid
 * @param $r
 * @param $c
 * @param $k
 * @param $getRowSum
 * @param $getColSum
 * @return bool
 */
function isMagicSquare($grid, $r, $c, $k, $getRowSum, $getColSum): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo largestMagicSquare([[7,1,4,5,6],[2,5,1,6,4],[1,5,4,3,2],[1,2,7,3,4]]) . "\n";          // Output: 3
echo largestMagicSquare([[5,1,3,1],[9,3,3,1],[1,3,3,8]]) . "\n";                            // Output: 2
?>
```

### Explanation:

1. **Precomputation**:
   - Build `rowPrefix` where `rowPrefix[i][j]` = sum of first j elements in row i-1
   - Build `colPrefix` where `colPrefix[i][j]` = sum of first i elements in column j-1
   - This allows O(1) range sum queries for any row or column segment

2. **Candidate Generation**:
   - Iterate k from `min(m, n)` down to 2 (since 1×1 is trivial)
   - For each k, generate all possible top-left corners (i, j) of k×k squares
   - For each candidate square, validate if it's a magic square

3. **Magic Square Validation**:
   - Get target sum from first row of candidate square
   - Check all k rows have this sum using `getRowSum` helper
   - Check all k columns have this sum using `getColSum` helper
   - Check main diagonal (top-left to bottom-right) sum equals target
   - Check anti-diagonal (top-right to bottom-left) sum equals target
   - All checks must pass for the square to be valid

### Complexity
- **Time Complexity**: O(m × n × min(m,n)²)
   - Outer loops: O(m × n) positions
   - For each position: O(k) to check rows/columns + O(k) for diagonals
   - Checking from largest k downwards: worst case O(m × n × min(m,n)²)
   - With m,n ≤ 50, this is feasible (~50⁴ = 6.25M operations)

- **Space Complexity**: O(m × n)
   - For storing prefix sum arrays

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
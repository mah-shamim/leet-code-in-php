3212\. Count Submatrices With Equal Frequency of X and Y

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Matrix`, `Prefix Sum`, `Weekly Contest 405`

Given a 2D character matrix `grid`, where `grid[i][j]` is either `'X'`, `'Y'`, or `'.'`, return the number of submatrices[^1] that contain:
- `grid[0][0]`
- an **equal** frequency of `'X'` and `'Y'`.
- **at least** one `'X'`.

[^1]: **Submatrix:** A submatrix `(x1, y1, x2, y2)` is a matrix that forms by choosing all cells `matrix[x][y]` where `x1 <= x <= x2` and `y1 <= y <= y2`.


**Example 1:**

- **Input:** grid = [["X","Y","."],["Y",".","."]]
- **Output:** 3
- **Explanation:**
   ![examplems](https://assets.leetcode.com/uploads/2024/06/07/examplems.png)

**Example 2:**

- **Input:** grid = [["X","X"],["X","Y"]]
- **Output:** 0
- **Explanation:** No submatrix has an equal frequency of `'X'` and `'Y'`.

**Example 3:**

- **Input:** grid = [[".","."],[".","."]]
- **Output:** 0
- **Explanation:** No submatrix has at least one `'X'`.

**Constraints:**

- `1 <= grid.length, grid[i].length <= 1000`
- `grid[i][j]` is either `'X'`, `'Y'`, or `'.'`.



**Hint:**
1. Replace `’X’` with 1, `’Y’` with -1 and `’.’` with 0.
2. You need to find how many submatrices `grid[0..x][0..y]` have a sum of 0 and at least one `’X’`.
3. Use prefix sum to calculate submatrices sum.



**Similar Questions:**
1. [1224. Maximum Equal Frequency](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001224-maximum-equal-frequency)
2. [1504. Count Submatrices With All Ones](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001504-count-submatrices-with-all-ones)






**Solution:**

The problem asks for the number of submatrices that include the top‑left cell `(0,0)` and contain an equal number of `'X'` and `'Y'`, with at least one `'X'`. The solution uses a **2D prefix sum** technique where `'X'` is mapped to `+1`, `'Y'` to `-1`, and `'.'` to `0`. For every cell `(i,j)`, the prefix sum of the submatrix from `(0,0)` to `(i,j)` is computed; if this sum equals zero, the numbers of `'X'` and `'Y'` are equal. Additionally, a parallel prefix count of `'X'` ensures that at least one `'X'` is present. The algorithm iterates through the grid row by row, updating two 1‑D arrays for the current row’s prefix values, and increments the result whenever both conditions are satisfied.

### Approach:

- **Mapping**: Convert each character to a numeric value:  `'X'` → 1 (and also mark an X‑count),  `'Y'` → -1,  `'.'` → 0.
- **2D Prefix Sum**:  The sum for submatrix `(0,0)` to `(i,j)` is obtained by the standard inclusion‑exclusion formula:  `sum[i][j] = sum[i-1][j] + sum[i][j-1] - sum[i-1][j-1] + grid[i][j]`.
- **Parallel X‑Count Prefix**:  Similarly, count the total number of `'X'` in the same submatrix:  `xCount[i][j] = xCount[i-1][j] + xCount[i][j-1] - xCount[i-1][j-1] + isX[i][j]`.
- **Validation**:  After computing both values for a cell `(i,j)`, if `sum[i][j] == 0` (equal `'X'` and `'Y'`) and `xCount[i][j] > 0` (at least one `'X'`), the submatrix is counted.
- **Space Optimisation**:  Instead of storing the full 2D tables, only the previous row’s prefix values are kept. Two 1‑D arrays (`prevSum`, `prevX`) are updated row by row, reducing memory usage.

Let's implement this solution in PHP: **[3212. Count Submatrices With Equal Frequency of X and Y](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003212-count-submatrices-with-equal-frequency-of-x-and-y/solution.php)**

```php
<?php
/**
 * Counts submatrices that start at (0,0) and have equal number of 'X' and 'Y'
 * and contain at least one 'X'.
 *
 * @param String[][] $grid
 * @return Integer
 */
function numberOfSubmatrices(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfSubmatrices([["X","Y","."],["Y",".","."]]) . "\n";             // Output: 3
echo numberOfSubmatrices([["X","X"],["X","Y"]]) . "\n";                     // Output: 0
echo numberOfSubmatrices([[".","."],[".","."]]) . "\n";                     // Output: 0
?>
```

### Explanation:

1. **Initialisation**:
   - `$rows`, `$cols` = dimensions of the grid.
   - `$prevSum` and `$prevX` are arrays of length `$cols`, initialised to zero (representing the prefix values for an imaginary row above the first row).
2. **Row Iteration**:  For each row `$i` from `0` to `$rows-1`:
   - Create two new arrays `$currSum` and `$currX` for the current row.
3. **Column Iteration**:  For each column `$j` from `0` to `$cols-1`:
   - Determine the numeric value `$val` (1 for `'X'`, -1 for `'Y'`, 0 otherwise) and `$xVal` (1 if `'X'`, else 0).
   - Compute the prefix sum for the submatrix ending at `(i,j)`:
      - `$top = $prevSum[$j]` (prefix of same column in previous row).
      - `$left = ($j > 0) ? $currSum[$j-1] : 0` (prefix of same row in previous column).
      - `$topLeft = ($i > 0 && $j > 0) ? $prevSum[$j-1] : 0` (diagonal previous).
      - `$currSum[$j] = $top + $left - $topLeft + $val`.
   - Similarly compute the prefix count of `'X'`:
      - `$currX[$j] = $topX + $leftX - $topLeftX + $xVal`, where the `X`‑specific variables are taken from the corresponding prefix arrays.
4. **Condition Check**:  If `$currSum[$j] == 0` and `$currX[$j] > 0`, increment the result.
5. **Move to Next Row**:  After finishing a row, set `$prevSum = $currSum` and `$prevX = $currX`.
6. **Return Result**:  After processing all cells, the accumulated count is returned.

### Complexity
- **Time Complexity**: _**O(rows × cols)**_ – Each cell is processed exactly once, and all operations are constant time.
- **Space Complexity**: _**O(cols)**_ – Only two 1‑D arrays of length `cols` are used for the prefix sums of the current and previous rows.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
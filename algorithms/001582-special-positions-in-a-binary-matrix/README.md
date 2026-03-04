1582\. Special Positions in a Binary Matrix

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Matrix`, `Weekly Contest 206`

Given an `m x n` binary matrix `mat`, return _the number of special positions in `mat`_.

A position `(i, j)` is called **special** if `mat[i][j] == 1` and all other elements in row `i` and column `j` are `0` (rows and columns are **0-indexed**).

**Example 1:**

![special1](https://assets.leetcode.com/uploads/2021/12/23/special1.jpg)

- **Input:** mat = [[1,0,0],[0,0,1],[1,0,0]]
- **Output:** 1
- **Explanation:** `(1, 2)` is a special position because `mat[1][2] == 1` and all other elements in row `1` and column `2` are `0`.

**Example 2:**

![special-grid](https://assets.leetcode.com/uploads/2021/12/24/special-grid.jpg)

- **Input:** mat = [[1,0,0],[0,1,0],[0,0,1]]
- **Output:** 3
- **Explanation:** `(0, 0)`, `(1, 1)` and `(2, 2)` are special positions.

**Example 3:**

- **Input:** [[1,0,0],[0,1,0],[0,0,1],[0,1,0]]
- **Output:** 2

**Example 4:**

- **Input:** [[1,1,0],[0,0,1],[0,0,0]]
- **Output:** 1

**Example 5:**

- **Input:** [[1,0],[1,0]]
- **Output:** 0

**Example 6:**

- **Input:** [[1,0,0]]
- **Output:** 1

**Example 7:**

- **Input:** [[0,0,0],[0,0,0],[0,0,0]]
- **Output:** 0

**Example 8:**

- **Input:** [[0]]
- **Output:** 0

**Example 9:**

- **Input:** [[1]]
- **Output:** 1

**Constraints:**

- `m == mat.length`
- `n == mat[i].length`
- `1 <= m, n <= 100`
- `mat[i][j]` is either `0` or `1`.


**Hint:**
1. Keep track of 1s in each row and in each column. Then while iterating over matrix, if the current position is 1 and current row as well as current column contains exactly one occurrence of 1.


**Similar Questions:**
1. [2482. Difference Between Ones and Zeros in Row and Column](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002482-difference-between-ones-and-zeros-in-row-and-column)






**Solution:**

The problem asks to count the number of "special" positions in a binary matrix. A position `(i, j)` is special if it contains a `1` and all other elements in its row `i` and column `j` are `0`. The given PHP solution first counts how many `1`s appear in each row and each column. Then it scans the matrix again and increments the counter whenever a cell contains a `1` and its corresponding row and column counts are exactly `1`. This ensures that the `1` is the only one in its row and column, satisfying the condition.

### Approach:

- Compute the number of rows `m` and columns `n` from the input matrix.
- Initialize two arrays: `$rowCount` of size `m` and `$colCount` of size `n`, both filled with zeros.
- First pass over the matrix:
   - For each cell `(i, j)` containing `1`, increment `$rowCount[$i]` and `$colCount[$j]`.
- Second pass over the matrix:
   - For each cell `(i, j)` containing `1`, check if `$rowCount[$i] == 1` and `$colCount[$j] == 1`.
   - If true, increment the `$special` counter.
- Return the final count of special positions.

Let's implement this solution in PHP: **[1582. Special Positions in a Binary Matrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001582-special-positions-in-a-binary-matrix/solution.php)**

```php
<?php
/**
 * @param Integer[][] $mat
 * @return Integer
 */
function numSpecial(array $mat): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numSpecial([[1,0,0],[0,0,1],[1,0,0]]) . "\n";                  // Output: 1
echo numSpecial([[1,0,0],[0,1,0],[0,0,1]]) . "\n";                  // Output: 3
echo numSpecial([[1,0,0],[0,1,0],[0,0,1],[0,1,0]]) . "\n";          // Output: 2
echo numSpecial([[1,1,0],[0,0,1],[0,0,0]]) . "\n";                  // Output: 1
echo numSpecial([[1,0],[1,0]]) . "\n";                              // Output: 0
echo numSpecial([[1],[0],[0]]) . "\n";                              // Output: 1
echo numSpecial([[1,0,0]]) . "\n";                                  // Output: 1
echo numSpecial([[0,0,0],[0,0,0],[0,0,0]]) . "\n";                  // Output: 0
echo numSpecial([[0]]) . "\n";                                      // Output: 0
echo numSpecial([[1]]) . "\n";                                      // Output: 1
?>
```

### Explanation:

1. **Initialization**: Determine dimensions `$m` and `$n`. Create two arrays to store per‑row and per‑column counts of `1`s. These arrays are initially set to zero.
2. **Count ones**: Loop through every cell. Whenever a `1` is encountered, increase the count for that row and that column. After this pass, `$rowCount[$i]` tells how many `1`s exist in row `i`, and `$colCount[$j]` tells how many `1`s exist in column `j`.
3. **Identify special positions**: Loop through the matrix again. For each cell that is a `1`, verify that its row contains exactly one `1` (i.e., `$rowCount[$i] == 1`) and its column also contains exactly one `1` (i.e., `$colCount[$j] == 1`). If both conditions hold, that `1` is the only one in its row and column, making it a special position.
4. **Return result**: Output the accumulated count.

### Complexity
- **Time Complexity**: _**O(m × n)**_ – two passes over the matrix, each cell processed twice.
- **Space Complexity**: _**O(m + n)**_ – extra arrays for row and column counts, plus a few scalar variables. No additional space proportional to matrix size.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
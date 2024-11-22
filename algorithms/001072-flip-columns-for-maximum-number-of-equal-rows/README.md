1072\. Flip Columns For Maximum Number of Equal Rows

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Matrix`

You are given an `m x n` binary matrix `matrix`.

You can choose any number of columns in the matrix and flip every cell in that column (i.e., Change the value of the cell from `0` to `1` or vice versa).

Return _the maximum number of rows that have all values equal after some number of flips_.

**Example 1:**

- **Input:** matrix = [[0,1],[1,1]]
- **Output:** 1
- **Explanation:** After flipping no values, 1 row has all values equal.

**Example 2:**

- **Input:** matrix = [[0,1],[1,0]]
- **Output:** 2
- **Explanation:** After flipping values in the first column, both rows have equal values.


**Example 3:**

- **Input:** matrix = [[0,0,0],[0,0,1],[1,1,0]]
- **Output:** 2
- **Explanation:** After flipping values in the first two columns, the last two rows have equal values.



**Constraints:**

- `m == matrix.length`
- `n == matrix[i].length`
- `1 <= m, n <= 300`
- `matrix[i][j]` is either `0` or `1`.


**Hint:**
1. Flipping a subset of columns is like doing a bitwise XOR of some number K onto each row. We want rows X with X ^ K = all 0s or all 1s. This is the same as X = X^K ^K = (all 0s or all 1s) ^ K, so we want to count rows that have opposite bits set. For example, if K = 1, then we count rows X = (00000...001, or 1111....110).



**Solution:**

We can utilize a hash map to group rows that can be made identical by flipping certain columns. Rows that can be made identical have either the same pattern or a complementary pattern (bitwise negation).

Here’s the step-by-step solution:

### Algorithm:
1. For each row, calculate its pattern and complementary pattern:
   - The pattern is the row as it is.
   - The complementary pattern is the result of flipping all bits in the row.
2. Use a hash map to count occurrences of patterns and their complements.
3. The maximum count for any single pattern or its complement gives the result.

Let's implement this solution in PHP: **[1072. Flip Columns For Maximum Number of Equal Rows](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001072-flip-columns-for-maximum-number-of-equal-rows/solution.php)**

```php
<?php
/**
 * @param Integer[][] $matrix
 * @return Integer
 */
function maxEqualRowsAfterFlips($matrix) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$matrix1 = [[0, 1], [1, 1]];
$matrix2 = [[0, 1], [1, 0]];
$matrix3 = [[0, 0, 0], [0, 0, 1], [1, 1, 0]];

echo maxEqualRowsAfterFlips($matrix1) . "\n"; // Output: 1
echo maxEqualRowsAfterFlips($matrix2) . "\n"; // Output: 2
echo maxEqualRowsAfterFlips($matrix3) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Pattern and Complement:**
   - For each row, the `pattern` is the concatenated row (e.g., `010`).
   - The `complement` flips all bits of the row (e.g., `101`).
2. **Hash Map:** Count the occurrences of each pattern and its complement. This helps group rows that can be made identical.
3. **Max Count:** Find the maximum count of a single pattern or its complement to determine how many rows can be made identical.

### Complexity:
- **Time Complexity:** _**O(m x n)**_, where _**m**_ is the number of rows and _**n**_ is the number of columns.
- **Space Complexity:** _**O(m x n)**_, for storing patterns in the hash map.

This solution adheres to the constraints and is efficient for the problem size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

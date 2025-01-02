861\. Score After Flipping Matrix

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Bit Manipulation`, `Matrix`

You are given an `m x n` binary matrix `grid`.

A **move** consists of choosing any row or column and toggling each value in that row or column (i.e., changing all `0`'s to `1`'s, and all `1`'s to `0`'s).

Every row of the matrix is interpreted as a binary number, and the **score** of the matrix is the sum of these numbers.

Return _the highest possible **score** after making any number of **moves** (including zero moves)._

**Example 1:**

![lc-toogle1](https://assets.leetcode.com/uploads/2021/07/23/lc-toogle1.jpg)

- **Input:** grid = [[0,0,1,1],[1,0,1,0],[1,1,0,0]]
- **Output:** 39
- **Explanation:** 0b1111 + 0b1001 + 0b1111 = 15 + 9 + 15 = 39

**Example 2:**

- **Input:** grid = [[0]]
- **Output:** 1

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 20`
- `grid[i][j]` is either `0` or `1`.



**Solution:**

We need to maximize the matrix score by flipping rows or columns. The goal is to interpret each row as a binary number and get the highest possible sum from all the rows.

### Approach:

1. **Initial Observation:**
    - To maximize the binary number from each row, the most significant bit (leftmost bit) in each row should be `1`. This means we should first flip any row that starts with a `0`.
    - After ensuring all rows start with `1`, we need to maximize the remaining bits of each row. This can be done by flipping columns to have as many `1`s as possible, especially for higher-bit positions.

2. **Steps:**
    - Flip any row that doesn't start with `1` to ensure the leftmost bit of every row is `1`.
    - For each column from the second position onward, check if there are more `0`s than `1`s. If so, flip the column to maximize the number of `1`s in that column.
    - Calculate the final score by interpreting each row as a binary number.

Let's implement this solution in PHP: **[861. Score After Flipping Matrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000861-score-after-flipping-matrix/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function matrixScore($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo matrixScore([[0,0,1,1],[1,0,1,0],[1,1,0,0]]); // Output: 39
echo "\n";
echo matrixScore([[0]]); // Output: 1
?>
```

### Explanation:

1. **Row flipping to ensure the leftmost bit is `1`:**
    - For each row, if the first element (most significant bit) is `0`, we flip the entire row. This guarantees that all rows start with `1`, which maximizes the contribution of the most significant bit.

2. **Column flipping to maximize `1`s:**
    - For each column starting from the second column, we count how many `1`s there are.
    - If there are more `0`s than `1`s in a column, we flip the entire column to maximize the number of `1`s in that column.

3. **Score calculation:**
    - After flipping rows and columns, we compute the score by treating each row as a binary number. Each row is converted from binary to decimal and added to the total score.

### Time Complexity:
- **Row Flipping:** We iterate over all rows and columns once, so this takes `O(m * n)`.
- **Column Flipping:** For each column, we count the number of `1`s, which takes `O(m * n)`.
- **Score Calculation:** Converting rows to binary numbers takes `O(m * n)`.

Thus, the total time complexity is `O(m * n)`, where `m` is the number of rows and `n` is the number of columns. Given the constraints (`m, n <= 20`), this is efficient enough.

### Example Walkthrough:

For the input:
```php
$grid = [[0,0,1,1],[1,0,1,0],[1,1,0,0]];
```

- After ensuring all rows start with `1`:
  ```
  [[1,1,0,0],[1,0,1,0],[1,1,0,0]]
  ```

- After flipping columns to maximize `1`s:
  ```
  [[1,1,1,1],[1,0,1,0],[1,1,1,1]]
  ```

- Final score:
    - Row 1: `1111` = 15
    - Row 2: `1001` = 9
    - Row 3: `1111` = 15
    - Total score = 15 + 9 + 15 = 39

This gives the correct output of `39`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

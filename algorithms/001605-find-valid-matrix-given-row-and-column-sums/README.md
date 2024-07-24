1605\. Find Valid Matrix Given Row and Column Sums

Medium

You are given two arrays `rowSum` and `colSum` of non-negative integers where `rowSum[i]` is the sum of the elements in the <code>i<sup>th</sup></code> row and `colSum[j]` is the sum of the elements of the <code>j<sup>th</sup></code> column of a 2D matrix. In other words, you do not know the elements of the matrix, but you do know the sums of each row and column.

Find any matrix of **non-negative** integers of size `rowSum.length x colSum.length` that satisfies the `rowSum` and `colSum` requirements.

Return _a 2D array representing **any** matrix that fulfills the requirements. It's guaranteed that **at least one** matrix that fulfills the requirements exists_.

**Example 1:**

- **Input:** rowSum = [3,8], colSum = [4,7]
- **Output:** [[3,0],[1,7]]
- **Explanation:**\
  0th row: 3 + 0 = 3 == rowSum[0]\
  1st row: 1 + 7 = 8 == rowSum[1]\
  0th column: 3 + 1 = 4 == colSum[0]\
  1st column: 0 + 7 = 7 == colSum[1]\
  The row and column sums match, and all matrix elements are non-negative.\
  Another possible matrix is: [[1,2], [3,5]]

**Example 2:**

- **Input:** rowSum = [5,7,10], colSum = [8,6,8]
- **Output:** [[[0,5,0], [6,1,0], [2,0,8]]

**Constraints:**

- <code>1 <= rowSum.length, colSum.length <= 500</code>
- <code>0 <= rowSum[i], colSum[i] <= 10<sup>8</sup></code>
- <code>sum(rowSum) == sum(colSum)</code>

**Hint:**
1. Find the smallest rowSum or colSum, and let it be x. Place that number in the grid, and subtract x from rowSum and colSum. Continue until all the sums are satisfied.


**Solution:**


To solve this problem, we can follow these steps:

1. Start with an empty matrix of size `rowSum.length x colSum.length` initialized with zeros.
2. Iterate over the matrix and at each position `(i, j)`, place the minimum value between `rowSum[i]` and `colSum[j]` to ensure non-negative values.
3. Update `rowSum[i]` and `colSum[j]` by subtracting the placed value.
4. Continue until all elements of `rowSum` and `colSum` are zero.

Let's implement this solution in PHP: **[1605. Find Valid Matrix Given Row and Column Sums](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001605-find-valid-matrix-given-row-and-column/solution.php)**

```php
<?php
// Example usage:
$rowSum1 = [3, 8];
$colSum1 = [4, 7];
print_r(restoreMatrix($rowSum1, $colSum1)); 
// Output: [[3, 0], [1, 7]]

$rowSum2 = [5, 7, 10];
$colSum2 = [8, 6, 8];
print_r(restoreMatrix($rowSum2, $colSum2));
// Output: [[0, 5, 0], [6, 1, 0], [2, 0, 8]]

?>
```

### Explanation:

1. **Initialization**:
   - Create a matrix of size `m x n` filled with zeros.
   - `m` is the length of `rowSum` and `n` is the length of `colSum`.

2. **Iterative Filling**:
   - For each cell `(i, j)`, determine the value to be placed in the matrix as the minimum of `rowSum[i]` and `colSum[j]`.
   - Place this value in the matrix at `(i, j)`.
   - Subtract this value from both `rowSum[i]` and `colSum[j]`.

3. **Continue Until Completion**:
   - Repeat the process until all elements in `rowSum` and `colSum` are reduced to zero.

This method ensures that the constructed matrix meets the row and column sum requirements while maintaining non-negative values for all elements.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

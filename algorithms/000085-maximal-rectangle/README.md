85\. Maximal Rectangle

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Stack`, `Matrix`, `Monotonic Stack`

Given a `rows x cols` binary matrix filled with `0`'s and `1`'s, find the largest rectangle containing only `1`'s and return <i>its area</i>.

**Example 1:**

![maximal](https://assets.leetcode.com/uploads/2020/09/14/maximal.jpg)

- **Input:** <code>**matrix = [["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]]**</code>
- **Output:** <code>**6**</code>
- **Explanation:** <code>**The maximal rectangle is shown in the above picture**</code>.

**Example 2:**

- **Input:** <code>**matrix = [["0"]]**</code>
- **Output:** <code>**0**</code>

**Example 3:**
- **Input:** <code>**matrix = [["1"]]**</code>
- **Output:** <code>**1**</code>


**Constraints:**

- `rows == matrix.length`
- `cols == matrix[i].length`
- `1 <= row, cols <= 200`
- <code>`matrix[i][j]` is `'0'` or `'1'`</code>.


**Solution:**


We can follow a dynamic programming approach. This problem can be effectively tackled by treating each row of the matrix as the base of a histogram, where the height of each column in the histogram represents the number of consecutive '1's up to that row.

1. **Convert each row of the matrix into a histogram**:
    - Treat each row as the base of a histogram where the height of each bar is the number of consecutive `1`s up to that row.
2. **Calculate the maximum area of the rectangle in the histogram for each row**:
    - For each row, use a stack to maintain the indices of the histogram bars and calculate the largest rectangle area

Let's implement this solution in PHP: **[85. Maximal Rectangle](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000085-maximal-rectangle/solution.php)**

```php
<?php
// Test cases
$matrix1 = array(
    array("1","0","1","0","0"),
    array("1","0","1","1","1"),
    array("1","1","1","1","1"),
    array("1","0","0","1","0")
);

$matrix2 = array(
    array("0")
);

$matrix3 = array(
    array("1")
);

echo maximalRectangle($matrix1) . "\n"; // Output: 6
echo maximalRectangle($matrix2) . "\n"; // Output: 0
echo maximalRectangle($matrix3) . "\n"; // Output: 1

?>
```

### Explanation:

1. **Matrix Initialization:**
    - If the matrix is empty or the first row is empty, return `0`.

2. **Height Array:**
    - Initialize a `height` array that keeps track of the height of '1's for each column.

3. **Updating Heights:**
    - Traverse each row of the matrix and update the height of each column based on whether the matrix value is '1'.

4. **Histogram Calculation:**
    - For each updated `height` array, calculate the maximal rectangle area using a stack-based approach. This approach computes the maximum area for a histogram efficiently.

5. **Stack-Based Histogram Calculation:**
    - Use a stack to keep track of indices of increasing heights.
    - Calculate area whenever a decrease in height is detected and update the maximum area.

The `calculateMaxHistogramArea` function computes the largest rectangle area in a histogram, which is used to update the maximum area for each row's histogram. This approach ensures that the overall complexity is manageable given the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
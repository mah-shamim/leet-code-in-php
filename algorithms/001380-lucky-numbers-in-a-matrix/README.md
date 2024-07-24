1380\. Lucky Numbers in a Matrix

Easy

Given an `m x n` matrix of **distinct** numbers, return _all **lucky numbers** in the matrix in **any** order_.

A **lucky number** is an element of the matrix such that it is the minimum element in its row and maximum in its column.

**Example 1:**

- **Input:** matrix = [[3,7,8],[9,11,13],[15,16,17]]
- **Output:** [15]
- **Explanation:** 15 is the only lucky number since it is the minimum in its row and the maximum in its column.

**Example 2:**

- **Input:** matrix = [[1,10,4,2],[9,3,8,7],[15,16,17,12]]
- **Output:** [12]
- **Explanation:** 12 is the only lucky number since it is the minimum in its row and the maximum in its column.

**Example 3:**

- **Input:** matrix = [[7,8],[1,2]]
- **Output:** [7]
- **Explanation:** 7 is the only lucky number since it is the minimum in its row and the maximum in its column.

**Constraints:**

- <code>m == mat.length</code>
- <code>n == mat[i].length</code>
- <code>1 <= n, m <= 50</code>
- <code>1 <= matrix[i][j] <= 10<sup>5</sup></code>
- All elements in the matrix are distinct.

**Hint:**
1. Find out and save the minimum of each row and maximum of each column in two lists.
2. Then scan through the whole matrix to identify the elements that satisfy the criteria.


**Solution:**


To solve this problem, we can follow these steps:

1. **Identify Row Minimums**: For each row, find the minimum element.
2. **Identify Column Maximums**: For each column, find the maximum element.
3. **Check for Lucky Numbers**: Traverse the matrix and check if an element is both the minimum in its row and the maximum in its column.

Let's implement this solution in PHP: **[1380. Lucky Numbers in a Matrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001380-lucky-numbers-in-a-matrix/solution.php)**

```php
<?php
// Example usage:
$matrix1 = [[3,7,8],[9,11,13],[15,16,17]];
$matrix2 = [[1,10,4,2],[9,3,8,7],[15,16,17,12]];
$matrix3 = [[7,8],[1,2]];

print_r(luckyNumbers($matrix1)); // Output: [15]
print_r(luckyNumbers($matrix2)); // Output: [12]
print_r(luckyNumbers($matrix3)); // Output: [7]

?>
```

### Explanation:

1. **Initialization**:
   - `$rowMins` stores the minimum element for each row.
   - `$colMaxs` stores the maximum element for each column, initialized to the smallest possible value.

2. **Finding Row Minimums**:
   - Iterate over each row, find the minimum element and store it in `$rowMins`.

3. **Finding Column Maximums**:
   - Iterate over each column, find the maximum element and store it in `$colMaxs`.

4. **Checking for Lucky Numbers**:
   - Iterate over the entire matrix.
   - If an element is equal to the minimum in its row (`$rowMins[$i]`) and the maximum in its column (`$colMaxs[$j]`), add it to the list of lucky numbers.

This approach ensures that we correctly identify all lucky numbers in the matrix with a time complexity of \(O(m \times n)\), which is efficient for the given constraints.
**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

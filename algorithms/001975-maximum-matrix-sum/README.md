1975\. Maximum Matrix Sum

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Matrix`

You are given an `n x n` integer `matrix`. You can do the following operation any number of times:

- Choose any two **adjacent** elements of `matrix` and **multiply** each of them by `-1`.

Two elements are considered **adjacent** if and only if they share a **border**.

Your goal is to **maximize** the summation of the matrix's elements. Return _the **maximum** sum of the matrix's elements using the operation mentioned above_.

**Example 1:**

![pc79-q2ex1](https://assets.leetcode.com/uploads/2021/07/16/pc79-q2ex1.png)

- **Input:** matrix = [[1,-1],[-1,1]]
- **Output:** 4
- **Explanation:** We can follow the following steps to reach sum equals 4:
  - Multiply the 2 elements in the first row by -1.
  - Multiply the 2 elements in the first column by -1.

**Example 2:**

![pc79-q2ex2](https://assets.leetcode.com/uploads/2021/07/16/pc79-q2ex2.png)

- **Input:** matrix = [[1,2,3],[-1,-2,-3],[1,2,3]]
- **Output:** 16
- **Explanation:** We can follow the following step to reach sum equals 16:
  - Multiply the 2 last elements in the second row by -1.


**Constraints:**
- `n == matrix.length == matrix[i].length`
- `2 <= n <= 250`
- <code>-10<sup>5</sup> <= matrix[i][j] <= 10<sup>5</sup></code>

**Hint:**
1. Try to use the operation so that each row has only one negative number.
2. If you have only one negative element you cannot convert it to positive.



**Solution:**

To maximize the matrix's sum using the operation, we need to minimize the absolute value of the negative contributions to the sum. Here's the plan:

1. **Count Negative Numbers:** Track how many negative numbers are present in the matrix.
2. **Find Minimum Absolute Value:** Determine the smallest absolute value in the matrix, which will help if the number of negatives is odd.
3. **Adjust for Odd Negatives:** If the count of negative numbers is odd, the smallest absolute value cannot be flipped to positive, and this limits the maximum possible sum.

Let's implement this solution in PHP: **[1975. Maximum Matrix Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001975-maximum-matrix-sum/solution.php)**

```php
<?php
/**
 * @param Integer[][] $matrix
 * @return Integer
 */
function maximumMatrixSum($matrix) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test case 1
$matrix1 = [[1, -1], [-1, 1]];
echo "Output: " . maximumMatrixSum($matrix1) . "\n"; // Output: 4

// Test case 2
$matrix2 = [[1, 2, 3], [-1, -2, -3], [1, 2, 3]];
echo "Output: " . maximumMatrixSum($matrix2) . "\n"; // Output: 16
?>
```

### Explanation:

1. **Summation of Absolute Values:** Compute the sum of absolute values of all elements since the optimal configuration flips as many negative numbers to positive as possible.
2. **Track Smallest Absolute Value:** Use this to adjust the sum when the count of negative numbers is odd.
3. **Handle Odd Negatives:** Subtract twice the smallest absolute value from the sum to account for the unavoidable negative element when the negatives cannot be fully neutralized.

### Complexity
- **Time Complexity:** _**O(n^2)**_, as the matrix is traversed once.
- **Space Complexity:** _**O(1)**_, since no additional space is used apart from variables.

This solution works efficiently within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

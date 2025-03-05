2579\. Count Total Number of Colored Cells

**Difficulty:** Medium

**Topics:** `Math`

There exists an infinitely large two-dimensional grid of uncolored unit cells. You are given a positive integer `n`, indicating that you must do the following routine for `n` minutes:

- At the first minute, color **any** arbitrary unit cell blue.
- Every minute thereafter, color blue **every** uncolored cell that touches a blue cell.

Below is a pictorial representation of the state of the grid after minutes 1, 2, and 3.
![example-copy-2](https://assets.leetcode.com/uploads/2023/01/10/example-copy-2.png)
Return _the number of **colored cells** at the end of `n` minutes_.

**Example 1:**

- **Input:** n = 1
- **Output:** 1
- **Explanation:** After 1 minute, there is only 1 blue cell, so we return 1.

**Example 2:**

- **Input:** n = 2
- **Output:** 5
- **Explanation:** After 2 minutes, there are 4 colored cells on the boundary and 1 in the center, so we return 5.



**Constraints:**

- <code>1 <= n <= 10<sup>5</sup></code>

**Hint:**
1. Derive a mathematical relation between total number of colored cells and the time elapsed in minutes.



**Solution:**

We need to determine the number of colored cells in an infinitely large two-dimensional grid after `n` minutes, where each minute colors all uncolored cells adjacent to already colored cells.

### Approach
The key observation here is that the number of colored cells follows a specific pattern. Let's analyze the expansion of colored cells over time:
- At `n = 1`, there is 1 colored cell.
- At `n = 2`, the initial cell plus its four immediate neighbors (up, down, left, right) form a 3x3 square, resulting in 5 colored cells.
- At `n = 3`, the colored cells expand further outward, forming a diamond shape with an additional layer of cells around the previous square.

By examining the pattern, we notice that each subsequent minute adds a new layer of cells around the existing colored cells. The number of cells added each minute forms an arithmetic sequence. Specifically, the number of cells added at the `k-th` minute is `4*(k-1)`. Summing these values up to `n` minutes gives the total number of colored cells.

The formula derived from this pattern is:
**Total Colored Cells = 2n<sup>2</sup> - 2n + 1**

This formula efficiently computes the result in constant time **O(1)**, making it suitable even for large values of `n` up to 10<sup>5</sup>.

Let's implement this solution in PHP: **[2579. Count Total Number of Colored Cells](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002579-count-total-number-of-colored-cells/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function coloredCells($n) {
    return 2 * $n * $n - 2 * $n + 1;
}

// Example usage
echo coloredCells(1);  // Output: 1
echo coloredCells(2);  // Output: 5
echo coloredCells(3);  // Output: 13
?>
```

### Explanation:

- **Formula Derivation**: The formula _**2n<sup>2</sup> - 2n + 1**_ is derived by summing the arithmetic sequence of cells added each minute. Each layer adds _**4(k-1)**_ cells, where _**k**_ ranges from _**2**_ to _**n**_. Summing these values and adding the initial cell gives the total colored cells.
- **Efficiency**: The solution uses a direct mathematical formula, resulting in a constant time complexity _**O(1)**_, which is optimal for large input sizes.

This approach ensures that we efficiently compute the result without iterating through each minute, making it both time and space efficient.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
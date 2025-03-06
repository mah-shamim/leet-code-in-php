2965\. Find Missing and Repeated Values

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Math`, `Matrix`

You are given a **0-indexed** 2D integer matrix `grid` of size `n * n` with values in the range <code>[1, n<sup>2</sup>]</code>. Each integer appears **exactly once** except `a` which appears **twice** and `b` which is **missing**. The task is to find the repeating and missing numbers `a` and `b`.

Return _a **0-indexed** integer array `ans` of size `2` where `ans[0]` equals to `a` and `ans[1]` equals to `b`_.

**Example 1:**

- **Input:** grid = [[1,3],[2,2]]
- **Output:** [2,4]
- **Explanation:** Number 2 is repeated and number 4 is missing so the answer is [2,4].

**Example 2:**

- **Input:** grid = [[9,1,7],[8,9,2],[3,4,6]]
- **Output:** [9,5]
- **Explanation:** Number 9 is repeated and number 5 is missing so the answer is [9,5].



**Constraints:**

- `2 <= n == grid.length == grid[i].length <= 50`
- `1 <= grid[i][j] <= n * n`
- For all `x` that `1 <= x <= n * n` there is exactly one `x` that is not equal to any of the grid members.
- For all `x` that `1 <= x <= n * n` there is exactly one `x` that is equal to exactly two of the grid members.
- For all `x` that `1 <= x <= n * n` except two of them there is exatly one pair of `i, j` that `0 <= i, j <= n - 1` and `grid[i][j] == x`.



**Solution:**

We need to identify the repeating and missing numbers in a given `n x n` matrix where each number in the range `[1, n²]` appears exactly once except for one number that appears twice and another that is missing.

### Approach
1. **Flatten the Grid**: Convert the 2D grid into a 1D list of numbers to simplify processing.
2. **Track Counts and Sum**: Use a hash map to count occurrences of each number and simultaneously compute the sum of all elements in the grid.
3. **Identify Repeating Number**: The number with a count of 2 in the hash map is the repeating number (`a`).
4. **Calculate Expected Sum**: Compute the expected sum of numbers from 1 to n² using the formula for the sum of the first m natural numbers, which is` m(m+1)/2`.
5. **Determine Missing Number**: Use the difference between the expected sum and the actual sum of the grid elements to find the missing number (`b`).

Let's implement this solution in PHP: **[2965. Find Missing and Repeated Values](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002965-find-missing-and-repeated-values/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer[]
 */
function findMissingAndRepeatedValues($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
$grid1 = [[1,3],[2,2]];
print_r(findMissingAndRepeatedValues($grid1)); // Output: [2, 4]

$grid2 = [[9,1,7],[8,9,2],[3,4,6]];
print_r(findMissingAndRepeatedValues($grid2)); // Output: [9, 5]
?>
```

### Explanation:

1. **Flatten the Grid**: By iterating through each element in the grid, we can collect all numbers into a 1D structure and compute their sum.
2. **Track Counts**: Using a hash map, we count occurrences of each number. The number appearing twice is identified as the repeating number (`a`).
3. **Expected Sum Calculation**: The sum of the first `n²` natural numbers is calculated using the formula `n²(n² + 1)/2`.
4. **Find Missing Number**: The missing number (`b`) is derived using the formula `b = a + (S - T)`, where `S` is the expected sum and `T` is the actual sum of the grid elements. This formula leverages the relationship between the expected sum, actual sum, and the difference caused by the repeating and missing numbers.

This approach efficiently combines counting and sum calculations to determine both the repeating and missing numbers in linear time relative to the number of elements in the grid, making it optimal for the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
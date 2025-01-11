440\. K-th Smallest in Lexicographical Order

**Difficulty:** Hard

**Topics:** `Trie`

Given two integers `n` and `k`, return _the <code>k<sup>th</sup></code> lexicographically smallest integer in the range `[1, n]`_.

**Example 1:**

- **Input:** n = 13, k = 2
- **Output:** 10
- **Explanation:** The lexicographical order is [1, 10, 11, 12, 13, 2, 3, 4, 5, 6, 7, 8, 9], so the second smallest number is 10.

**Example 2:**

- **Input:** n = 1, k = 1
- **Output:** 1

**Constraints:**

- <code>1 <= k <= n <= 10<sup>9</sup></code>


**Solution:**

The idea is to traverse through numbers as they would appear in a lexicographical order, similar to performing a depth-first search (DFS) on a Trie.

### Approach:

1. We can visualize this as a Trie where each node represents a number, and the children of a node `x` are `10 * x + 0`, `10 * x + 1`, ..., `10 * x + 9`.
2. Starting from `1`, we explore numbers in lexicographical order, counting how many numbers can be placed before we reach the `k`th one.
3. The key part of the solution is to efficiently compute the number of integers between `start` and `end` in a lexicographical order. This will help us skip some branches when needed.

### Steps:

1. Start from the root number `1`.
2. Use a helper function to calculate how many numbers exist between `prefix` and the next prefix (`prefix+1`).
3. Based on this count, decide whether to move deeper in the current prefix (by multiplying it by 10) or move to the next sibling prefix (by incrementing the current prefix).

Let's implement this solution in PHP: **[440. K-th Smallest in Lexicographical Order](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000440-k-th-smallest-in-lexicographical-order/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $k
 * @return Integer
 */
function findKthNumber($n, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to calculate the number of steps between two prefixes in the range [1, n]
 *
 * @param $n
 * @param $prefix1
 * @param $prefix2
 * @return int|mixed
 */
function calculateSteps($n, $prefix1, $prefix2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findKthNumber(13, 2); // Output: 10
echo "\n";
echo findKthNumber(1, 1); // Output: 1
?>
```

### Explanation:

1. **findKthNumber function**:
   - We start at the root (`current = 1`).
   - We decrement `k` by 1 because the first number is already considered (i.e., we start with 1).
   - We then use the `calculateSteps` function to determine how many numbers lie between `current` and `current + 1` in lexicographical order.
   - If the number of steps is less than or equal to `k`, it means the k-th number is not within the current prefix, so we move to the next prefix (`current++`).
   - If the k-th number is within the current prefix, we go deeper into the tree (`current *= 10`).
   - We continue this process until `k` becomes `0`.

2. **calculateSteps function**:
   - This function calculates how many numbers there are in lexicographical order between `prefix1` and `prefix2` within the range of `n`.
   - It uses a while loop to compute the steps at each level of the "tree" (i.e., between numbers with the same prefix but different lengths).

### Time Complexity:
The time complexity is approximately `O(log n)`, where `n` is the input range. This is because in each step, we either go deeper into the current prefix or move to the next prefix, and both operations are logarithmic relative to `n`.

This solution is efficient even for large inputs where `n` can be as large as `10^9`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

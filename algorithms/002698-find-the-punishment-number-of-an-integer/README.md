2698\. Find the Punishment Number of an Integer

**Difficulty:** Medium

**Topics:** `Math`, `Backtracking`

Given a positive integer `n`, return _the **punishment number** of `n`_.

The **punishment number** of `n` is defined as the sum of the squares of all integers `i` such that:

- `1 <= i <= n`
- The decimal representation of `i * i` can be partitioned into contiguous substrings such that the sum of the integer values of these substrings equals `i`.


**Example 1:**

- **Input:** n = 10
- **Output:** 182
- **Explanation:** There are exactly 3 integers i in the range [1, 10] that satisfy the conditions in the statement:
  - 1 since 1 * 1 = 1
  - 9 since 9 * 9 = 81 and 81 can be partitioned into 8 and 1 with a sum equal to 8 + 1 == 9.
  - 10 since 10 * 10 = 100 and 100 can be partitioned into 10 and 0 with a sum equal to 10 + 0 == 10.
    Hence, the punishment number of 10 is 1 + 81 + 100 = 182

**Example 2:**

- **Input:** n = 37
- **Output:** 1478
- **Explanation:** There are exactly 4 integers i in the range [1, 37] that satisfy the conditions in the statement:
- 1 since 1 * 1 = 1.
- 9 since 9 * 9 = 81 and 81 can be partitioned into 8 + 1.
- 10 since 10 * 10 = 100 and 100 can be partitioned into 10 + 0.
- 36 since 36 * 36 = 1296 and 1296 can be partitioned into 1 + 29 + 6.
  Hence, the punishment number of 37 is 1 + 81 + 100 + 1296 = 1478



**Constraints:**
- `1 <= n <= 1000`

**Hint:**
1. Can we generate all possible partitions of a number?
2. Use a recursive algorithm that splits the number into two parts, generates all possible partitions of each part recursively, and then combines them in all possible ways.



**Solution:**

We need to determine the "punishment number" of a given integer `n`. The punishment number is defined as the sum of the squares of all integers `i` (where `1 <= i <= n`) such that the decimal representation of `i * i` can be partitioned into contiguous substrings whose sum equals `i`.

### Approach
1. **Iterate through each integer `i` from 1 to `n`**: For each integer, compute its square and convert the square into a string.
2. **Check if the square can be partitioned**: For each integer `i`, check if its square can be split into contiguous substrings such that the sum of these substrings equals `i`. This check is performed using a recursive helper function.
3. **Recursive helper function**: This function attempts to split the string representation of the square into all possible contiguous parts, checking if any combination of these parts sums to `i`. If a valid partition is found, the integer's square is added to the total sum.

Let's implement this solution in PHP: **[2698. Find the Punishment Number of an Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002698-find-the-punishment-number-of-an-integer/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function punishmentNumber($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $s
 * @param $target
 * @param $index
 * @param $currentSum
 * @return bool
 */
function canSplit($s, $target, $index, $currentSum) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
echo punishmentNumber(10) . "\n"; // Output: 182
echo punishmentNumber(37) . "\n"; // Output: 1478
?>
```

### Explanation:

1. **Main Loop**: The main loop iterates through each integer `i` from 1 to `n`. For each integer, it computes the square and converts it to a string.
2. **Recursive Check**: The `canSplit` function is a recursive helper that checks if the string representation of the square can be partitioned into contiguous substrings that sum to `i`. It starts from the beginning of the string and tries all possible splits, checking if any combination of splits results in the sum equal to `i`.
3. **Early Termination**: If adding a part of the string exceeds the target sum `i`, the loop breaks early to avoid unnecessary computations.
4. **Sum Calculation**: If a valid partition is found for an integer `i`, its square is added to the total punishment sum.

This approach efficiently checks all possible partitions using recursion with backtracking, ensuring that we only consider valid splits and sum calculations, leading to the correct result.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
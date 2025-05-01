2843\. Count Symmetric Integers

**Difficulty:** Easy

**Topics:** `Math`, `Enumeration`

You are given two positive integers `low` and `high`.

An integer `x` consisting of `2 * n` digits is **symmetric** if the sum of the first `n` digits of `x` is equal to the sum of the last `n` digits of `x`. Numbers with an odd number of digits are never symmetric.

Return _the **number of symmetric** integers in the range `[low, high]`_.

**Example 1:**

- **Input:** low = 1, high = 100
- **Output:** 9
- **Explanation:** There are 9 symmetric integers between 1 and 100: 11, 22, 33, 44, 55, 66, 77, 88, and 99.

**Example 2:**

- **Input:** low = 1200, high = 1230
- **Output:** 4
- **Explanation:** There are 4 symmetric integers between 1200 and 1230: 1203, 1212, 1221, and 1230.



**Constraints:**

- <code>1 <= low <= high <= 10<sup>4</sup></code>


**Hint:**
1. Iterate over all numbers from `low` to `high`
2. Convert each number to a string and compare the sum of the first half with that of the second.



**Solution:**

We need to count the number of symmetric integers within a given range [low, high]. A symmetric integer is defined as a number with an even number of digits where the sum of the first half of the digits is equal to the sum of the second half of the digits.

### Approach
1. **Iterate through the range**: Check each number from `low` to `high` inclusive.
2. **Check for even digit count**: Convert each number to a string to determine its length. If the length is odd, the number cannot be symmetric, so we skip it.
3. **Split and sum digits**: For numbers with even digits, split the digits into two halves. Calculate the sum of the digits in the first half and the sum of the digits in the second half.
4. **Compare sums**: If the sums of the two halves are equal, the number is symmetric, and we increment our count.

Let's implement this solution in PHP: **[2843. Count Symmetric Integers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002843-count-symmetric-integers/solution.php)**

```php
<?php
/**
 * @param Integer $low
 * @param Integer $high
 * @return Integer
 */
function countSymmetricIntegers($low, $high) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo countSymmetricIntegers(1, 100); // Output: 9
echo "\n";
echo countSymmetricIntegers(1200, 1230); // Output: 4
?>
```

### Explanation:

1. **Iteration through the range**: The loop runs from `low` to `high`, checking each number in the range.
2. **Digit count check**: Converting each number to a string allows us to check its length. If the length is odd, we skip further checks for that number.
3. **Splitting and summing digits**: For numbers with even digits, we split the string into two halves. We then sum the digits of each half separately.
4. **Comparison of sums**: If the sums of the two halves are equal, the number is counted as symmetric.

This approach efficiently checks each number in the range and ensures we only consider valid symmetric integers, providing the correct count with a time complexity of O(N * M), where N is the range size and M is the average number of digits, which is manageable given the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
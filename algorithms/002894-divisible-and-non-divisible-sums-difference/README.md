2894\. Divisible and Non-divisible Sums Difference

**Difficulty:** Easy

**Topics:** `Math`

You are given positive integers `n` and `m`.

Define two integers as follows:

- `num1`: The sum of all integers in the range `[1, n]` (both **inclusive**) that are **not divisible** by `m`.
- `num2`: The sum of all integers in the range `[1, n]` (both **inclusive**) that are **divisible** by `m`.

Return the integer `num1 - num2`.

**Example 1:**

- **Input:** n = 10, m = 3
- **Output:** 19
- **Explanation:** In the given example:
  - Integers in the range [1, 10] that are not divisible by 3 are [1,2,4,5,7,8,10], num1 is the sum of those integers = 37.
  - Integers in the range [1, 10] that are divisible by 3 are [3,6,9], num2 is the sum of those integers = 18.
    We return 37 - 18 = 19 as the answer.

**Example 2:**

- **Input:** n = 5, m = 6
- **Output:** 15
- **Explanation:** In the given example:
  - Integers in the range [1, 5] that are not divisible by 6 are [1,2,3,4,5], num1 is the sum of those integers = 15.
  - Integers in the range [1, 5] that are divisible by 6 are [], num2 is the sum of those integers = 0.
    We return 15 - 0 = 15 as the answer.


**Example 3:**

- **Input:** n = 5, m = 1
- **Output:** -15
- **Explanation:** In the given example:
  - Integers in the range [1, 5] that are not divisible by 1 are [], num1 is the sum of those integers = 0.
  - Integers in the range [1, 5] that are divisible by 1 are [1,2,3,4,5], num2 is the sum of those integers = 15.
    We return 0 - 15 = -15 as the answer.



**Constraints:**

- `1 <= n, m <= 1000`


**Hint:**
1. With arithmetic progression we know that the sum of integers in the range `[1, n]` is `n * (n + 1) / 2` .



**Solution:**

We need to find the difference between the sum of integers in the range `[1, n]` that are not divisible by a given integer m and the sum of those that are divisible by `m`. The solution can be efficiently derived using arithmetic progression formulas.

### Approach
1. **Total Sum Calculation**: The sum of all integers from 1 to n can be calculated using the formula for the sum of an arithmetic series: _**total_sum = (n x (n + 1))/2**_.
2. **Sum of Divisible Numbers**: The sum of integers divisible by m up to n forms an arithmetic sequence. The number of terms in this sequence is _**k = n/m**_. The sum of this sequence is given by _**sum2 = m x ((k x (k + 1))/2)**_.
3. **Difference Calculation**: The difference between the sum of non-divisible numbers and the sum of divisible numbers can be derived as _**total_sum − 2 x sum2**_, since the total sum includes both divisible and non-divisible numbers.

Let's implement this solution in PHP: **[2894. Divisible and Non-divisible Sums Difference](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002894-divisible-and-non-divisible-sums-difference/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $m
 * @return Integer
 */
function differenceOfSums($n, $m) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example cases
echo differenceOfSums(10, 3) . "\n"; // Output: 19
echo differenceOfSums(5, 6) . "\n";  // Output: 15
echo differenceOfSums(5, 1) . "\n";  // Output: -15
?>
```

### Explanation:

1. **Total Sum Calculation**: Using the formula _**(n x (n + 1))/2**_, we compute the sum of all integers from 1 to n. This gives us the total sum of both divisible and non-divisible numbers.
2. **Sum of Divisible Numbers**: We determine the largest integer k such that _**k x m ≤ n**_. The sum of the first k terms of the sequence formed by multiples of m is calculated using the formula _**m x (k x (k + 1))/2**_.
3. **Difference Calculation**: By subtracting twice the sum of the divisible numbers from the total sum, we effectively compute the difference between the sum of non-divisible numbers and the sum of divisible numbers.

This approach efficiently computes the required difference using arithmetic progression formulas, ensuring optimal performance with a time complexity of O(1).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
1922\. Count Good Numbers

**Difficulty:** Medium

**Topics:** `Math`, `Recursion`

A digit string is **good** if the digits (**0-indexed**) at **even** indices are even and the digits at **odd** indices are **prime** (`2`, `3`, `5`, or `7`).

- For example, `"2582"` is good because the digits (`2` and `8`) at even positions are even and the digits (`5` and `2`) at odd positions are prime. However, `"3245"` is **not** good because `3` is at an even index but is not even.

Given an integer `n`, return _the **total** number of good digit strings of length `n`_. Since the answer may be large, **return it modulo** <code>10<sup>9</sup> + 7</code>.

A **digit string** is a string consisting of digits `0` through `9` that may contain leading zeros.

**Example 1:**

- **Input:** n = 1
- **Output:** 5
- **Explanation:** The good numbers of length 1 are "0", "2", "4", "6", "8".

**Example 2:**

- **Input:**  n = 4
- **Output:** 400


**Example 3:**

- **Input:** n = 50
- **Output:** 564908303



**Constraints:**

- <code>1 <= n <= 10<sup>15</sup></code>


**Hint:**
1. Is there a formula we can use to find the count of all the good numbers?
2. Exponentiation can be done very fast if we looked at the binary bits of n.



**Solution:**

We need to count the number of good digit strings of length `n` where a digit string is considered good if the digits at even indices are even and the digits at odd indices are prime numbers (2, 3, 5, or 7). The result should be returned modulo _**10<sup>9</sup> + 7**_.

### Approach
1. **Identify Positions**: For a given length `n`, determine the number of even and odd indices. Even indices are 0, 2, 4, ..., and odd indices are 1, 3, 5, ... . The count of even indices is _**(n + 1) // 2**_ and the count of odd indices is _**n // 2**_.
2. **Calculate Possibilities**:
   - Each even position can be filled with 5 possible even digits (0, 2, 4, 6, 8).
   - Each odd position can be filled with 4 possible prime digits (2, 3, 5, 7).
3. **Modular Exponentiation**: Compute the number of valid combinations for even and odd positions using modular exponentiation to handle large numbers efficiently.

Let's implement this solution in PHP: **[1922. Count Good Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001922-count-good-numbers/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function countGoodNumbers($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $base
 * @param $exponent
 * @param $mod
 * @return int
 */
function pow_mod($base, $exponent, $mod) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

//Test cases
echo countGoodNumbers(1) . "\n";    // Output: 5
echo countGoodNumbers(4) . "\n";    // Output: 400
echo countGoodNumbers(50) . "\n";   // Output: 564908303
?>
```

### Explanation:

1. **Modular Arithmetic**: The problem requires handling very large numbers, so all operations are performed modulo _**10<sup>9</sup> + 7**_.
2. **Efficient Exponentiation**: The `pow_mod` function uses binary exponentiation to compute powers efficiently, reducing the time complexity to _**O(log n)**_ for each exponentiation.
3. **Combining Results**: The total number of good strings is the product of the possibilities for even and odd positions, each computed using modular exponentiation, and then combined under modulo _**10<sup>9</sup> + 7**_.

This approach ensures that we efficiently compute the result even for the upper constraint of _**n = 10<sup>15</sup>**_ by leveraging modular arithmetic and efficient exponentiation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
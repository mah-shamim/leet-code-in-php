2338\. Count the Number of Ideal Arrays

**Difficulty:** Hard

**Topics:** `Math`, `Dynamic Programming`, `Combinatorics`, `Number Theory`

You are given two integers `n` and `maxValue`, which are used to describe an **ideal** array.

A **0-indexed** integer array `arr` of length `n` is considered **ideal** if the following conditions hold:

- Every `arr[i]` is a value from `1` to `maxValue`, for `0 <= i < n`.
- Every `arr[i]` is divisible by `arr[i - 1]`, for `0 < i < n`.

Return _the number of **distinct** ideal arrays of length `n`_. Since the answer may be very large, return it modulo <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** n = 2, maxValue = 5
- **Output:** 10
- **Explanation:** The following are the possible ideal arrays:
  - Arrays starting with the value 1 (5 arrays): [1,1], [1,2], [1,3], [1,4], [1,5]
  - Arrays starting with the value 2 (2 arrays): [2,2], [2,4]
  - Arrays starting with the value 3 (1 array): [3,3]
  - Arrays starting with the value 4 (1 array): [4,4]
  - Arrays starting with the value 5 (1 array): [5,5]
    There are a total of 5 + 2 + 1 + 1 + 1 = 10 distinct ideal arrays.

**Example 2:**

- **Input:** n = 5, maxValue = 3
- **Output:** 11
- **Explanation:** The following are the possible ideal arrays:
  - Arrays starting with the value 1 (9 arrays):
     - With no other distinct values (1 array): [1,1,1,1,1]
     - With 2<sup>nd</sup> distinct value 2 (4 arrays): [1,1,1,1,2], [1,1,1,2,2], [1,1,2,2,2], [1,2,2,2,2]
     - With 2<sup>nd</sup> distinct value 3 (4 arrays): [1,1,1,1,3], [1,1,1,3,3], [1,1,3,3,3], [1,3,3,3,3]
  - Arrays starting with the value 2 (1 array): [2,2,2,2,2]
  - Arrays starting with the value 3 (1 array): [3,3,3,3,3]
    There are a total of 9 + 1 + 1 = 11 distinct ideal arrays.


**Example 3:**

- **Input:** cost = [[2, 5, 1], [3, 4, 7], [8, 1, 2], [6, 2, 4], [3, 8, 8]]
- **Output:** 10



**Constraints:**

- <code>2 <= n <= 10<sup>4</sup></code>
- <code>1 <= maxValue <= 10<sup>4</sup></code>


**Hint:**
1. Notice that an ideal array is non-decreasing.
2. Consider an alternative problem: where an ideal array must also be strictly increasing. Can you use DP to solve it?
3. Will combinatorics help to get an answer from the alternative problem to the actual problem?



**Solution:**

We need to count the number of distinct ideal arrays of length `n` where each element is between 1 and `maxValue`, and each element is a multiple of the previous one. The solution involves combinatorics and dynamic programming to efficiently compute the result.

### Approach
1. **Prime Factorization Insight**: Each element in the ideal array must be a multiple of the previous element. This implies that the prime factors of each subsequent element must include the prime factors of the previous element with equal or higher exponents.

2. **Combinatorial Counting**: For each value `v` from 1 to `maxValue`, factorize `v` into its prime factors. The number of valid sequences ending at `v` can be determined by the product of combinations of exponents for each prime factor. Specifically, for each prime factor with exponent `e`, the number of valid sequences is given by the binomial coefficient `C(e + n - 1, n - 1)`.

3. **Precomputation**: Precompute factorials and inverse factorials up to a sufficient limit using modular arithmetic to efficiently compute binomial coefficients.

4. **Summing Contributions**: For each value `v`, compute the product of binomial coefficients for its prime factors and sum these products modulo _**10<sup>>9</sup> + 7**_.

Let's implement this solution in PHP: **[2338. Count the Number of Ideal Arrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002338-count-the-number-of-ideal-arrays/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $maxValue
 * @return Integer
 */
function idealArrays($n, $maxValue) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $maxValue
 * @return array
 */
function computeSPF($maxValue) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $a
 * @param $b
 * @param $mod
 * @return int
 */
function pow_mod($a, $b, $mod) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $max
 * @param $mod
 * @return array
 */
function precomputeFactorials($max, $mod) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
echo idealArrays(2, 5) . "\n"; // Output: 10
echo idealArrays(5, 3) . "\n"; // Output: 11
?>
```

### Explanation:

1. **Prime Factorization with SPF**: The `computeSPF` function precomputes the smallest prime factor (SPF) for each number up to `maxValue` using a sieve method. This helps in quickly factorizing any number into its prime factors.

2. **Factorial Precomputation**: The `precomputeFactorials` function calculates factorials and their modular inverses up to a sufficient limit to handle the largest required binomial coefficient efficiently.

3. **Combination Calculation**: For each value `v`, we factorize it into primes and compute the product of binomial coefficients for each prime's exponent. This product gives the number of valid sequences ending at `v`.

4. **Summing Results**: The sum of these products for all values from 1 to `maxValue` gives the total number of ideal arrays, which is returned modulo _**10<sup>9</sup> + 7**_.

This approach efficiently handles the constraints by leveraging combinatorial mathematics and dynamic programming to avoid brute-force enumeration of all possible sequences.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
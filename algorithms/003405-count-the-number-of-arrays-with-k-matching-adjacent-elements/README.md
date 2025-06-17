3405\. Count the Number of Arrays with K Matching Adjacent Elements

**Difficulty:** Hard

**Topics:** `Math`, `Combinatorics`

You are given three integers `n`, `m`, `k`. A **good array** `arr` of size `n` is defined as follows:

- Each element in `arr` is in the **`inclusive`** range `[1, m]`.
- _Exactly_ `k` indices `i` (where `1 <= i < n`) satisfy the condition `arr[i - 1] == arr[i]`.

Return _the number of **good arrays** that can be formed_.

Since the answer may be very large, return it **modulo** <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** n = 3, m = 2, k = 1
- **Output:** 4
- **Explanation:**
  - There are 4 good arrays. They are `[1, 1, 2]`, `[1, 2, 2]`, `[2, 1, 1]` and `[2, 2, 1]`.
  - Hence, the answer is 4.

**Example 2:**

- **Input:** n = 4, m = 2, k = 2
- **Output:** 6
- **Explanation:**
  - The good arrays are `[1, 1, 1, 2]`, `[1, 1, 2, 2]`, `[1, 2, 2, 2]`, `[2, 1, 1, 1]`, `[2, 2, 1, 1]` and `[2, 2, 2, 1]`.
  - Hence, the answer is 6.


**Example 3:**

- **Input:** n = 5, m = 2, k = 0
- **Output:** 2
- **Explanation:**
  - The good arrays are `[1, 2, 1, 2, 1]` and `[2, 1, 2, 1, 2]`. 
  - Hence, the answer is 2.


**Constraints:**

- <code>1 <= n <= 10<sup>5</sup></code>
- <code>1 <= m <= 10<sup>5</sup></code>
- `0 <= k <= n - 1`


**Hint:**
1. The first position `arr[0]` has `m` choices.
2. For each of the remaining `n - 1` indices, `0 < i < n`, select `k` positions from left to right and set `arr[i] = arr[i - 1]`.
3. For all other indices, set `arr[i] != arr[i - 1]` with (`m - 1`) choices for each of the `n - 1 - k` positions.






**Solution:**

We need to count the number of "good arrays" of size `n` where each element is in the range `[1, m]` and exactly `k` adjacent elements are equal. The solution involves combinatorial mathematics and modular arithmetic to efficiently compute the result, especially given the constraints where `n` and `m` can be as large as _**1010<sup>5</sup>**_.

### Approach
1. **Problem Analysis**: The problem requires constructing arrays of length `n` with elements from `1` to `m` such that exactly `k` adjacent pairs (i.e., `arr[i-1] == arr[i]`) exist. The solution leverages combinatorial mathematics to determine the number of valid arrays:
   - **Initial Element**: The first element of the array can be any of the `m` choices.
   - **Adjacent Pairs**: Among the `n-1` adjacent pairs, we need to choose `k` positions where the elements are equal. The number of ways to choose these positions is given by the binomial coefficient _**C(n-1, k)**_.
   - **Non-adjacent Pairs**: For the remaining `n-1-k` positions, the elements must differ from their immediate predecessors. Each such position offers `m-1` choices (any value except the previous element).

2. **Combinatorial Formula**: The total number of good arrays is calculated as:
   
   _**result = m × C(n-1, k) × (m-1)<sup>(n-1-k)</sup>**_
   
   Here, _**C(n-1, k)**_ is the binomial coefficient representing the number of ways to choose `k` positions out of `n-1` for equal adjacent pairs.

3. **Modular Arithmetic**: Given the large constraints, all calculations are performed modulo _**10<sup>9</sup> + 7**_ to avoid overflow and meet the problem requirements.

4. **Efficient Computation**:
   - **Factorial Precomputation**: Precompute factorials up to _**n-1**_ to efficiently compute binomial coefficients using modular inverses (via Fermat's Little Theorem).
   - **Fast Exponentiation**: Compute _**(m-1)<sup>(n-1-k)</sup>**_ efficiently using modular exponentiation (power by squaring).

Let's implement this solution in PHP: **[3405. Count the Number of Arrays with K Matching Adjacent Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003405-count-the-number-of-arrays-with-k-matching-adjacent-elements/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $m
 * @param Integer $k
 * @return Integer
 */
function countGoodArrays($n, $m, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Modular exponentiation
 *
 * @param $base
 * @param $exponent
 * @param $mod
 * @return int
 */
function mod_pow($base, $exponent, $mod) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo countGoodArrays(3, 2, 1) . "\n"; // Output: 4
echo countGoodArrays(4, 2, 2) . "\n"; // Output: 6
echo countGoodArrays(5, 2, 0) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Initial Checks**: If `k` exceeds the number of adjacent pairs (`n-1`), return 0 since it's impossible to have more equal pairs than available positions.
2. **Factorial Precomputation**: Precompute factorials up to `n-1` modulo _**10<sup>9</sup> + 7**_ to facilitate binomial coefficient calculations.
3. **Binomial Coefficient Calculation**: Compute _**C(n-1, k)**_ using factorials and modular inverses (using Fermat's Little Theorem for efficiency).
4. **Exponentiation**: Calculate _**(m-1)<sup>(n-1-k)</sup>**_ using fast exponentiation to handle large powers efficiently under modulo.
5. **Result Calculation**: Combine the results (initial element choices, binomial coefficient, and the exponentiation result) under modulo _**10<sup>9</sup> + 7**_ to get the final count of good arrays.

This approach efficiently combines combinatorial mathematics with modular arithmetic to solve the problem within feasible computational limits, even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
3348\. Smallest Divisible Digit Product II

**Difficulty:** Hard

**Topics:** `Principal`, `Math`, `String`, `Backtracking`, `Greedy`, `Number Theory`, `Biweekly Contest 143`

You are given a string num which represents a positive integer, and an integer `t`.

A number is called **zero-free** if none of its digits are 0.

Return a string representing the **smallest zero-free** number greater than or equal to `num` such that the **product of its digits** is divisible by `t`. If no such number exists, return `"-1"`.

**Example 1:**

- **Input:** num = "1234", t = 256
- **Output:** "1488"
- **Explanation:** The smallest zero-free number that is greater than 1234 and has the product of its digits divisible by 256 is 1488, with the product of its digits equal to 256.

**Example 2:**

- **Input:** num = "12355", t = 50
- **Output:** "12355"
- **Explanation:** 12355 is already zero-free and has the product of its digits divisible by 50, with the product of its digits equal to 150.

**Example 3:**

- **Input:** num = "11111", t = 26
- **Output:** "-1"
- **Explanation:** No number greater than 11111 has the product of its digits divisible by 26.

**Example 4:**

- **Input:** num = "99", t = 81
- **Output:** "99"

**Example 5:**

- **Input:** num = "987", t = 2
- **Output:** "1112"

**Example 6:**

- **Input:** num = "123", t = 7
- **Output:** "1117"

**Example 7:**

- **Input:** num = "555", t = 125
- **Output:** "555"

**Example 8:**

- **Input:** num = "1", t = 1
- **Output:** "1"

**Example 9:**

- **Input:** num = "1000", t = 2
- **Output:** "1112"

**Example 10:**

- **Input:** num = "999", t = 100000000000000
- **Output:** "4555555555555558888"

**Constraints:**

- `2 <= num.length <= 2 * 10⁵`
- `num` consists only of digits in the range `['0', '9']`.
- `num` does not contain leading zeros.
- `1 <= t <= 10¹⁴`


**Hint:**
1. `t` should only have 2, 3, 5 and 7 as prime factors.
2. Find the shortest suffix that must be changed.
3. Try to form the string greedily.


**Similar Questions:**
1. [2847. Smallest Number With Given Digit Product](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002847-smallest-number-with-given-digit-product)


**Solution:**

We implemented a greedy backtracking solution that finds the smallest zero‑free number ≥ given `num` whose digit product is divisible by `t`. The algorithm first factors `t` into its prime components (only 2,3,5,7 are relevant), then attempts to preserve as much of the prefix as possible while adjusting the suffix. If no same‑length number works, it constructs the shortest possible longer number using the most compact digit‑factor representation.

## Approach

- Factorize `t` into prime exponents for 2,3,5,7. If any other prime factor exists, return `"-1"`.
- Compute the shortest digit‑multiset (using digits 2‑9) that satisfies the required prime‑factor counts using a custom `getFactorCount` method that optimally groups factors into digits (e.g., three 2s → 8, two 3s → 9).
- If the minimal required digit count exceeds the length of `num`, directly return the constructed number padded with leading `1`s.
- Scan from right to left to find the earliest position where increasing the digit can still allow the suffix to satisfy the remaining factor requirements.
- For each candidate larger digit at that position, check if the leftover factor demand can be filled within the available suffix length using our compact digit‑factor mapping.
- If a valid position is found, build the result: prefix unchanged, larger digit, then `1`s (which don’t affect product), then the compact factor‑fulfilling digits.
- If no same‑length solution exists, return a number of length `len(num)+1` consisting of leading `1`s followed by the minimal factor‑fulfilling digits.

Let's implement this solution in PHP: **[3348. Smallest Divisible Digit Product II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003348-smallest-divisible-digit-product-ii/solution.php)**

```php
<?php
/**
 * @param string $num
 * @param int $t
 * @return string
 */
function smallestNumber(string $num, int $t): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param int $t
 * @return array
 */
function getPrimeCount(int $t): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param string $num
 * @param array $factorCounts
 * @return int[]
 */
function getPrimeCountFromString(string $num, array $factorCounts): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param array $count
 * @return int[]
 */
function getFactorCount(array $count): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param array $factors
 * @return string
 */
function constructNumber(array $factors): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param array $a
 * @param array $b
 * @return bool
 */
function isSubset(array $a, array $b): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param array $a
 * @param array $b
 * @return array
 */
function subtract(array $a, array $b): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo smallestNumber("1234", 256) .  "\n";                           // Output: "1488"
echo smallestNumber("12355", 50) .  "\n";                           // Output: "12355"
echo smallestNumber("11111", 26) .  "\n";                           // Output: "-1"
echo smallestNumber("99", 81) .  "\n";                              // Output: "99"
echo smallestNumber("987", 2) .  "\n";                              // Output: "1112"
echo smallestNumber("123", 7) .  "\n";                              // Output: "1117"
echo smallestNumber("555", 125) .  "\n";                            // Output: "555"
echo smallestNumber("1", 1) .  "\n";                                // Output: "1"
echo smallestNumber("1000", 2) .  "\n";                             // Output: "1112"
echo smallestNumber("999", 100000000000000) .  "\n";                // Output: "4555555555555558888"
?>
```

### Explanation:

- **Prime‑only validation**: Since digits 1‑9 only contribute factors 2,3,5,7, any `t` with other prime factors is impossible.
- **Digit‑factor mapping**: Pre‑compute prime‑factor vectors for each digit 0‑9 (0 and 1 contribute none). For 0, any product becomes 0, but the problem requires zero‑free numbers, so we actively avoid digit 0.
- **Compact factor grouping**: `getFactorCount` translates required prime exponents into the fewest number of digits (preferring larger digits like 8,9,6 to minimize digit count). This is crucial for fitting within length constraints and constructing the smallest numeric string.
- **Prefix preservation**: The algorithm attempts to keep the longest possible prefix of `num` unchanged. It tracks the cumulative factors of the prefix (`primeCountPrefix`). When considering a change at position `i`, it subtracts the current digit’s factors and tries all larger digits.
- **Feasibility check**: For a candidate larger digit, we compute the remaining factor demand for the suffix. If that demand can be met within the remaining positions (including optional `1`s), we construct the result greedily – `1`s are added first (they are smallest and don’t affect product), followed by the compact factor digits sorted ascending.
- **Fallback to longer length**: If no valid same‑length number exists, the minimal longer number is formed by as many leading `1`s as possible (to keep the number small) plus the minimal factor‑fulfilling digits in ascending order.

## Complexity Analysis

- **Time**: `O(n * 10 * 8)` = `O(n)`, where `n` = length of `num`. For each position we test at most 9 larger digits, and each test performs constant‑time operations on the fixed‑size prime‑factor arrays (4 primes). Constructing the result also takes `O(n)`.
- **Space**: `O(n)` for the output string; the factor arrays are constant‑size (4 or 8 entries).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
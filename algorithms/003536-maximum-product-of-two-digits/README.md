3536\. Maximum Product of Two Digits

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `Sorting`, `Weekly Contest 448`

You are given a positive integer `n`.

Return the **maximum** product of any two digits in `n`.

**Note:** You may use the **same** digit twice if it appears more than once in `n`.

**Example 1:**

- **Input:** n = 31
- **Output:** 3
- **Explanation:**
  - The digits of `n` are `[3, 1]`.
  - The possible products of any two digits are: `3 * 1 = 3`.
  - The maximum product is 3.

**Example 2:**

- **Input:** n = 22
- **Output:** 4
- **Explanation:**
  - The digits of `n` are `[2, 2]`.
  - The possible products of any two digits are: `2 * 2 = 4`.
  - The maximum product is 4.

**Example 3:**

- **Input:** n = 124
- **Output:** 8
- **Explanation:**
  - The digits of `n` are `[1, 2, 4]`.
  - The possible products of any two digits are: `1 * 2 = 2`, `1 * 4 = 4`, `2 * 4 = 8`.
  - The maximum product is 8.

**Example 4:**

- **Input:** n = 99
- **Output:** 81

**Example 5:**

- **Input:** n = 101
- **Output:** 1

**Example 6:**

- **Input:** n = 1000000000
- **Output:** 0

**Example 7:**

- **Input:** n = 987
- **Output:** 72

**Example 8:**

- **Input:** n = 555
- **Output:** 25


**Constraints:**

- `10 <= n <= 10⁹`


**Hint:**
1. Use brute force


**Solution:**

We convert the integer to a string, split it into an array of digits, and then use a nested loop to compute the product of every pair of digits. (Ensuring we don't pair a digit with itself unless it appears twice.) We track and return the maximum product found.

## Approach

- Convert the integer `n` to a string and then to an array of digits.
- Initialize a variable `maxProduct` to 0.
- Use two nested loops:
   - Outer loop `i` from 0 to `len(digits)-1`.
   - Inner loop `j` from `i+1` to `len(digits)-1` (to avoid duplicate pairs).
- Compute `product = digits[i] * digits[j]`.
- Update `maxProduct` if `product` is larger.
- Return `maxProduct` after loops.

Let's implement this solution in PHP: **[3536. Maximum Product of Two Digits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003536-maximum-product-of-two-digits/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function maxProduct(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxProduct(31) .  "\n";                // Output: 3
echo maxProduct(22) .  "\n";                // Output: 4
echo maxProduct(124) .  "\n";               // Output: 8
echo maxProduct(99) .  "\n";                // Output: 81
echo maxProduct(101) .  "\n";               // Output: 1
echo maxProduct(1000000000) .  "\n";        // Output: 0
echo maxProduct(987) .  "\n";               // Output: 72
echo maxProduct(555) .  "\n";               // Output: 25
?>
```

### Explanation:

- **Digit extraction:** Convert `n` to string and split to get each digit as an integer.
- **Pair iteration:** The nested loops consider every unordered pair of distinct indices, which covers all combinations of two digits (including duplicates if they exist at different positions).
- **Product calculation:** Multiply the two digits and compare with the current maximum.
- **Edge cases:** The constraints ensure `n` has at least two digits, so the loops will always run.
- **No need to sort:** Brute force is sufficient since at most 10 digits → at most 45 pairs.

## Complexity Analysis

- **Time Complexity:** _**O(d²)**_, where `d` is the number of digits in `n`. Since `d ≤ 10` (because `n ≤ 10⁹`), this is effectively constant time.
- **Space Complexity:** _**O(d)**_ for storing the digit array, which is also constant.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
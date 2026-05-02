788\. Rotated Digits

**Difficulty:** Medium

**Topics:** `Senior`, `Math`, `Dynamic Programming`, `Weekly Contest 73`

An integer `x` is a **good** if after rotating each digit individually by 180 degrees, we get a valid number that is different from `x`. Each digit must be rotated - we cannot choose to leave it alone.

A number is valid if each digit remains a digit after rotation. For example:

- `0`, `1`, and `8` rotate to themselves,
- `2` and `5` rotate to each other (in this case they are rotated in a different direction, in other words, `2` or `5` gets mirrored),
- `6` and `9` rotate to each other, and
- the rest of the numbers do not rotate to any other number and become invalid.

Given an integer `n`, return _the number of **good** integers in the range `[1, n]`_.

**Example 1:**

- **Input:** n = 10
- **Output:** 4
- **Explanation:** 
  - There are four good numbers in the range [1, 10] : 2, 5, 6, 9.
  - Note that 1 and 10 are not good numbers, since they remain unchanged after rotating.

**Example 2:**

- **Input:** n = 1
- **Output:** 0

**Example 3:**

- **Input:** n = 2
- **Output:** 1

**Example 4:**

- **Input:** n = 100
- **Output:** 40

**Example 5:**

- **Input:** n = 30
- **Output:** 13

**Example 5:**

- **Input:** n = 10000
- **Output:** 2320

**Constraints:**

- `1 <= n <= 10⁴`






**Solution:**

The solution counts integers between `1` and `n` that are **good** — meaning when each digit is rotated 180°, the resulting number is **different from the original** and contains **no invalid digits** (3, 4, 7).  
It iterates over each number, checks digit-by-digit using the rotation rules, and increments a counter for good numbers.

### Approach:

- Loop through all integers from `1` to `n`.
- For each number, check if it is “good” using digit-by-digit validation.
- A number is **not good** if:
   - Any digit is `3`, `4`, or `7` (invalid).
   - After rotation, the number remains unchanged (i.e., contains only `0`, `1`, or `8`).
- A number is **good** if:
   - No invalid digits.
   - At least one digit from `{2,5,6,9}` exists (since those change on rotation).
- Return the total count.

Let's implement this solution in PHP: **[788. Rotated Digits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000788-rotated-digits/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function rotatedDigits(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Check if a number is "good"
 *
 * @param Integer $num
 * @return bool
 */
function isGood(int $num): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo rotatedDigits(10) . "\n";          // Output: 4
echo rotatedDigits(1) . "\n";           // Output: 0
echo rotatedDigits(2) . "\n";           // Output: 1
echo rotatedDigits(100) . "\n";         // Output: 40
echo rotatedDigits(30) . "\n";          // Output: 13
echo rotatedDigits(10000) . "\n";       // Output: 2320
?>
```

### Explanation:

- **Digit rotation mapping:**
   - `0,1,8` → rotate to themselves.
   - `2,5` → rotate to each other.
   - `6,9` → rotate to each other.
   - `3,4,7` → become invalid.
- **Why `hasRotating` flag?**
   - If all digits are in `{0,1,8}`, the rotated number equals the original → **not good**.
   - If any digit is in `{2,5,6,9}`, the rotated number is different → **good**.
- **Early exit:** If an invalid digit `3,4,7` is found, the number is immediately rejected.

### Complexity
- **Time Complexity**: _**O(n * d)**_, where `d` is the number of digits in `n` (at most 5 for `n ≤ 10⁴`). So roughly _**O(n log₁₀ n)**_.
- **Space Complexity**: _**O(1)**_ — only a few variables used per iteration.
- **Trade-off:** Simple implementation but linear in `n`, which is fine given the constraint `n ≤ 10⁴`.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
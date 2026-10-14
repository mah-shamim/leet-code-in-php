3723\. Maximize Sum of Squares of Digits

**Difficulty:** Medium

**Topics:** `Staff`, `Math`, `Greedy`, `Biweekly Contest 168`

You are given two **positive** integers `num` and `sum`.

A positive integer `n` is **good** if it satisfies both of the following:

- The number of digits in `n` is **exactly** `num`.
- The sum of digits in `n` is **exactly** `sum`.

The **score** of a **good** integer `n` is the sum of the squares of digits in `n`.

Return a **string** denoting the **good** integer `n` that achieves the **maximum score**. If there are multiple possible integers, return the **maximum** one. If no such integer exists, return an empty string.

**Example 1:**

- **Input:** num = 2, sum = 3
- **Output:** "30"
- **Explanation:**
  - There are 3 good integers: 12, 21, and 30.
      - The score of 12 is `1² + 2² = 5`.
      - The score of 21 is `2² + 1² = 5`.
      - The score of 30 is `3² + 0² = 9`.
    - The maximum score is 9, which is achieved by the good integer 30. Therefore, the answer is `"30"`.

**Example 2:**

- **Input:** num = 2, sum = 17
- **Output:** "98"
- **Explanation:**
  - There are 2 good integers: 89 and 98.
      - The score of 89 is `8² + 9² = 145`.
      - The score of 98 is `9² + 8² = 145`.
    - The maximum score is 145. The maximum good integer that achieves this score is 98. Therefore, the answer is `"98"`.

**Example 3:**

- **Input:** num = 1, sum = 10
- **Output:** ""
- **Explanation:** There are no integers that have exactly 1 digit and whose digits sum to 10. Therefore, the answer is `""`.

**Example 4:**
- **Input:** num = 1, sum = 9
- **Output:** `"9"`
- **Explanation:** The only possible digit is `9`.

**Example 5:**
- **Input:** num = 2, sum = 18
- **Output:** `"99"`
- **Explanation:** The maximum digit sum for 2 digits is `9 + 9 = 18`, so the only valid integer is `99`.

**Example 6:**
- **Input:** num = 3, sum = 18
- **Output:** `"990"`
- **Explanation:** To maximize the score, use two `9`s and one `0`: `9² + 9² + 0² = 162`. The maximum valid integer is `990`.

**Example 7:**
- **Input:** num = 3, sum = 19
- **Output:** `"991"`
- **Explanation:** The best digits are two `9`s and one `1`: `9² + 9² + 1² = 163`. The maximum valid integer is `991`.

**Example 8:**
- **Input:** num = 3, sum = 27
- **Output:** `"999"`
- **Explanation:** The maximum digit sum for 3 digits is `9 + 9 + 9 = 27`, so the only valid integer is `999`.

**Example 9:**
- **Input:** num = 3, sum = 28
- **Output:** `""`
- **Explanation:** The maximum digit sum for 3 digits is `9 * 3 = 27`, so sum 28 is impossible.

**Example 10:**
- **Input:** num = 4, sum = 1
- **Output:** `"1000"`
- **Explanation:** The only valid 4-digit integer with digit sum 1 is `1000`.

**Example 11:**
- **Input:** num = 2, sum = 10
- **Output:** `"91"`
- **Explanation:** The maximum score is `9² + 1² = 82`, achieved by both `19` and `91`. The maximum valid integer is `91`.

**Example 12:**
- **Input:** num = 5, sum = 45
- **Output:** `"99999"`
- **Explanation:** The maximum digit sum for 5 digits is `9 * 5 = 45`, so the only valid integer is `99999`.

**Constraints:**

- `1 <= num <= 2 * 10⁵`
- `1 <= sum <= 2 * 10⁶`


**Hint:**

1. Use a greedy approach.
2. Fill the leftmost digits with 9s first (as much as possible).


**Solution:**

We need to handle two types of queries on a power grid where stations can go offline, and I need to find the smallest operational station in the same connected component.

## Approach

- Let `num` be the required number of digits and `sum` be the required digit sum.
- If `sum > 9 * num`, it is impossible to form such a number, so return `""`.
- Compute:
    - `q = intdiv(sum, 9)` — number of `9`s we can use.
    - `r = sum % 9` — leftover digit after placing `9`s.
- If `r == 0`, return `q` copies of `'9'` followed by `num - q` copies of `'0'`.
- Otherwise, return `q` copies of `'9'`, then `r`, then enough `'0'`s to reach exactly `num` digits.
- This construction is valid because the first digit is never `0` when `sum > 0`.

Let's implement this solution in PHP: **[3723. Maximize Sum of Squares of Digits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003723-maximize-sum-of-squares-of-digits/solution.php)**

```php
<?php
/**
 * @param Integer $num
 * @param Integer $sum
 * @return String
 */
function maxSumOfSquares(int $num, int $sum): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxSumOfSquares(2, 3) . "\n";   // Output: "30"
echo maxSumOfSquares(2, 17) . "\n";  // Output: "98"
echo maxSumOfSquares(1, 10) . "\n";  // Output: ""
echo maxSumOfSquares(1, 9) . "\n";   // Output: "9"
echo maxSumOfSquares(2, 18) . "\n";  // Output: "99"
echo maxSumOfSquares(3, 18) . "\n";  // Output: "990"
echo maxSumOfSquares(3, 19) . "\n";  // Output: "991"
echo maxSumOfSquares(3, 27) . "\n";  // Output: "999"
echo maxSumOfSquares(3, 28) . "\n";  // Output: ""
echo maxSumOfSquares(4, 1) . "\n";   // Output: "1000"
echo maxSumOfSquares(2, 10) . "\n";  // Output: "91"
echo maxSumOfSquares(5, 45) . "\n";  // Output: "99999"
?>
```

### Explanation:

- To maximize `sum of squares`, we want digits to be as large and unequal as possible.
- The largest allowed digit is `9`, so we use as many `9`s as possible.
- Any remaining sum less than `9` becomes a single digit.
- The remaining positions must be `0` because they do not change the digit sum and preserve the required number of digits.
- Ordering digits as `9...9 r 0...0` gives the largest possible integer among all numbers with the same maximum score.
- Example: `num = 2, sum = 17` gives `q = 1`, `r = 8`, so the answer is `"98"`.

## Complexity Analysis

- **Time Complexity:** `O(num)` because we build a string of length `num`.
- **Space Complexity:** `O(num)` for the returned string.
- **Auxiliary Space:** `O(1)` excluding the output string.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
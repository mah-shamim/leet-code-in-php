3622\. Check Divisibility by Digit Sum and Product

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `Weekly Contest 459`

You are given a positive integer `n`. Determine whether `n` is divisible by the **sum** of the following two values:

- The **digit sum** of `n` (the sum of its digits).
- The **digit product** of `n` (the product of its digits).

Return `true` if `n` is divisible by this sum; otherwise, return `false`.

**Example 1:**

- **Input:** n = 99
- **Output:** true
- **Explanation:** Since 99 is divisible by the sum (9 + 9 = 18) plus product (9 * 9 = 81) of its digits (total 99), the output is true.

**Example 2:**

- **Input:** n = 23
- **Output:** false
- **Explanation:** Since 23 is not divisible by the sum (2 + 3 = 5) plus product (2 * 3 = 6) of its digits (total 11), the output is false.

**Example 3:**

- **Input:** n = 1
- **Output:** false

**Example 4:**

- **Input:** n = 2
- **Output:** false

**Example 5:**

- **Input:** n = 11
- **Output:** false

**Example 6:**

- **Input:** n = 12
- **Output:** false

**Example 7:**

- **Input:** n = 22
- **Output:** false

**Example 8:**

- **Input:** n = 24
- **Output:** false

**Example 9:**

- **Input:** n = 27
- **Output:** false

**Example 10:**

- **Input:** n = 33
- **Output:** false

**Example 11:**

- **Input:** n = 36
- **Output:** false

**Example 12:**

- **Input:** n = 48
- **Output:** false

**Example 13:**

- **Input:** n = 101
- **Output:** false

**Example 14:**

- **Input:** n = 111
- **Output:** false

**Example 15:**

- **Input:** n = 123
- **Output:** false

**Example 16:**

- **Input:** n = 222
- **Output:** false

**Example 17:**

- **Input:** n = 224
- **Output:** false

**Example 18:**

- **Input:** n = 315
- **Output:** false

**Example 19:**

- **Input:** n = 1000
- **Output:** true

**Example 20:**

- **Input:** n = 1000000
- **Output:** true

**Example 21:**

- **Input:** n = 999999
- **Output:** false

**Constraints:**

- `1 <= n <= 10⁶`


**Hint:**
1. Compute the digits' sum and product, then check if `n % (sum + product) == 0`.


**Solution:**

We implement a straightforward digit manipulation solution that computes both the sum and product of all digits in the given number `n`, then checks if `n` is divisible by their combined value. Our approach handles the constraints efficiently with a single pass through the digits using modulo and division operations.

## Approach

- **Digit Extraction**: Use a while loop to extract each digit from right to left using modulo operation (`% 10`)
- **Accumulate Values**: Maintain running totals for digit sum (starting at 0) and digit product (starting at 1)
- **Handle Single Digits**: Initialize product as 1 to handle single-digit numbers correctly (product = the digit itself)
- **Divisibility Check**: Calculate divisor = sum + product and check if `n % divisor == 0`
- **Edge Cases**: Since constraints specify `n >= 1`, we don't need to handle zero digits specially

Let's implement this solution in PHP: **[3622. Check Divisibility by Digit Sum and Product](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003622-check-divisibility-by-digit-sum-and-product/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Boolean
 */
function checkDivisibility(int $n): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo checkDivisibility(99) .  "\n";         // Output: true
echo checkDivisibility(23) .  "\n";         // Output: false
echo checkDivisibility(1) .  "\n";          // Output: false
echo checkDivisibility(5) .  "\n";          // Output: false
echo checkDivisibility(11) .  "\n";         // Output: false
echo checkDivisibility(12) .  "\n";         // Output: false
echo checkDivisibility(22) .  "\n";         // Output: false
echo checkDivisibility(24) .  "\n";         // Output: false
echo checkDivisibility(27) .  "\n";         // Output: false
echo checkDivisibility(33) .  "\n";         // Output: false
echo checkDivisibility(36) .  "\n";         // Output: false
echo checkDivisibility(48) .  "\n";         // Output: false
echo checkDivisibility(101) .  "\n";        // Output: false
echo checkDivisibility(111) .  "\n";        // Output: false
echo checkDivisibility(123) .  "\n";        // Output: false
echo checkDivisibility(222) .  "\n";        // Output: false
echo checkDivisibility(224) .  "\n";        // Output: false
echo checkDivisibility(315) .  "\n";        // Output: false
echo checkDivisibility(1000) .  "\n";       // Output: true
echo checkDivisibility(1000000) .  "\n";    // Output: true
echo checkDivisibility(999999) .  "\n";     // Output: false
?>
```

### Explanation:

- **Digit Sum Calculation**: We repeatedly take the last digit using `num % 10` and add it to `$sum`, then remove the last digit by integer division `intval($num / 10)`
- **Digit Product Calculation**: We multiply each extracted digit into `$product`. Starting `$product` at 1 ensures correct multiplication (multiplying by 1 doesn't change the result)
- **Single-Digit Handling**: For numbers like 5, the loop extracts digit 5, sets `$sum = 5`, `$product = 5`, so divisor = 10, and `5 % 10 != 0` (except for 1 where `1 % 2 != 0`)
- **Zero Digits**: Not possible in this problem since `n >= 1` and we only extract actual digits (no leading zeros). However, if a digit were 0, the product would become 0, making the divisor equal to the sum
- **Divisibility Test**: The final check `n % (sum + product) == 0` determines if n is evenly divisible by the combined value
- **Return Value**: Returns `true` if divisible, `false` otherwise, matching the required boolean output

## Complexity Analysis

- **Time Complexity**: _**O(d)**_ where `d` is the number of digits in `n`. Since `n ≤ 10⁶`, `d ≤ 7`, making this effectively _**O(1)**_ constant time
- **Space Complexity**: _**O(1)**_ - we use only a few integer variables regardless of input size

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
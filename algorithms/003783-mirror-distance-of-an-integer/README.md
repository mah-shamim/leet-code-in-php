3783\. Mirror Distance of an Integer

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `Weekly Contest 481`

You are given an integer `n.`

Define its **mirror distance** as: `abs(n - reverse(n))` where `reverse(n)` is the integer formed by reversing the digits of `n`.

Return an integer denoting the mirror distance of `n`.

`abs(x)` denotes the absolute value of `x`.

**Example 1:**

- **Input:** n = 25
- **Output:** 27
- **Explanation:**
  - `reverse(25) = 52`.
  - Thus, the answer is `abs(25 - 52) = 27`.


**Example 2:**

- **Input:** n = 10
- **Output:** 9
- **Explanation:**
  - `reverse(10) = 01` which is 1.
  - Thus, the answer is `abs(10 - 1) = 9`.


**Example 3:**

- **Input:** n = 7
- **Output:** 0
- **Explanation:**
  - `reverse(7) = 7`.
  - Thus, the answer is `abs(7 - 7) = 0`.


**Example 4:**

- **Input:** n = 100
- **Output:** 99


**Constraints:**

- `1 <= n <= 10⁹`



**Hint:**
1. Simulate as described






**Solution:**

The function calculates the **mirror distance** of an integer by reversing its digits, then returning the absolute difference between the original number and its reverse.

### Approach:

- Convert the integer to its digit-reversed form without converting to a string.
- Use a loop to extract digits from the original number and build the reversed number.
- Return the absolute difference between the original and reversed numbers.

Let's implement this solution in PHP: **[3783. Mirror Distance of an Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003783-mirror-distance-of-an-integer/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function mirrorDistance(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo mirrorDistance(25) . "\n";         // Output: 27
echo mirrorDistance(10) . "\n";         // Output: 9
echo mirrorDistance(7) . "\n";          // Output: 0
echo mirrorDistance(100) . "\n";        // Output: 99
?>
```

### Explanation:

- **Reverse the digits**:
   - Repeatedly take the last digit of `n` using `n % 10`.
   - Append it to `reversed` by multiplying `reversed` by 10 and adding the digit.
   - Remove the last digit from `n` using integer division by 10.
   - Continue until `n` becomes 0.
- **Handle leading zeros**:
   - The reversal process automatically discards leading zeros because they don’t contribute to the integer value (e.g., `10` → `1`).
- **Compute mirror distance**:
   - Use `abs(original - reversed)` to get the positive difference.

### Complexity
- **Time Complexity**: _**O(d)**_ where d is the number of digits in `n` (at most 10, since n ≤ 10⁹).
- **Space Complexity**: _**O(1)**_ — only a few integer variables used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
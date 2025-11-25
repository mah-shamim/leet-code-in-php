1015\. Smallest Integer Divisible by K

**Difficulty:** Medium

**Topics:** `Hash Table`, `Math`, `Weekly Contest 129`

Given a positive integer `k`, you need to find the **length** of the **smallest** positive integer `n` such that `n` is divisible by `k`, and `n` only contains the digit `1`.

Return _the **length** of `n`. If there is no such `n`, return `-1`_.

**Note:** `n` may not fit in a 64-bit signed integer.

**Example 1:**

- **Input:** k = 1
- **Output:** 1
- **Explanation:** The smallest answer is n = 1, which has length 1.

**Example 2:**

- **Input:** k = 2
- **Output:** -1
- **Explanation:** There is no such positive integer n divisible by 2.

**Example 3:**

- **Input:** k = 3
- **Output:** 3
- **Explanation:** The smallest answer is n = 111, which has length 3.

**Constraints:**

- `1 <= k <= 10⁵`


**Hint:**
1. 11111 = 1111 * 10 + 1 We only need to store remainders modulo K.
2. If we never get a remainder of 0, why would that happen, and how would we know that?






**Solution:**

We need to find the smallest number consisting only of digit '1' that is divisible by k.

### Approach:

- I can't actually build the number because it might be extremely large
- Instead, I can work with remainders and build the number digit by digit
- The number n can be represented as: n = 1, 11, 111, 1111, etc.
- Each new number is the previous number × 10 + 1

Let's implement this solution in PHP: **[1015. Smallest Integer Divisible by K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001015-smallest-integer-divisible-by-k/solution.php)**

```php
<?php
/**
 * @param Integer $k
 * @return Integer
 */
function smallestRepunitDivByK($k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo smallestRepunitDivByK(1) . "\n";   // Output: 1
echo smallestRepunitDivByK(2) . "\n";   // Output: -1
echo smallestRepunitDivByK(3) . "\n";   // Output: 3
?>
```

### Explanation:

1. **Early termination for impossible cases**: If `k` is even or divisible by 5, no number ending with digit 1 can be divisible by it, so we return -1 immediately.

2. **Working with remainders**: Instead of building the actual number (which could be huge), I track only the remainder when divided by `k`. This keeps the numbers manageable.

3. **Building the sequence**:
   - Start with remainder = 0
   - For each new digit '1' we add: `new_remainder = (old_remainder × 10 + 1) % k`
   - This is equivalent to building: 1, 11, 111, 1111, etc.

4. **Stopping condition**:
   - If remainder becomes 0, we found our answer
   - If we try `k` iterations without finding 0, no solution exists (by pigeonhole principle)

**Why the loop runs at most k times?**
- There are only `k` possible remainders (0 to k-1)
- If we don't hit 0 after k iterations, we must have repeated a remainder
- Once we repeat a remainder, we're in a cycle and will never hit 0

**Example walkthrough for k = 3:**
- length = 1: remainder = (0×10 + 1) % 3 = 1
- length = 2: remainder = (1×10 + 1) % 3 = 11 % 3 = 2
- length = 3: remainder = (2×10 + 1) % 3 = 21 % 3 = 0 ✓
- Return 3

This solution runs in O(k) time and O(1) space, which is efficient for the given constraints (k ≤ 10⁵).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
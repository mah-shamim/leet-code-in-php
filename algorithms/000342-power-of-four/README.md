342\. Power of Four

**Difficulty:** Easy

**Topics:** `Math`, `Bit Manipulation`, `Recursion`

Given an integer `n`, return _`true` if it is a power of three. Otherwise, return `false`_.

An integer `n` is a power of three, if there exists an integer `x` such that <code>n == 4<sup>x</sup></code>.

**Example 1:**

- **Input:** n = 16
- **Output:** true

**Example 2:**

- **Input:** n = 5
- **Output:** false

**Example 3:**

- **Input:** n = 1
- **Output:** true

**Constraints:**

- <code>-2<sup>31</sup> <= n <= 2<sup>31</sup> - 1</code>


**Follow up:** Could you solve it without loops/recursion?


**Similar Questions:**
1. [231. Power of Two](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000231-power-of-two)
2. [326. Power of Three](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000326-power-of-three)






**Solution:**

We need to determine if a given integer `n` is a power of four. An integer `n` is a power of four if there exists an integer `x` such that <code>n = 4<sup>x</sup></code>. The solution should efficiently check this condition without using loops or recursion.

### Approach
1. **Check for Positive and Non-zero**: Since powers of four are always positive, any non-positive `n` (i.e., `n <= 0`) immediately returns `false`.
2. **Check Power of Two**: A number that is a power of four must also be a power of two. This can be verified using the bitwise operation `(n & (n - 1)) == 0`. If this condition fails, `n` is not a power of two, hence not a power of four.
3. **Check Even Bit Position**: For a number to be a power of four, its single set bit in binary representation must be at an even position (0-indexed from the right). This is checked using a bitmask `0x55555555` (which has bits set at all even positions in a 32-bit integer). If the result of `(n & 0x55555555)` is non-zero, the set bit is at an even position, confirming `n` is a power of four.

Let's implement this solution in PHP: **[342. Power of Four](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000342-power-of-four/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Boolean
 */
function isPowerOfFour($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
var_dump(isPowerOfFour(16)); // true
var_dump(isPowerOfFour(5));  // false
var_dump(isPowerOfFour(1));  // true
?>
```

### Explanation:

1. **Initial Check**: The function first checks if `n` is non-positive. If so, it returns `false` because powers of four must be positive.
2. **Power of Two Check**: The condition `(n & (n - 1)) == 0` checks if `n` is a power of two. If not, `n` cannot be a power of four, so the function returns `false`.
3. **Even Position Check**: The bitmask `0x55555555` (binary `01010101010101010101010101010101`) ensures the single set bit in `n` is at an even position. If the result of `n & mask` is non-zero, `n` is confirmed as a power of four; otherwise, it returns `false`.

This approach efficiently leverages bitwise operations to determine if `n` is a power of four without loops or recursion, adhering to the problem constraints and providing optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
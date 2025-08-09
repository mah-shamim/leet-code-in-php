231\. Power of Two

**Difficulty:** Easy

**Topics:** `Math`, `Bit Manipulation`, `Recursion`

Given an integer `n`, return _`true` if it is a power of two. Otherwise, return `false`_.

An integer `n` is a power of two, if there exists an integer `x` such that <code>n == 2<sup>x</sup></code>.

**Example 1:**

- **Input:** n = 1
- **Output:** true
- **Explanation:** <code>2<sup>0</sup> = 1</code>

**Example 2:**

- **Input:** n = 16
- **Output:** true
- **Explanation:** <code>2<sup>4</sup> = 16</code>

**Example 3:**

- **Input:** n = 3
- **Output:** false

**Constraints:**

- <code>-2<sup>31</sup> <= n <= 2<sup>31</sup> - 1</code>


**Follow up:** Could you solve it without loops/recursion?


**Similar Questions:**
1. [191. Number of 1 Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000191-number-of-1-bits)
2. [326. Power of Three](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000326-power-of-three)
3. [342. Power of Four](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000342-power-of-four)






**Solution:**

We need to determine if a given integer `n` is a power of two. A number is considered a power of two if it can be expressed as _**2^x**_ where _**x**_ is a non-negative integer. The solution should efficiently check this condition without using loops or recursion.

### Approach
The approach leverages bit manipulation properties of numbers that are powers of two. Here's the key insight:
- **Positive Check**: Negative numbers and zero cannot be powers of two, so we immediately return `false` for these cases.
- **Bit Manipulation**: For positive numbers, a power of two in binary representation has exactly one '1' bit, with all other bits being '0'. For example:
    - _**2<sup>0</sup> = 1**_ → `1` in binary.
    - _**2<sup>1</sup> = 2**_ → `10` in binary.
    - _**2<sup>2</sup> = 4**_ → `100` in binary.
- **Bitwise AND Trick**: For any number _**n**_ that is a power of two, the bitwise operation _**n \& (n - 1)**_ will yield zero. This is because subtracting 1 from _**n**_ flips all the bits after the least significant '1' bit, making the bitwise AND result zero. For example:
    - _**n = 4**_ (binary `100`), _**n - 1 = 3**_ (binary `011`). The AND operation _**100 \& 011 = 000**_ (0).

Thus, the solution involves:
1. Checking if the number is non-positive (returns `false` immediately).
2. Applying the bitwise AND operation between _**n**_ and _**n-1**_ to check if the result is zero.

Let's implement this solution in PHP: **[231. Power of Two](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000231-power-of-two/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Boolean
 */
function isPowerOfTwo($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
var_dump(isPowerOfTwo(1));   // true (2^0)
var_dump(isPowerOfTwo(16));  // true (2^4)
var_dump(isPowerOfTwo(3));   // false
var_dump(isPowerOfTwo(0));   // false
var_dump(isPowerOfTwo(-2));  // false
?>
```

### Explanation:

1. **Non-Positive Check**: The function first checks if the input _**n**_ is less than or equal to zero. Since powers of two must be positive, any non-positive input immediately returns `false`.
2. **Bitwise AND Operation**: For positive numbers, the function computes _**n \& (n - 1)**_. If this result is zero, it confirms that _**n**_ has exactly one '1' bit in its binary representation, meaning _**n**_ is a power of two. The function returns `true` in this case; otherwise, it returns `false`.

This approach efficiently checks the power of two condition in constant time _**O(1)**_ using bitwise operations, avoiding the need for loops or recursion. The solution handles all edge cases, including zero and negative numbers, as well as the entire range of 32-bit integers.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
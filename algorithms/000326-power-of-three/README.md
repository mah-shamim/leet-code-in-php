326\. Power of Three

**Difficulty:** Easy

**Topics:** `Math`, `Recursion`

Given an integer `n`, return _`true` if it is a power of three. Otherwise, return `false`_.

An integer `n` is a power of three, if there exists an integer `x` such that <code>n == 3<sup>x</sup></code>.

**Example 1:**

- **Input:** n = 27
- **Output:** true
- **Explanation:** 27 = 3<sup>3<যsup>

**Example 2:**

- **Input:** n = 0
- **Output:** false
- **Explanation:** There is no x where 3<sup>x</sup> = 0.

**Example 3:**

- **Input:** n = -1
- **Output:** false
- **Explanation:** There is no x where 3<sup>x</sup> = (-1).

**Constraints:**

- <code>-2<sup>31</sup> <= n <= 2<sup>31</sup> - 1</code>


**Follow up:** Could you solve it without loops/recursion?


**Similar Questions:**
1. [231. Power of Two](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000231-power-of-two)
2. [342. Power of Four](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000324-power-of-four)
3. [1780. Check if Number is a Sum of Powers of Three](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001780-check-if-number-is-a-sum-of-powers-of-three)






**Solution:**

We need to determine if a given integer `n` is a power of three. An integer `n` is a power of three if there exists an integer `x` such that <code>n == 3<sup>x</sup></code>.

### Approach
The approach leverages mathematical properties of powers of three within the constraints of 32-bit signed integers. The key insight is that the largest power of three that fits within a 32-bit signed integer is _**3<sup>19</sup> = 1162261467**_. For any positive integer `n` to be a power of three, it must be a divisor of _**3<sup>19</sup>**_. This is because the divisors of _**3<sup>19</sup>**_ are exclusively _**3<sup>k</sup>**_ for _**k = 0**_ to _**19**_, which covers all possible powers of three within the 32-bit signed integer range.

1. **Check for Non-Positive Values**: If `n` is less than or equal to zero, it cannot be a power of three, so we immediately return `false`.
2. **Divisibility Check**: For positive `n`, we check if _**1162261467**_ (i.e., _**3<sup>19</sup>**_) is divisible by `n` without any remainder. If it is, then `n` is a power of three; otherwise, it is not.

This approach efficiently checks the power of three condition without using loops or recursion, leveraging mathematical properties for optimal performance.

Let's implement this solution in PHP: **[326. Power of Three](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000326-power-of-three/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Boolean
 */
function isPowerOfThree($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
var_dump(isPowerOfThree(27));   // true
var_dump(isPowerOfThree(0));    // false
var_dump(isPowerOfThree(-1));   // false
var_dump(isPowerOfThree(9));    // true
var_dump(isPowerOfThree(45));   // false
?>
```

### Explanation:

1. **Initial Check**: The function first checks if `n` is non-positive (i.e., `n <= 0`). Since powers of three are always positive, any non-positive `n` is immediately disqualified, returning `false`.
2. **Divisibility by Largest Power**: For positive `n`, the function checks if the largest 32-bit power of three (_**1162261467**_) is divisible by `n`. If `1162261467 % n == 0`, it confirms `n` is a power of three (specifically, _**3<sup>k</sup>**_ for some _**k**_ between 0 and 19), returning `true`. Otherwise, it returns `false`.

This method efficiently leverages mathematical properties to avoid loops or recursion, providing an optimal solution with constant time complexity _**O(1)**_.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
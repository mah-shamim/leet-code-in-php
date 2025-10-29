3370\. Smallest Number With All Set Bits

**Difficulty:** Easy

**Topics:** `Math`, `Bit Manipulation`, `Weekly Contest 426`

You are given a _positive_ number `n`.

Return the **smallest** number `x` **greater than** or **equal to** `n`, such that the binary representation of `x` contains only set bits[^1]


**Example 1:**

- **Input:** n = 5
- **Output:** 7
- **Explanation:** The binary representation of 7 is `"111"`.

**Example 2:**

- **Input:** n = 10
- **Output:** 15
- **Explanation:** The binary representation of 15 is `"1111"`.

**Example 3:**

- **Input:** n = 3
- **Output:** 3
- **Explanation:** The binary representation of 3 is `"11"`.

**Constraints:**

- `1 <= n <= 1000`


**Hint:**
1. Find the strictly greater power of 2, and subtract 1 from it.


**Similar Questions:**
1. [995. Minimum Number of K Consecutive Bit Flips](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000995-minimum-number-of-k-consecutive-bit-flips)
2. [2220. Minimum Bit Flips to Convert Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002220-minimum-bit-flips-to-convert-number)
3. [3539. Find Sum of Array Product of Magical Sequences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003539-find-sum-of-array-product-of-magical-sequences)



[^1]:**Set Bit**: A set bit refers to a bit in the binary representation of a number that has a value of `1`.


**Solution:**

We need to find the smallest number ≥ n that has all 1s in its binary representation.

The key insight is that numbers with all set bits are of the form `2^k - 1` (like 1, 3, 7, 15, 31, etc.). So I need to find the smallest number of this form that is ≥ n.

Here's my approach:
1. Find the number of bits needed to represent n
2. The candidate numbers are `(1 << k) - 1` where k is the bit length
3. If n itself is already all 1s, return n
4. Otherwise, return the next number with all 1s

Let's implement this solution in PHP: **[3370. Smallest Number With All Set Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003370-smallest-number-with-all-set-bits/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function smallestNumber($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo smallestNumber(5) . PHP_EOL;  // Output: 7
echo smallestNumber(10) . PHP_EOL; // Output: 15
echo smallestNumber(3) . PHP_EOL;  // Output: 3
?>
```

### Explanation:

1. **Check if n is already all 1s:** `(n & (n + 1)) == 0` is a bit trick to check if a number is of the form `2^k - 1`. For example:
   - n=3 (binary 11): 3 & 4 = 0 ✓
   - n=7 (binary 111): 7 & 8 = 0 ✓

2. **Find bit length:** We count how many bits are needed to represent n by repeatedly shifting right until the number becomes 0.

3. **Calculate result:** `(1 << bitLength) - 1` gives us the next number with all bits set. For example:
   - If n=5, bitLength=3, result = `(1 << 3) - 1 = 8 - 1 = 7`
   - If n=10, bitLength=4, result = `(1 << 4) - 1 = 16 - 1 = 15`

**Let's test with the examples:**
- n=5: bitLength=3, result=7 ✓
- n=10: bitLength=4, result=15 ✓
- n=3: Already all 1s, returns 3 ✓

The time complexity is O(log n) and space complexity is O(1).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
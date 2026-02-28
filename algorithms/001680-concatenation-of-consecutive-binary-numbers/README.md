1680\. Concatenation of Consecutive Binary Numbers

**Difficulty:** Hard

**Topics:** `Staff`, `Math`, `Bit Manipulation`, `Simulation`, `Weekly Contest 218`

Given an integer `n`, return _the **decimal value** of the binary string formed by concatenating the binary representations of `1` to `n` in order, **modulo** `10⁹ + 7`_.

**Example 1:**

- **Input:** n = 1
- **Output:** 1
- **Explanation:** "1" in binary corresponds to the decimal value 1.

**Example 2:**

- **Input:** n = 3
- **Output:** 27
- **Explanation:** In binary, 1, 2, and 3 corresponds to "1", "10", and "11".
  After concatenating them, we have "11011", which corresponds to the decimal value 27.

**Example 3:**

- **Input:** n = 12
- **Output:** 505379714
- **Explanation:** The concatenation results in "1101110010111011110001001101010111100".
  The decimal value of that is 118505380540.
  After modulo 109 + 7, the result is 505379714.

**Constraints:**

- `1 <= n <= 10⁵`


**Hint:**
1. Express the nth number value in a recursion formula and think about how we can do a fast evaluation.


**Similar Questions:**
1. [3309. Maximum Possible Number by Binary Concatenation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003309-maximum-possible-number-by-binary-concatenation)






**Solution:**

We need to compute the decimal value of concatenating binary representations of numbers from 1 to n, modulo 10⁹+7.

### Approach:

- **Initialize** `result = 0`, `len = 1` (bit length for the next number), and `nextPower = 2` (the first power of two where bit length increases).
- **Iterate** `i` from `1` to `n`:
   - If `i` equals `nextPower`, increment `len` by 1 and double `nextPower` (prepare for the next power of two).
   - Compute `shift = (1 << len) % MOD`. This corresponds to 2ˡᵉⁿ modulo 10⁹+7.
   - Update `result = ((result * shift) % MOD + i) % MOD`. This effectively appends the binary representation of `i` to the current concatenated value.
- **Return** `result` after the loop.

Let's implement this solution in PHP: **[1680. Concatenation of Consecutive Binary Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001680-concatenation-of-consecutive-binary-numbers/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function concatenatedBinary(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo concatenatedBinary(1) . "\n";                  // Output: 1
echo concatenatedBinary(3) . "\n";                  // Output: 27
echo concatenatedBinary(12) . "\n";                 // Output: 505379714
?>
```

### Explanation:

- **Why A bit of length matters:** When appending a new binary number, the existing concatenated value must be shifted left by the number of bits of the new number. For example, after building "11011" (for n=3), appending 4 ("100") would shift "11011" left by 3 bits, producing "11011000", then add 4 → "11011100".
- **Modulo arithmetic:** Since the result can grow astronomically, we keep every operation modulo 10⁹+7.
- **Tracking A bit of length efficiently:** The bit length increases only when `i` reaches a power of two. The variable `nextPower` starts at 2 and doubles each time, triggering `len++` exactly when needed.
- **Shift factor:** `shift = (1 << len) % MOD` is the multiplier used to shift the existing result. However, note that `1 << len` can become very large; using modulo ensures it stays within bounds.
- **Recurrence relation:** The solution directly implements `result = (result * 2ˡᵉⁿ⁽ᶦ⁾ + i) mod MOD`, which is derived from the problem's nature.

### Complexity
- **Time Complexity**: _**O(n)**_, a single pass from 1 to n.
- **Space Complexity**: _**O(1)**_, only a few integer variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
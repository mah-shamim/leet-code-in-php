1009\. Complement of Base 10 Integer

**Difficulty:** Easy

**Topics:** `Junior`, `Bit Manipulation`, `Weekly Contest 128`

The **complement** of an integer is the integer you get when you flip all the `0`'s to `1`'s and all the `1`'s to `0`'s in its binary representation.

- For example, The integer `5` is `"101"` in binary and its **complement** is `"010"` which is the integer `2`.

Given an integer `n`, return _its complement_.

**Example 1:**

- **Input:** n = 5
- **Output:** 2
- **Explanation:** 5 is "101" in binary, with complement "010" in binary, which is 2 in base-10.

**Example 2:**

- **Input:** n = 7
- **Output:** 0
- **Explanation:** 7 is "111" in binary, with complement "000" in binary, which is 0 in base-10.

**Example 3:**

- **Input:** n = 10
- **Output:** 5
- **Explanation:** 10 is "1010" in binary, with complement "0101" in binary, which is 5 in base-10.

**Example 4:**

- **Input:** n = 0
- **Output:** 1

**Constraints:**

- `0 <= n < 10⁹`

**Note:** This question is the same as [476. Number Complement](https://leetcode.com/problems/number-complement/)

**Hint:**
1. A binary number plus its complement will equal 111....111 in binary. Also, N = 0 is a corner case.






**Solution:**

The problem asks for the complement of a given non-negative integer `n` when represented in binary, where the complement is obtained by flipping all bits (0 → 1, 1 → 0). The provided solution uses a bit manipulation technique: it computes the number of bits needed to represent `n`, creates a mask of the same length with all bits set to 1, and then XORs `n` with that mask. A special case handles `n = 0` (binary `"0"`) whose complement should be `1`.

### Approach:

- **Special case** – If `n == 0`, return `1` directly because its binary representation has only one bit and flipping it yields `1`.
- **Determine bit length** – Compute the smallest number of bits required to represent `n` in binary (excluding leading zeros). This is obtained by taking the base‑2 logarithm of `n` and adding 1.
- **Create a bit mask** – Generate a number whose binary representation consists of `bitLength` consecutive `1`s. This is done by left‑shifting `1` by `bitLength` positions and subtracting 1.
- **Flip bits with XOR** – Perform a bitwise XOR between `n` and the mask. XOR flips every bit where the mask has a `1`, i.e., exactly the bits of `n`.
- **Return result** – The XOR result is the complement of `n`.

Let's implement this solution in PHP: **[1009. Complement of Base 10 Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001009-complement-of-base-10-integer/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function bitwiseComplement(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo bitwiseComplement(5) . "\n";           // Output: 2
echo bitwiseComplement(7) . "\n";           // Output: 0
echo bitwiseComplement(10) . "\n";          // Output: 5
echo bitwiseComplement(0) . "\n";           // Output: 1
?>
```

### Explanation:

- The core idea is that for any number `n`, the sum `n + complement(n)` equals a number consisting entirely of `1`s of the same bit length. Therefore `complement(n) = (2^bitLength - 1) - n`. The provided solution achieves this with a mask `(1 << bitLength) - 1` and XOR: `n ^ mask`.
- For `n = 5` (`101` in binary), its bit length is 3. The mask is `111` (`7` in decimal). XOR: `101 ^ 111 = 010` which is `2`.
- The special case `n = 0` is handled separately because `log(0)` is undefined. The binary `"0"` has one bit; flipping it gives `"1"` = 1.
- The mask `(1 << bitLength) - 1` works for all `n ≥ 1`: shifting `1` left by `bitLength` yields a number with a single `1` followed by `bitLength` zeros; subtracting 1 turns all lower bits to `1`s.
- Using XOR instead of subtraction is efficient and directly reflects the “flip all bits” operation.

### Complexity
- **Time Complexity**: _**O(1)**_, because the operations (log, shift, XOR) are all constant‑time on fixed‑width integers.
- **Space Complexity**: _**O(1)**_, using only a few integer variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
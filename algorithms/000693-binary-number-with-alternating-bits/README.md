693\. Binary Number with Alternating Bits

**Difficulty:** Easy

**Topics:** `Mid Level`, `Bit Manipulation`

Given a positive integer, check whether it has alternating bits: namely, if two adjacent bits will always have different values.

**Example 1:**

- **Input:** n = 5
- **Output:** true
- **Explanation:** The binary representation of 5 is: 101

**Example 2:**

- **Input:** n = 7
- **Output:** false
- **Explanation:** The binary representation of 7 is: 111.

**Example 3:**

- **Input:** n = 11
- **Output:** false
- **Explanation:** The binary representation of 11 is: 1011.

**Constraints:**

- `1 <= n <= 2³¹ - 1`


**Similar Questions:**
1. [191. Number of 1 Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000191-number-of-1-bits)






**Solution:**

We need to solve "Binary Number with Alternating Bits". Given positive integer `n`, check if its binary representation has alternating bits (adjacent bits differ). Constraints up to 2³¹-1.

### Approach:

- The solution leverages bitwise XOR to detect differences between adjacent bits.
- Compute `$x = $n ^ ($n >> 1)`.
   - `$n >> 1` shifts the bits one position to the right, aligning each original bit with its right neighbor.
   - XOR yields `1` where the two bits differ and `0` where they are the same.
- For a number with alternating bits, every adjacent pair differs, so the XOR result will consist entirely of `1` bits from the most significant bit down to the least significant bit (e.g., `111...111`).
- To verify that `$x` is all ones, we use the property: a number `x` of the form `2ᵏ - 1` (all ones) satisfies `x & (x + 1) == 0`, because adding `1` turns it into a power of two (`100...0`), which has no overlapping set bits with `x`.
- Therefore, the function returns `($x & ($x + 1)) == 0`.

Let's implement this solution in PHP: **[693. Binary Number with Alternating Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000693-binary-number-with-alternating-bits/solution.php)**

```php
<?php
/**
 * Check if the binary representation of a positive integer has alternating bits.
 *
 * @param Integer $n
 * @return Boolean
 */
function hasAlternatingBits(int $n): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo hasAlternatingBits(5) . "\n";          // Output: true
echo hasAlternatingBits(7) . "\n";          // Output: false
echo hasAlternatingBits(11) . "\n";         // Output: false
?>
```

### Explanation:

- **Step 1 – Create difference mask**  
  `$x = $n ^ ($n >> 1)`  
  Example: `n = 5` (binary `101`), `n >> 1 = 2` (`010`), `$x = 101⁰¹⁰ = 111` (all bits set).  
  Example: `n = 7` (`111`), `n >> 1 = 3` (`011`), `$x = 111⁰¹¹ = 100` (not all bits set).

- **Step 2 – Check for all‑ones pattern**  
  The condition `($x & ($x + 1)) == 0` is `true` only when `$x` is a sequence of consecutive `1` bits (e.g., `111`, `1`, `11`).
   - If `$x` is all ones, adding `1` yields a power of two, and the bitwise AND is zero.
   - If `$x` is not all ones, at least one zero exists; adding `1` will cause carries that create overlapping `1` bits, making the AND non‑zero.

- **Why it works**
   - For alternating bits, every adjacent pair differs → `$x` has `1` in every bit position that matters → `$x` is of the form `111...111`.
   - The property `x & (x + 1) == 0` exactly identifies such numbers.

- **Edge cases**
   - `n = 1` (binary `1`): `$x = 1⁰ = 1` (all ones) → `1 & (1+1) = 1 & 2 = 0` → `true`.
   - `n = 2` (`10`): `$x = 10⁰¹ = 11` (all ones) → `true`.
   - `n = 3` (`11`): `$x = 11⁰¹ = 10` (not all ones) → `false`.

### Complexity
- **Time Complexity**: _**O(1)**_ – constant number of bitwise operations.
- **Space Complexity**: _**O(1)**_ – only a few integer variables.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
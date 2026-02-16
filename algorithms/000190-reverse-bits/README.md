190\. Reverse Bits

**Difficulty:** Easy

**Topics:** `Divide and Conquer`, `Bit Manipulation`

Reverse bits of a given 32 bits signed integer.

**Example 1:**

- **Input:** n = 43261596
- **Output:** 964176192
- **Explanation:** 

| Integer   | Binary                           |
|-----------|----------------------------------|
| 43261596  | 00000010100101000001111010011100 |
| 964176192 | 00111001011110000010100101000000 |

**Example 2:**

- **Input:** n = 2147483644
- **Output:** 1073741822
- **Explanation:**

| Integer    | Binary                           |
|------------|----------------------------------|
| 2147483644 | 01111111111111111111111111111100 |
| 1073741822 | 00111111111111111111111111111110 |


**Constraints:**

- `0 <= n <= 2³¹ - 2`
- `n` is even.

**Follow up:** If this function is called many times, how would you optimize it?



**Similar Questions:**
1. [7. Reverse Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000007-reverse-integer)
2. [191. Number of 1 Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000191-number-of-1-bits)
3. [2119. A Number After a Double Reversal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002119-a-number-after-a-double-reversal)






**Solution:**

We need to reverse the bits of a 32-bit signed integer. The input `n` is guaranteed to be non‑negative and even, but the algorithm works for any 32‑bit value. The binary representation is considered as exactly 32 bits, including leading zeros. The result is the integer formed by those reversed bits.

### Approach:

- Iterate through all 32 bits of the input integer `n`.
- In each step, left shift the `result` by 1 to make room for the next bit.
- Extract the least significant bit of `n` using `$n & 1` and add it to `result` using bitwise OR.
- Right shift `n` by 1 to discard the bit that has been processed.
- After 32 iterations, `result` holds the reversed bits.

Let's implement this solution in PHP: **[190. Reverse Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000190-reverse-bits/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function reverseBits(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo reverseBits(43261596) . "\n";          // Output: 964176192
echo reverseBits(2147483644) . "\n";        // Output: 1073741822
?>
```

### Explanation:

- The problem asks to reverse the bits of a 32-bit signed integer. The given constraints ensure `n` is non‑negative and even, but the algorithm works for any 32‑bit value.
- We start with `result = 0`. For each of the 32 bits:
   - Shifting `result` left moves its existing bits one position higher, preparing a zero in the least significant position.
   - Taking `$n & 1` isolates the current lowest bit of `n` (which is the next bit to be placed at the high end of the reversed number).
      - Example: if `n` is `...101` (binary), `$n & 1` gives `1` if the last bit is 1, else `0`.
   - OR-ing this bit into `result` sets the newly vacated LSB of `result` to that bit.
   - Right shifting `n` moves the next bit into the LSB position for the next iteration.
- After 32 iterations, all original bits have been moved into `result` in reverse order.
- The final `result` is returned as an integer.

**Follow‑up optimization:**  
If the function is called many times, you can precompute the reversed bits for all possible 8‑bit or 16‑bit segments and use a lookup table. For example, split the 32‑bit number into four bytes, reverse each byte using a pre‑computed array, then combine them in reverse order. This trades memory for speed, reducing the operation count from 32 iterations to a few array lookups and bitwise operations.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
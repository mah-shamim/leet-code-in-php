1611\. Minimum One Bit Operations to Make Integers Zero

**Difficulty:** Hard

**Topics:** `Dynamic Programming`, `Bit Manipulation`, `Memoization`, `Weekly Contest 209`

Given an integer `n`, you must transform it into `0` using the following operations any number of times:

- Change the rightmost (`0ᵗʰ`) bit in the binary representation of `n`.
- Change the `iᵗʰ` bit in the binary representation of `n` if the `(i-1)ᵗʰ` bit is set to `1` and the `(i-2)ᵗʰ` through 0th bits are set to `0`.

Return _the minimum number of operations to transform `n` into `0`_.

**Example 1:**

- **Input:** n = 3
- **Output:** 2
- **Explanation:** The binary representation of 3 is "11".
  "<ins>1</ins>1" -> "<ins>0</ins>1" with the 2ⁿᵈ operation since the 0ᵗʰ bit is 1.
  "0<ins>1</ins>" -> "0<ins>0</ins>" with the 1ˢᵗ operation.

**Example 2:**

- **Input:** n = 6
- **Output:** 4
- **Explanation:** The binary representation of 6 is "110".
  "<ins>1</ins>10" -> "<ins>0</ins>10" with the 2ⁿᵈ operation since the 1ˢᵗ bit is 1 and 0ᵗʰ through 0ᵗʰ bits are 0.
  "01<ins>0</ins>" -> "01<ins>1</ins>" with the 1ˢᵗ operation.
  "0<ins>1</ins>1" -> "0<ins>0</ins>1" with the 2ⁿᵈ operation since the 0ᵗʰ bit is 1.
  "00<ins>1</ins>" -> "00<ins>0</ins>" with the 1ˢᵗ operation.

**Constraints:**

- `0 <= n <= 10⁹`


**Hint:**
1. The fastest way to convert n to zero is to remove all set bits starting from the leftmost one. Try some simple examples to learn the rule of how many steps are needed to remove one set bit.
2. consider n=2ᵏ case first, then solve for all n.



**Similar Questions:**
1. [2009. Minimum Number of Operations to Make Array Continuous](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002009-minimum-number-of-operations-to-make-array-continuous)
2. [2546. Apply Bitwise Operations to Make Strings Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002546-apply-bitwise-operations-to-make-strings-equal)






**Solution:**

We need to determine the minimum number of operations required to transform a given integer `n` into `0` using specific bit manipulation operations. The operations allowed are changing the rightmost bit (0ᵗʰ bit) or changing the ith bit (for i ≥ 1) under the condition that the (i-1)ᵗʰ bit is set to 1 and all bits from (i-2) down to 0 are set to 0.

### Approach:

1. **Problem Analysis**: The problem involves transforming an integer to zero by flipping bits according to specific rules. The key insight is recognizing that the minimum number of operations required to reduce `n` to `0` is equivalent to computing the inverse Gray code of `n`. The Gray code is a binary numeral system where two successive values differ in only one bit. The inverse Gray code transformation converts a Gray code back to its original binary representation, which aligns perfectly with the operations allowed in this problem.

2. **Key Insight**: The minimum operations needed to convert `n` to `0` can be derived by continuously XORing `n` with itself right-shifted until `n` becomes zero. This process effectively computes the inverse Gray code of `n`.

3. **Algorithm Selection**: We use a loop to iteratively compute the XOR of `n` with its right-shifted value until `n` reduces to zero. The accumulated XOR result gives the minimum operations required.

Let's implement this solution in PHP: **[1611. Minimum One Bit Operations to Make Integers Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001611-minimum-one-bit-operations-to-make-integers-zero/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function minimumOneBitOperations($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumOneBitOperations(3) . PHP_EOL; // expected 2
echo minimumOneBitOperations(6) . PHP_EOL; // expected 4
echo minimumOneBitOperations(0) . PHP_EOL; // 0
echo minimumOneBitOperations(2) . PHP_EOL; // 3
echo minimumOneBitOperations(4) . PHP_EOL; // 7
?>
```

### Explanation:

1. **Initialization**: Start with `$result` initialized to `0`.
2. **Loop Until `n` is Zero**: In each iteration, XOR the current value of `n` with `$result`.
3. **Right Shift `n`**: Right shift `n` by one bit to process the next bit in the subsequent iteration.
4. **Result**: The accumulated `$result` after the loop ends is the minimum number of operations required to transform `n` to `0`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
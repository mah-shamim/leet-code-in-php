67\. Add Binary

**Difficulty:** Easy

**Topics:** `Math`, `String`, `Bit Manipulation`, `Simulation`

Given two binary strings `a` and `b`, return _their sum as a binary string_.

**Example 1:**

- **Input:** a = "11", b = "1"
- **Output:** "100"

**Example 2:**

- **Input:** a = "1010", b = "1011"
- **Output:** "10101"

**Constraints:**

- `1 <= a.length, b.length <= 10⁴`
- `a` and `b` consist only of `'0'` or `'1'` characters.
- Each string does not contain leading zeros except for the zero itself.



**Similar Questions:**
1. [2. Add Two Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000002-add-two-numbers)
2. [43. Multiply Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000043-multiply-strings)
3. [66. Plus One](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000066-plus-one)
4. [989. Add to Array-Form of Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000989-add-to-array-form-of-integer)






**Solution:**

We need to add two binary strings without converting them to integers (since they can be very long). The approach is similar to adding decimal numbers manually, but with base‑2.

### Approach:

- **Two‑pointer from the end**: Start from the least significant bit (rightmost) of both strings, moving leftwards.
- **Simulate binary addition**: At each step, add the two corresponding bits plus any carry from the previous step. The resulting bit is `sum % 2`, and the new carry is `intdiv($sum, 2)` (floor division).
- **Handle remaining digits and final carry**: Continue the loop until both strings are exhausted and the carry becomes zero.
- **Build result string**: Prepend each new bit to the result string to avoid reversing at the end.

Let's implement this solution in PHP: **[67. Add Binary](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000067-add-binary/solution.php)**

```php
<?php
/**
 * @param String $a
 * @param String $b
 * @return String
 */
function addBinary(string $a, string $b): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo addBinary("11", "1") . "\n";               // "100"
echo addBinary("1010", "1011") . "\n";          // "10101"
?>
```

### Explanation:

- **Why not convert to integer?** Binary strings can be up to 10⁴ characters long, which would overflow standard integer types.
- **Adding step by step**: By iterating from the end, we mimic how binary addition is performed manually. The `$carry` variable holds the overflow to the next higher bit.
- **Handling different lengths**: The loop continues as long as at least one string still has digits or there is a carry. Missing digits are treated as `0`.
- **Building the result**: Appending to the front (`$result = $bit . $result`) ensures the most significant bit ends up on the left without an extra reverse operation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
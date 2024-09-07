476\. Number Complement

**Difficulty:** Easy

**Topics:** `Bit Manipulation`

The complement of an integer is the integer you get when you flip all the `0`'s to `1`'s and all the `1`'s to `0`'s in its binary representation.

- For example, The integer `5` is `"101"` in binary and its complement is `"010"` which is the integer `2`.

Given an integer `num`, return _its complement_.

**Example 1:**

- **Input:** num = 5
- **Output:** 2
- **Explanation:** The binary representation of 5 is 101 (no leading zero bits), and its complement is 010. So you need to output 2.

**Example 2:**

- **Input:** num = 1
- **Output:** 0
- **Explanation:** The binary representation of 1 is 1 (no leading zero bits), and its complement is 0. So you need to output 0.

**Constraints:**

- <code>1 <= num < 2<sup>31</sup></code>

**Note:** This question is the same as [1009. Complement of Base 10 Integer](https://leetcode.com/problems/complement-of-base-10-integer/)


**Solution:**

We need to flip the bits of the binary representation of a given integer and return the resulting integer.

### Steps to solve the problem:

1. **Convert the number to its binary representation.**
2. **Flip the bits** (i.e., change `0` to `1` and `1` to `0`).
3. **Convert the flipped binary string back to an integer**.

Let's implement this solution in PHP: **[476. Number Complement](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000476-number-complement/solution.php)**

```php
<?php
// Example usage:
$num = 5;
echo findComplement($num); // Output: 2

$num = 1;
echo findComplement($num); // Output: 0
?>
```

### Explanation:

- **`decbin($num)`**: Converts the given integer to its binary string representation.
- **Flipping the bits**: We iterate through the binary string and flip each bit by checking if it's a `1` or a `0`.
- **`bindec($flipped)`**: Converts the flipped binary string back to an integer.

### Example Runs:

1. **Input:** `5`
   - Binary representation: `"101"`
   - Flipped binary: `"010"`
   - Output: `2`

2. **Input:** `1`
   - Binary representation: `"1"`
   - Flipped binary: `"0"`
   - Output: `0`

This solution efficiently calculates the complement by flipping the bits of the binary representation of the given number.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


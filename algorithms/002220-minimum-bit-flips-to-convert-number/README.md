2220\. Minimum Bit Flips to Convert Number

**Difficulty:** Easy

**Topics:** `Bit Manipulation`

A **bit flip** of a number `x` is choosing a bit in the binary representation of `x` and **flipping** it from either `0` to `1` or `1` to `0`.

- For example, for` x = 7`, the binary representation is `111` and we may choose any bit (including any leading zeros not shown) and flip it. We can flip the first bit from the right to get `110`, flip the second bit from the right to get `101`, flip the fifth bit from the right (a leading zero) to get `10111`, etc.

Given two integers `start` and `goal`, return _the **minimum** number of **bit flips** to convert `start` to `goal`_.

**Example 1:**

- **Input:** start = 10, goal = 7
- **Output:** 3
- **Explanation:** The binary representation of 10 and 7 are 1010 and 0111 respectively. We can convert 10 to 7 in 3 steps:
  - Flip the first bit from the right: 1010 -> 1011.
  - Flip the third bit from the right: 1011 -> 1111.
  - Flip the fourth bit from the right: 1111 -> 0111.\
    It can be shown we cannot convert 10 to 7 in less than 3 steps. Hence, we return 3.

**Example 2:**

- **Input:** start = 3, goal = 4
- **Output:** 3
- **Explanation:** The binary representation of 3 and 4 are 011 and 100 respectively. We can convert 3 to 4 in 3 steps:
  - Flip the first bit from the right: 011 -> 010.
  - Flip the second bit from the right: 010 -> 000.
  - Flip the third bit from the right: 000 -> 100.\
    It can be shown we cannot convert 3 to 4 in less than 3 steps. Hence, we return 3.


**Constraints:**

- <code>0 <= start, goal <= 10<sup>9</sup></code>

**Hint:**
1. If the value of a bit in start and goal differ, then we need to flip that bit.
2. Consider using the XOR operation to determine which bits need a bit flip.



**Solution:**

We need to determine how many bit positions differ between `start` and `goal`. This can be easily achieved using the XOR operation (`^`), which returns a 1 for each bit position where the two numbers differ.

### Steps:
1. Perform the XOR operation between `start` and `goal`. The result will be a number that has `1`s in all the positions where `start` and `goal` differ.
2. Count how many `1`s are present in the binary representation of the result (i.e., the Hamming distance).
3. The number of `1`s will give us the minimum number of bit flips needed.

Let's implement this solution in PHP: **[2220. Minimum Bit Flips to Convert Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002220-minimum-bit-flips-to-convert-number/solution.php)**

```php
<?php
/**
 * @param Integer $start
 * @param Integer $goal
 * @return Integer
 */
function minBitFlips($start, $goal) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minBitFlips(10, 7);  // Output: 3
echo "\n";
echo minBitFlips(3, 4);   // Output: 3
?>
```

### Explanation:

1. The `^` (XOR) operation compares each bit of `start` and `goal`. If the bits are different, the corresponding bit in the result will be `1`.
2. We then count the number of `1`s in the result, which gives the number of differing bits, i.e., the number of bit flips required.
3. The `& 1` operation checks if the last bit is `1`, and `>>= 1` shifts the number right to process the next bit.

### Time Complexity:
- The time complexity is \(O(\log N)\), where \(N\) is the larger of `start` or `goal`, because we're checking each bit of the number. In the worst case, we will loop through all bits of a 32-bit integer (since PHP 5.6 works with 32-bit or 64-bit integers depending on the system).

### Output:
- For `start = 10` and `goal = 7`, the output is `3`.
- For `start = 3` and `goal = 4`, the output is `3`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

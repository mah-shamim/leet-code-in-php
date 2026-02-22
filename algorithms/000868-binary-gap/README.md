868\. Binary Gap

**Difficulty:** Easy

**Topics:** `Mid Level`, `Bit Manipulation`, `Weekly Contest 93`

Given a positive integer `n`, find and return _the **longest distance** between any two **adjacent** `1`'s in the binary representation of `n`. If there are no two adjacent `1`'s, return `0`_.

Two `1`'s are **adjacent** if there are only `0`'s separating them (possibly no `0`'s). The **distance** between two `1`'s is the absolute difference between their bit positions. For example, the two `1`'s in `"1001"` have a distance of `3`.

**Example 1:**

- **Input:** n = 22
- **Output:** 2
- **Explanation:** 22 in binary is "10110".
  The first adjacent pair of 1's is "10110" with a distance of 2.
  The second adjacent pair of 1's is "10110" with a distance of 1.
  The answer is the largest of these two distances, which is 2.
  Note that "10110" is not a valid pair since there is a 1 separating the two 1's underlined.

**Example 2:**

- **Input:** n = 8
- **Output:** 0
- **Explanation:** 8 in binary is "1000".
  There are not any adjacent pairs of 1's in the binary representation of 8, so we return 0.

**Example 3:**

- **Input:** n = 5
- **Output:** 2
- **Explanation:** 5 in binary is "101".

**Constraints:**

- `1 <= n <= 10⁹`






**Solution:**

We need to solve the "Binary Gap" problem. Given a positive integer n, find the longest distance between two consecutive 1's in its binary representation. The distance is the number of bit positions between them (i.e., difference of indices). If there are less than two 1's, return 0.

### Approach:

- Convert the integer `n` to its binary string representation using `decbin()`.
- Initialize a variable `$maxGap` to store the maximum distance found, and `$previousIndex` to track the index of the last seen `1`.
- Traverse the binary string from the most significant bit (left) to the least significant bit (right):
   - When a `'1'` is encountered:
      - If it is not the first `'1'`, compute the distance between the current index and the previous index (`$i - $previousIndex`).
      - Update `$maxGap` if this distance is larger.
      - Update `$previousIndex` to the current index.
- After the loop, return `$maxGap` (which remains `0` if no adjacent pair of `1`s was found).

Let's implement this solution in PHP: **[868. Binary Gap](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000868-binary-gap/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function binaryGap(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo binaryGap(22) . "\n";           // Output: 2
echo binaryGap(8) . "\n";            // Output: 0
echo binaryGap(5) . "\n";            // Output: 2
?>
```

### Explanation:

- The binary string is examined sequentially, so each `1` is considered in order.
- The distance between two adjacent `1`s is simply the difference in their positions (indices), which corresponds to the number of bit positions between them (inclusive of the leading `1` but exclusive of the trailing `1` when counting zeros between them). The formula `i - previousIndex` directly gives the gap length as defined.
- By always tracking the last seen `1`, we only compare consecutive `1`s, ensuring that we only measure gaps between adjacent ones (no `1` in between).
- The algorithm only needs a single pass through the binary string, making it efficient.

### Complexity
- **Time Complexity:** O(k) where k is the number of bits in the binary representation of `n` (at most 30 for n ≤ 10⁹, because 2³⁰ ≈ 1.07×10⁹). In practice, the loop runs for the length of the binary string.
- **Space Complexity:** O(k) for storing the binary string; alternatively, the problem could be solved with bit manipulation without converting to a string, which would use O(1) extra space. However, the given solution uses O(k) space for the string representation.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
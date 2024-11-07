2275\. Largest Combination With Bitwise AND Greater Than Zero

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Bit Manipulation`, `Counting`

The **bitwise AND** of an array `nums` is the bitwise AND of all integers in `nums`.

- For example, for `nums = [1, 5, 3]`, the bitwise AND is equal to `1 & 5 & 3 = 1`.
- Also, for `nums = [7]`, the bitwise AND is `7`.

You are given an array of positive integers `candidates`. Evaluate the **bitwise AND** of every **combination** of numbers of `candidates`. Each number in `candidates` may only be used **once** in each combination.

Return _the size of the **largest** combination of candidates with a bitwise AND **greater** than `0`_.

**Example 1:**

- **Input:** candidates = [16,17,71,62,12,24,14]
- **Output:** 4
- **Explanation:** The combination [16,17,62,24] has a bitwise AND of 16 & 17 & 62 & 24 = 16 > 0.
  The size of the combination is 4.
  It can be shown that no combination with a size greater than 4 has a bitwise AND greater than 0.
  Note that more than one combination may have the largest size.
  For example, the combination [62,12,24,14] has a bitwise AND of 62 & 12 & 24 & 14 = 8 > 0.

**Example 2:**

- **Input:** candidates = [8,8]
- **Output:** 2
- **Explanation:** The largest combination [8,8] has a bitwise AND of 8 & 8 = 8 > 0.
  The size of the combination is 2, so we return 2.

**Constraints:**

- <code>1 <= candidates.length <= 10<sup>5</sup></code>
- <code>1 <= candidates[i] <= 10<sup>7</sup></code>


**Hint:**
1. For the bitwise AND to be greater than zero, at least one bit should be 1 for every number in the combination.
2. The candidates are 24 bits long, so for every bit position, we can calculate the size of the largest combination such that the bitwise AND will have a 1 at that bit position.



**Solution:**

We need to focus on identifying groups of numbers where at least one bit position in their binary representation remains set (1) across all numbers in the combination.

### Solution Outline

1. **Bit Analysis**: Since each number in `candidates` can be represented by a binary number with up to 24 bits (as `1 <= candidates[i] <= 10^7`), we only need to examine each bit position from 0 to 23.

2. **Count Set Bits at Each Position**: For each bit position, count how many numbers in `candidates` have that bit set to 1. If multiple numbers share a bit in the same position, they could potentially form a combination with a bitwise AND greater than zero at that bit position.

3. **Find the Largest Count**: The largest number of numbers with a set bit at any given position will be the answer, as it represents the largest possible combination where the bitwise AND result is greater than zero.

### Example

Consider `candidates = [16, 17, 71, 62, 12, 24, 14]`:

- Convert each number to binary and analyze bit positions.
- Count how many times each bit is set across all numbers.
- Find the maximum count across all bit positions.

Let's implement this solution in PHP: **[2275. Largest Combination With Bitwise AND Greater Than Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002275-largest-combination-with-bitwise-and-greater-than-zero/solution.php)**

```php
<?php
/**
 * @param Integer[] $candidates
 * @return Integer
 */
function largestCombination($candidates) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$candidates = [16, 17, 71, 62, 12, 24, 14];
echo largestCombination($candidates); // Output: 4
?>
```

### Explanation:

1. **Loop Through Each Bit Position**: We iterate over each bit position from 0 to 23.
2. **Count Numbers with Bit Set**: For each position, count how many numbers in `candidates` have that specific bit set.
3. **Update Maximum Combination Size**: Track the highest count across all bit positions.
4. **Return the Result**: The result is the largest combination size with a bitwise AND greater than zero, as required.

### Complexity Analysis

- **Time Complexity**: _**O(n x 24) = O(n)**_, where _**n**_ is the number of elements in `candidates`, because we perform 24 operations (one for each bit position) for each number.
- **Space Complexity**: _**O(1)**_, since we are only using a fixed amount of extra space.

This approach is efficient enough to handle the input size limit (<code>candidates.length <= 10<sup>5</sup></code>).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

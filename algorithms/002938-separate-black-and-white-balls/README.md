2938\. Separate Black and White Balls

**Difficulty:** Medium

**Topics:** `Two Pointers`, `String`, `Greedy`

There are `n` balls on a table, each ball has a color black or white.

You are given a **0-indexed** binary string `s` of length `n`, where `1` and `0` represent black and white balls, respectively.

In each step, you can choose two adjacent balls and swap them.

Return _the **minimum** number of steps to group all the black balls to the right and all the white balls to the left_.

**Example 1:**

- **Input:** s = "101"
- **Output:** 1
- **Explanation:** We can group all the black balls to the right in the following way:
  - Swap s[0] and s[1], s = "011".\
    Initially, 1s are not grouped together, requiring at least 1 step to group them to the right.

**Example 2:**

- **Input:** s = "100"
- **Output:** 2
- **Explanation:** We can group all the black balls to the right in the following way:
  - Swap s[0] and s[1], s = "010".
  - Swap s[1] and s[2], s = "001".\
    It can be proven that the minimum number of steps needed is 2.


**Example 3:**

- **Input:** s = "0111"
- **Output:** 0
- **Explanation:** All the black balls are already grouped to the right.

**Constraints:**

- <code>1 <= n == s.length <= 10<sup>5</sup></code>
- `s[i]` is either `'0'` or `'1'`.


**Hint:**
1. Every `1` in the string `s` should be swapped with every `0` on its right side.
2. Iterate right to left and count the number of `0` that have already occurred, whenever you iterate on `1` add that counter to the answer.



**Solution:**

To solve this problem efficiently, we can use a greedy approach with a two-pointer-like strategy. The key insight is that every `1` (black ball) should be moved past the `0`s (white balls) that are to its right, minimizing the total number of swaps.

### Approach
1. **Track the Number of `0`s Encountered**:
   - Iterate through the string from right to left.
   - Count the number of `0`s encountered so far as you iterate.
   - When you encounter a `1`, each `0` that is to its right contributes to a swap needed to move this `1` past those `0`s.
   - Add the count of `0`s to the total swaps each time you encounter a `1`.

2. **Calculate the Total Swaps**:
   - The total number of swaps required will be the sum of the number of `0`s encountered when processing each `1`.

Let's implement this solution in PHP: **[2938. Separate Black and White Balls](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002938-separate-black-and-white-balls/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minSwapsToGroupBlackBalls($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$s1 = "101";
echo "Input: $s1\n";
echo "Minimum swaps needed: " . minSwapsToGroupBlackBalls($s1) . "\n"; // Output: 1

$s2 = "100";
echo "Input: $s2\n";
echo "Minimum swaps needed: " . minSwapsToGroupBlackBalls($s2) . "\n"; // Output: 2

$s3 = "0111";
echo "Input: $s3\n";
echo "Minimum swaps needed: " . minSwapsToGroupBlackBalls($s3) . "\n"; // Output: 0
?>
```

### Explanation:
1. **Initialize Counters**:
   - `zeroCount` is initialized to `0` and tracks the number of `0`s encountered while iterating from right to left.
   - `swaps` keeps track of the minimum swaps needed to group the `1`s (black balls) together.

2. **Iterate Through the String**:
   - Loop through the string from right to left using a for-loop.
   - If the current character is `0`, increment `zeroCount` as it represents a white ball that will need to be swapped with a `1` to its left.
   - If the current character is `1`, add `zeroCount` to `swaps` because each `0` encountered after this `1` contributes to a swap.

3. **Return the Total Swaps**:
   - The accumulated value of `swaps` represents the minimum number of swaps required to arrange all `1`s to the right.

### Time Complexity
- **Time Complexity**: `O(n)` where `n` is the length of the string `s`. We iterate through the string once and perform constant-time operations for each character.
- **Space Complexity**: `O(1)` as we only use a few variables (`zeroCount` and `swaps`).

### Example Analysis
- **Example 1**: Input: `"101"`
   - Iteration from right to left:
      - `s[2] = '1'`: zeroCount = 0, swaps = 0
      - `s[1] = '0'`: zeroCount = 1, swaps = 0
      - `s[0] = '1'`: zeroCount = 1, add `1` to swaps, swaps = 1
   - Output: `1`.

- **Example 2**: Input: `"100"`
   - Iteration from right to left:
      - `s[2] = '0'`: zeroCount = 1, swaps = 0
      - `s[1] = '0'`: zeroCount = 2, swaps = 0
      - `s[0] = '1'`: zeroCount = 2, add `2` to swaps, swaps = 2
   - Output: `2`.

- **Example 3**: Input: `"0111"`
   - Iteration from right to left:
      - `s[3] = '1'`: zeroCount = 0, swaps = 0
      - `s[2] = '1'`: zeroCount = 0, swaps = 0
      - `s[1] = '1'`: zeroCount = 0, swaps = 0
      - `s[0] = '0'`: zeroCount = 1, swaps = 0
   - Output: `0` (All `1`s are already grouped).

This solution provides an efficient way to determine the minimum steps to separate black and white balls using PHP.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

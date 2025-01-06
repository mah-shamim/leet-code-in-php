1945\. Sum of Digits of String After Convert

**Difficulty:** Easy

**Topics:** `String`, `Simulation`

You are given a string `s` consisting of lowercase English letters, and an integer `k`.

First, **convert** `s` into an integer by replacing each letter with its position in the alphabet (i.e., replace `'a'` with `1`, `'b'` with `2`, ..., `'z'` with `26`). Then, **transform** the integer by replacing it with the **sum of its digits**. Repeat the **transform** operation `k` **times** in total.

For example, if `s = "zbax"` and `k = 2`, then the resulting integer would be `8` by the following operations:

- **Convert:** `"zbax" ➝ "(26)(2)(1)(24)" ➝ "262124" ➝ 262124`
- **Transform #1:** `262124 ➝ 2 + 6 + 2 + 1 + 2 + 4 ➝ 17`
- **Transform #2:** `17 ➝ 1 + 7 ➝ 8`

Return _the resulting integer after performing the operations described above_.

**Example 1:**

- **Input:** s = "iiii", k = 1
- **Output:** 36
- **Explanation:** The operations are as follows:
  - Convert: "iiii" ➝ "(9)(9)(9)(9)" ➝ "9999" ➝ 9999
  - Transform #1: 9999 ➝ 9 + 9 + 9 + 9 ➝ 36
  - Thus the resulting integer is 36.

**Example 2:**

- **Input:** s = "leetcode", k = 2
- **Output:** 6
- **Explanation:** The operations are as follows:
   - Convert: "leetcode" ➝ "(12)(5)(5)(20)(3)(15)(4)(5)" ➝ "12552031545" ➝ 12552031545
   - Transform #1: 12552031545 ➝ 1 + 2 + 5 + 5 + 2 + 0 + 3 + 1 + 5 + 4 + 5 ➝ 33
   - Transform #2: 33 ➝ 3 + 3 ➝ 6
   - Thus the resulting integer is 6.


**Example 3:**

- **Input:** s = "zbax", k = 2
- **Output:** 8



**Constraints:**

- <code>1 <= s.length <= 100</code>
- <code>1 <= k <= 10</code>
- <code>s</code> consists of lowercase English letters.


**Hint:**
1. First, let's note that after the first transform the value will be at most `100 * 10` which is not much
2. After The first transform, we can just do the rest of the transforms by brute force



**Solution:**

We can break down the solution into two main steps:

1. **Convert the string `s` into an integer**:
   - Each character in the string is replaced with its corresponding position in the alphabet (e.g., 'a' -> 1, 'b' -> 2, ..., 'z' -> 26).
   - Concatenate all these numbers to form a large integer.

2. **Transform the integer by summing its digits `k` times**:
   - For each transformation, sum all the digits of the current number.
   - Repeat this transformation process `k` times.

Let's implement this solution in PHP: **[1945. Sum of Digits of String After Convert](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001945-sum-of-digits-of-string-after-convert/solution.php)**

```php
<?php
function getLucky($s, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo getLucky("iiii", 1) . "\n"; // Output: 36
echo getLucky("leetcode", 2) . "\n"; // Output: 6
echo getLucky("zbax", 2) . "\n"; // Output: 8
?>
```

### Explanation:

1. **Convert the String:**
   - We loop through each character in the string `s` and calculate its corresponding alphabet position using `ord($s[$i]) - ord('a') + 1`.
   - These values are concatenated to form a large string `numStr` representing the number.

2. **Transform the Number:**
   - We loop `k` times, each time summing the digits of the current `numStr`.
   - The result of this summing operation is stored back in `numStr` as a string to allow for further transformations.
   - After `k` transformations, we return the final integer value.

### Test Cases:

- `"iiii"` with `k = 1` converts to `"9999"`, sums to `36`, and since `k=1`, the final result is `36`.
- `"leetcode"` with `k = 2` converts to `"12552031545"`, sums to `33` in the first transform, and to `6` in the second transform, resulting in `6`.
- `"zbax"` with `k = 2` converts to `"262124"`, sums to `17` in the first transform, and to `8` in the second transform, resulting in `8`.

This solution is efficient given the constraints and will work well within the provided limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

2914\. Minimum Number of Changes to Make Binary String Beautiful

**Difficulty:** Medium

**Topics:** `String`

You are given a **0-indexed** binary string `s` having an even length.

A string is **beautiful** if it's possible to partition it into one or more substrings such that:

- Each substring has an **even length**.
- Each substring contains **only** `1`'s or only `0`'s.

You can change any character in `s` to `0` or `1`.

Return _the **minimum** number of changes required to make the string `s` beautiful_.

**Example 1:**

- **Input:** s = "1001"
- **Output:** 2
- **Explanation:** We change s[1] to 1 and s[3] to 0 to get string "1100".
  - It can be seen that the string "1100" is beautiful because we can partition it into "11|00".
  - It can be proven that 2 is the minimum number of changes needed to make the string beautiful.

**Example 2:**

- **Input:** s = "10"
- **Output:** 1
- **Explanation:** We change s[1] to 1 to get string "11".
  - It can be seen that the string "11" is beautiful because we can partition it into "11".
  - It can be proven that 1 is the minimum number of changes needed to make the string beautiful.


**Example 3:**

- **Input:** s = "0000"
- **Output:** 0
- **Explanation:** We don't need to make any changes as the string "0000" is beautiful already.


**Constraints:**

- <code>2 <= s.length <= 10<sup>5</sup></code>
- `s` has an even length.
- `s[i]` is either `'0'` or `'1'`.


**Hint:**
1. For any valid partition, since each part consists of an even number of the same characters, we can further partition each part into lengths of exactly `2`.
2. After noticing the first hint, we can decompose the whole string into disjoint blocks of size `2` and find the minimum number of changes required to make those blocks beautiful.



**Solution:**

We need to ensure that every pair of characters in the binary string `s` is either `"00"` or `"11"`. If a pair is not in one of these two patterns, we will need to change one of the characters to make it match.

Here's the step-by-step solution approach:

1. **Divide the String into Blocks:** Since a beautiful string can be formed from blocks of length 2, we can iterate through the string in steps of 2.

2. **Count Changes:** For each block of 2 characters, we need to determine the majority character (either `0` or `1`). We will change the minority character in the block to match the majority character.

3. **Calculate Minimum Changes:** For each block, if both characters are different, we will need 1 change; if they are the same, no changes are required.

Let's implement this solution in PHP: **[2914. Minimum Number of Changes to Make Binary String Beautiful](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002914-minimum-number-of-changes-to-make-binary-string-beautiful/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minChanges($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
echo minChanges("1001"); // Output: 2
echo minChanges("10");   // Output: 1
echo minChanges("0000"); // Output: 0
?>
```

### Explanation:

1. **Function Definition:** We define a function `minChanges` that takes a binary string `s`.

2. **Initialization:** We initialize a variable `$changes` to keep track of the number of changes required.

3. **Iterate Over the String:** We loop through the string, incrementing by 2 each time to check each block of two characters:
   - `$first` is the character at the current position.
   - `$second` is the character at the next position.

4. **Check for Changes:** If the characters in the current block are different, we increment the `$changes` counter by 1.

5. **Return Result:** Finally, we return the total number of changes required.

### Complexity:
- **Time Complexity**: _**O(n)**_, where _**n**_ is the length of the string, as we are iterating over the string once.
- **Space Complexity**: _**O(1)**_, since we are using a constant amount of extra space.

This solution operates in _**O(n)**_ time complexity, where n is the length of the string, making it efficient for the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

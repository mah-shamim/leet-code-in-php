1358\. Number of Substrings Containing All Three Characters

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Sliding Window`

Given a string `s` consisting only of characters a, b and c.

Return _the number of substrings containing **at least** one occurrence of all these characters a, b and c_.

**Example 1:**

- **Input:** s = "abcabc"
- **Output:** 10
- **Explanation:** The substrings containing at least one occurrence of the characters a, b and c are "abc", "abca", "abcab", "abcabc", "bca", "bcab", "bcabc", "cab", "cabc" and "abc" (**again**).

**Example 2:**

- **Input:** s = "aaacb"
- **Output:** 3
- **Explanation:** The substrings containing at least one occurrence of the characters a, b and c are "aaacb", "aacb" and "acb".


**Example 3:**

- **Input:** s = "abc"
- **Output:** 1



**Constraints:**

- <code>3 <= s.length <= 5 x 10<sup>4</sup></code>
- `s` only consists of a, b or c characters.


**Hint:**
1. For each position we simply need to find the first occurrence of a/b/c on or after this position.
2. So we can pre-compute three link-list of indices of each a, b, and c.



**Solution:**

We need to count the number of substrings in a given string that contain all three characters 'a', 'b', and 'c'. The solution should efficiently handle strings up to a length of 50,000 characters.

### Approach
The approach involves using a sliding window technique combined with tracking the last occurrence of each character ('a', 'b', and 'c'). The key insight is that for each position in the string, we can determine the earliest position where all three characters have appeared. This allows us to count all valid substrings ending at the current position efficiently.

1. **Track Last Occurrences**: Maintain variables to track the last occurrence indices of 'a', 'b', and 'c'.
2. **Check Validity**: For each character in the string, update its last occurrence. Once all three characters have been encountered at least once, compute the minimum of these last occurrences.
3. **Count Valid Substrings**: The number of valid substrings ending at the current position is determined by the earliest position where all three characters have appeared. This is given by the minimum of the last occurrence indices plus one (to account for zero-based indexing).

Let's implement this solution in PHP: **[1358. Number of Substrings Containing All Three Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001358-number-of-substrings-containing-all-three-characters/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function numberOfSubstrings($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfSubstrings("abcabc") . "\n"; // Output: 10
echo numberOfSubstrings("aaacb") . "\n";  // Output: 3
echo numberOfSubstrings("abc") . "\n";    // Output: 1
?>
```

### Explanation:

1. **Initialization**: Initialize `last_a`, `last_b`, and `last_c` to -1 to indicate that these characters have not been encountered yet.
2. **Iterate Through String**: For each character in the string, update its respective last occurrence index.
3. **Check Validity**: Once all three characters have been encountered (i.e., their last occurrence indices are all non-negative), compute the minimum of these indices. This minimum index represents the earliest position from which a valid substring can start.
4. **Count Substrings**: The number of valid substrings ending at the current position is given by the minimum index plus one (to convert from zero-based to one-based count). Accumulate this count for each valid position.

This approach ensures that each character is processed exactly once, leading to an O(n) time complexity, which is efficient for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
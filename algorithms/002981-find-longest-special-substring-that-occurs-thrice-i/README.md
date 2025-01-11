2981\. Find Longest Special Substring That Occurs Thrice I

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Binary Search`, `Sliding Window`, `Counting`

You are given a string `s` that consists of lowercase English letters.

A string is called **special** if it is made up of only a single character. For example, the string `"abc"` is not special, whereas the strings `"ddd"`, `"zz"`, and `"f"` are special.

Return _the length of the **longest special substring** of `s` which occurs **at least thrice**, or `-1` if no special substring occurs at least thrice_.

A **substring** is a contiguous **non-empty** sequence of characters within a string.

**Example 1:**

- **Input:** s = "aaaa"
- **Output:** 2
- **Explanation:** The longest special substring which occurs thrice is "aa": substrings "aaaa", "aaaa", and "aaaa".
  It can be shown that the maximum length achievable is 2.

**Example 2:**

- **Input:** s = "abcdef"
- **Output:** -1
- **Explanation:** There exists no special substring which occurs at least thrice. Hence return -1.


**Example 3:**

- **Input:** s = "abcdef"
- **Output:** 1
- **Explanation:** The longest special substring which occurs thrice is "a": substrings "abcaba", "abcaba", and "abcaba".
  It can be shown that the maximum length achievable is 1.



**Constraints:**

- `3 <= s.length <= 50`
- `s` consists of only lowercase English letters.


**Hint:**
1. The constraints are small.
2. Brute force checking all substrings.



**Solution:**

We can use a brute force approach due to the small constraints of `s` (length of up to 50). We'll:

1. Iterate over possible lengths of substrings (from longest to shortest).
2. Check all substrings of the given length and count their occurrences.
3. If a substring occurs at least three times, check if it is special (made of one repeated character).
4. Return the length of the longest such substring. If no substring satisfies the conditions, return `-1`.

Let's implement this solution in PHP: **[2981. Find Longest Special Substring That Occurs Thrice I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002981-find-longest-special-substring-that-occurs-thrice-i/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function maximumLength($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to check if a substring is special
 *
 * @param $substring
 * @return bool
 */
function isSpecial($substring) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumLength("aaaa") . "\n"; // Output: 2
echo maximumLength("abcdef") . "\n"; // Output: -1
echo maximumLength("abcabcabc") . "\n"; // Output: 1
?>
```

### Explanation:

1. **Outer Loop**: We iterate over the possible lengths of substrings, starting with the longest. This ensures we return the longest special substring as soon as we find it.
2. **Sliding Window**: For each substring length, we use a sliding window approach to extract all substrings of that length.
3. **Counting Substrings**: We use an associative array (`$countMap`) to store and count occurrences of each substring.
4. **Checking Special**: A helper function `isSpecial` checks if the substring is made up of only one repeated character.
5. **Returning the Result**: If a valid substring is found, we return its length; otherwise, we return `-1`.

### Complexity
- **Time Complexity**: _**O(n<sup>3</sup>)**_ in the worst case because we:
   1. Iterate over _**n**_ substring lengths.
   2. Extract _**O(n)**_ substrings for each length.
   3. Check if each substring is special, which takes _**O(n)**_ time.
- **Space Complexity**: _**O(n<sup>2</sup>)**_ due to the substring counting map.

This brute force approach is feasible given the constraints (_**n <= 50**_).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

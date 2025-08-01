3\. Longest Substring Without Repeating Characters

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Sliding Window`

Given a string `s`, find the length of the **longest substring** without repeating characters.

**Example 1:**

- **Input:** s = "abcabcbb"
- **Output:** 3
- **Explanation:** The answer is "abc", with the length of 3.

**Example 2:**

- **Input:** s = "bbbbb"
- **Output:** 1
- **Explanation:** The answer is "b", with the length of 1.

**Example 3:**

- **Input:** s = "pwwkew"
- **Output:** 3
- **Explanation:** The answer is "wke", with the length of 3. Notice that the answer must be a substring, "pwke" is a subsequence and not a substring.

**Example 4:**

- **Input:** s = ""
- **Output:** 0

**Constraints:**

- <code>0 <= s.length <= 5 * 10<sup>4</sup></code>
- `s` consists of English letters, digits, symbols and spaces.

**Hint:**
1. Generate all possible substrings & check for each substring if it's valid and keep updating maxLen accordingly.


**Similar Questions:**
1. [159. Longest Substring with At Most Two Distinct Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000159-longest-substring-with-at-most-two-distinct-characters)
2. [340. Longest Substring with At Most K Distinct Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000340-longest-substring-with-at-most-k-distinct-characters)
3. [992. Subarrays with K Different Integers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000992-subarrays-with-k-different-integers)
4. [1695. Maximum Erasure Value](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001695-maximum-erasure-value)
5. [2067. Number of Equal Count Substrings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002067-number-of-equal-count-substrings)
6. [2260. Minimum Consecutive Cards to Pick Up](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002260-minimum-consecutive-cards-to-pick-up)
7. [2401. Longest Nice Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002401-longest-nice-subarray)
8. [2405. Optimal Partition of String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002405-optimal-partition-of-string)
9. [2799. Count Complete Subarrays in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002799-count-complete-subarrays-in-an-array)
10. [2982. Find Longest Special Substring That Occurs Thrice II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002982-find-longest-special-substring-that-occurs-thrice-ii)
11. [2981. Find Longest Special Substring That Occurs Thrice I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002981-find-longest-special-substring-that-occurs-thrice-i)


**Solution:**


To solve this problem, we can follow these steps:

1. **Initialize Variables**:
    - `maxLength` to store the maximum length of substring found.
    - `charIndexMap` to store the last index of each character encountered.
    - `start` to represent the starting index of the current window.

2. **Sliding Window**:
    - Iterate through the string with an index `end` representing the end of the current window.
    - If the character at `s[end]` is already in the `charIndexMap` and its index is greater than or equal to `start`, move the `start` to `charIndexMap[s[end]] + 1`.
    - Update the `charIndexMap` with the current index of `s[end]`.
    - Calculate the current window length (`end - start + 1`) and update `maxLength` if it's larger than the previously recorded maximum length.


Let's implement this solution in PHP: **[3. Longest Substring Without Repeating Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000003-longest-substring-without-repeating-characters/solution.php)**

```php
<?php
// Example usage:
echo lengthOfLongestSubstring("abcabcbb") . "\n"; // Output: 3
echo lengthOfLongestSubstring("bbbbb") . "\n";    // Output: 1
echo lengthOfLongestSubstring("pwwkew") . "\n";   // Output: 3
echo lengthOfLongestSubstring("") . "\n";         // Output: 0

?>
```

### Explanation:

1. **Initialization**:
    - `$maxLength` is set to `0` to store the length of the longest substring without repeating characters.
    - `$charIndexMap` is an associative array to keep track of the last index at which each character was seen.
    - `$start` is initialized to `0` to represent the start of the current substring.

2. **Iterating through the String**:
    - Loop through each character of the string with the index `$end`.
    - Check if the character is already in `$charIndexMap` and its recorded index is within the current substring (i.e., `>= $start`).
    - If so, move the `start` to `charIndexMap[$char] + 1` to ensure no duplicates in the current window.
    - Update `$charIndexMap[$char]` to the current index `$end`.
    - Calculate the length of the current substring and update `$maxLength` if this length is greater than the previously recorded maximum length.

3. **Return Result**:
    - Finally, return `$maxLength` which holds the length of the longest substring without repeating characters.

This solution efficiently finds the desired substring length with a time complexity of O(n), where n is the length of the input string.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

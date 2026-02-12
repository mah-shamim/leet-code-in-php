3713\. Longest Balanced Substring I

**Difficulty:** Medium

**Topics:** `Senior`, `Hash Table`, `String`, `Counting`, `Enumeration`, `Weekly Contest 471`

You are given a string `s` consisting of lowercase English letters.

A **substring[^1]** of `s` is called **balanced** if all **distinct** characters in the **substring** appear the **same** number of times.

Return the **length** of the **longest balanced substring** of `s`.

**Example 1:**

- **Input:** s = "abbac"
- **Output:** 4
- **Explanation:** The longest balanced substring is `"abba"` because both distinct characters `'a'` and `'b'` each appear exactly 2 times.

**Example 2:**

- **Input:** s = "zzabccy"
- **Output:** 4
- **Explanation:** The longest balanced substring is `"zabc"` because the distinct characters `'z'`, `'a'`, `'b'`, and `'c'` each appear exactly 1 time.

**Example 3:**

- **Input:** s = "aba"
- **Output:** 2
- **Explanation:** One of the longest balanced substrings is `"ab"` because both distinct characters `'a'` and `'b'` each appear exactly 1 time. Another longest balanced substring is `"ba"`.

**Constraints:**

- `1 <= s.length <= 1000`
- `s` consists of lowercase English letters.



**Hint:**
1. Use bruteforce over all substrings

[^1]: **Substring:** A **substring** is a contiguous **non-empty** sequence of characters within a string.




**Solution:**

### Approach:

- **Brute-force enumeration** – Iterate over all possible substrings of the given string.
- **Frequency counting** – For each substring, maintain an array `freq[26]` to record occurrences of each lowercase letter.
- **Balance check** – Among the characters that actually appear in the substring, find the minimum frequency `minF` and the maximum frequency `maxF`.
- **Validation** – If `minF == maxF` (i.e., all distinct characters have the same count), the substring is balanced. Update the maximum length accordingly.
- **Optimisation note** – Since the string length is at most 1000, O(n²·26) is acceptable (~26 million operations).

Let's implement this solution in PHP: **[3713. Longest Balanced Substring I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003713-longest-balanced-substring-i/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function longestBalanced(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo longestBalanced("abbac") . "\n";           // Output: 4
echo longestBalanced("zzabccy") . "\n";         // Output: 4
echo longestBalanced("aba") . "\n";             // Output: 2
?>
```

### Explanation:

- **Initialisation** – Let `n = len(s)`. Set `maxLen = 0`.
- **Outer loop** – Start index `i` from 0 to `n-1`. Reset the `freq` array to zeros.
- **Inner loop** – End index `j` from `i` to `n-1`.
   - Get the current character `s[j]` and increment its frequency count in the `freq` array.
- **Compute min and max** – After each update, scan all 26 positions to find `minF` and `maxF` **only for letters with count > 0**.
- **Check equality** – If there is at least one character (`hasAny` true) and `minF == maxF`, the current substring `s[i..j]` is balanced.
   - Compare its length `(j-i+1)` with `maxLen` and keep the larger.
- **Result** – After processing all substrings, `maxLen` holds the length of the longest balanced substring.

### Complexity
- **Time Complexity**: **O(26·n²)** ≈ **O(n²)**;
- **Space Complexity**: **O(1)** extra space (constant array).


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
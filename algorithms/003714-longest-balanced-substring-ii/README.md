3714\. Longest Balanced Substring II

**Difficulty:** Medium

**Topics:** `Staff`, `Hash Table`, `String`, `Prefix Sum`, `Weekly Contest 471`

You are given a string `s` consisting only of the characters `'a'`, `'b'`, and `'c'`.

A **substring[^1]** of `s` is called **balanced** if all **distinct** characters in the **substring** appear the **same** number of times.

Return the **length of the longest balanced substring** of `s`.

**Example 1:**

- **Input:** s = "abbac"
- **Output:** 4
- **Explanation:** The longest balanced substring is `"abba"` because both distinct characters `'a'` and `'b'` each appear exactly 2 times.

**Example 2:**

- **Input:** s = "aabcc"
- **Output:** 3
- **Explanation:** The longest balanced substring is `"abc"` because all distinct characters `'a'`, `'b'` and `'c'` each appear exactly 1 time.

**Example 3:**

- **Input:** s = "aba"
- **Output:** 2
- **Explanation:** One of the longest balanced substrings is `"ab"` because both distinct characters `'a'` and `'b'` each appear exactly 1 time. Another longest balanced substring is `"ba"`.

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s` contains only the characters `'a'`, `'b'`, and `'c'`.



**Hint:**
1. Solve for three cases: all-equal characters, exactly two distinct characters, and all three characters present. Treat each case separately and take the maximum length.
2. Case 1: single character: the longest balanced substring is the longest run of the same character; report its length.
3. Case 2: two distinct characters: reduce to that pair (ignore the third character) and use prefix differences of their counts; equal counts between two indices mean the substring between them is balanced for those two chars.
4. Case 3: all three characters: use prefix counts and hash the pair `(count_b - count_a, count_c - count_a)` for each prefix; if the same pair appears at two indices the substring between them has equal counts for a, b, and c. Store earliest index per pair to get maximal length.


[^1]: **Substring:** A **substring** is a contiguous **non-empty** sequence of characters within a string.



**Solution:**

We need to solve the problem: given string s of `'a'`,`'b'`,`'c'`, find the longest substring where all distinct characters in that substring appear same number of times. That means substring can have 1,2, or 3 distinct characters. For 1 char, the condition is trivially true (only one distinct char, appears some number of times, so it's balanced? The definition: "all distinct characters in the substring appear the same number of times." If only one distinct character, then trivially all distinct characters (just that one) appear the same number of times (its count). So any substring with single character is balanced. So the longest run of same character is a candidate.

### Approach:

- **Case breakdown:** The problem is split into three separate cases based on the number of distinct characters in the substring:
   - Only one character.
   - Exactly two distinct characters.
   - All three characters present.  
     The final answer is the maximum length found among these cases.
- **Case 1 – Single character:** The longest balanced substring is simply the longest contiguous run of any single character (`'a'`, `'b'`, or `'c'`). This is found by a linear scan tracking the current run length.
- **Case 2 – Two distinct characters:** For each possible pair of characters (e.g., `'a'` and `'b'`), we ignore the third character and split the string into segments that contain only the two target characters.  
  Within a segment, treat one character as +1 and the other as -1, compute a running prefix sum, and use a hash map to store the first index where each prefix sum value occurs. When the same sum appears again, the substring between those indices has equal counts of the two characters. The maximum such length across all segments and all pairs is taken.
- **Case 3 – All three characters:** We maintain running counts of `'a'`, `'b'`, and `'c'` over the whole string. For each prefix, we form a key `(count_a - count_b, count_a - count_c)`. If the same key appears at two different indices, the substring between them has equal counts of all three characters (because both differences being zero implies `count_a = count_b = count_c`). Using a hash map to store the earliest occurrence of each key yields the longest such substring.

Let's implement this solution in PHP: **[3714. Longest Balanced Substring II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003714-longest-balanced-substring-ii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function longestBalanced($s): int
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
echo longestBalanced("aabcc") . "\n";           // Output: 3
echo longestBalanced("aba") . "\n";             // Output: 2
?>
```

### Explanation:

- **Why case splitting works:** A substring can contain 1, 2, or 3 distinct characters. The condition “all distinct characters appear the same number of times” has a different meaning in each scenario, so solving them separately is natural and efficient.
- **Case 1 – Single character:** Trivially balanced because the only distinct character appears any number of times. The longest run of the same character directly gives the maximum length.
- **Case 2 – Two characters:** By temporarily ignoring the third character, we ensure the substring contains exactly the two target characters. The prefix‑sum technique (treating one char as +1, the other as -1) tracks the difference between their counts. A repeated prefix value indicates that the net change is zero, i.e., the counts are equal between those indices. Storing the earliest occurrence guarantees the longest valid substring.
- **Case 3 – Three characters:** With three characters we have two degrees of freedom (since total length can vary). Using `(count_a - count_b, count_a - count_c)` compresses the three counts into a 2D state. When this state repeats, all three counts have increased by the same amount between the two indices, so they remain equal. Hashing this state allows O(1) lookup and earliest‑index storage.
- **Complexity:** Each case processes the string in linear time (`O(n)`), and the hash maps use `O(n)` extra space. This meets the constraint `n ≤ 10⁵`.
- **Edge handling:** The algorithm correctly handles substrings of length 1 (always balanced) and avoids counting empty substrings. The maximum from all three cases is returned.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
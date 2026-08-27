3720\. Lexicographically Smallest Permutation Greater Than Target

**Difficulty:** Medium

**Topics:** `Staff`, `Hash Table`, `String`, `Greedy`, `Counting`, `Enumeration`, `Weekly Contest 472`

You are given two strings `s` and `target`, both having length `n`, consisting of lowercase English letters.

Return the **lexicographically smallest** **permutation[^1]** of `s` that is **strictly** greater than `target`. If no permutation of `s` is lexicographically strictly greater than `target`, return an empty string.

A string `a` is **lexicographically strictly greater** than a string `b` (of the same length) if in the first position where `a` and `b` differ, string `a` has a letter that appears later in the alphabet than the corresponding letter in `b`.

[^1]: **Permutation:** A permutation is a rearrangement of all the characters of a string.

**Example 1:**

- **Input:** s = "abc", target = "bba"
- **Output:** "bca"
- **Explanation:**
  - The permutations of `s` (in lexicographical order) are `"abc"`, `"acb"`, `"bac"`, `"bca"`, `"cab"`, and `"cba"`.
  - The lexicographically smallest permutation that is strictly greater than `target` is `"bca"`.


**Example 2:**

- **Input:** s = "leet", target = "code"
- **Output:** "eelt"
- **Explanation:**
  - The permutations of `s` (in lexicographical order) are `"eelt"`, `"eetl"`, `"elet"`, `"elte"`, `"etel"`, `"etle"`, `"leet"`, `"lete"`, `"ltee"`, `"teel"`, `"tele"`, and `"tlee"`.
  - The lexicographically smallest permutation that is strictly greater than `target` is `"eelt"`.


**Example 3:**

- **Input:** s = "baba", target = "bbaa"
- **Output:** ""
- **Explanation:**
  - The permutations of `s` (in lexicographical order) are `"aabb"`, `"abab"`, `"abba"`, `"baab"`, `"baba"`, and `"bbaa"`.
  - None of them is lexicographically strictly greater than `target`. Therefore, the answer is `""`.


**Example 4:**

- **Input:** s = "ab", target = "ab"
- **Output:** "ba"


**Example 5:**

- **Input:** s = "aab", target = "aba"
- **Output:** "baa"


**Example 6:**

- **Input:** s = "z", target = "a"
- **Output:** "z"


**Example 7:**

- **Input:** s = "cba", target = "cba"
- **Output:** ""


**Example 8:**

- **Input:** s = "aaa", target = "aab"
- **Output:** ""


**Example 9:**

- **Input:** s = "xyz", target = "abc"
- **Output:** "xyz"


**Example 10:**

- **Input:** s = "aabc", target = "abac"
- **Output:** "abac"


**Constraints:**

- `1 <= s.length == target.length <= 300`
- `s` and `target` consist of only lowercase English letters.


**Hint:**
1. Maintain frequency counts of `s`.
2. Walk left-to-right; if equal to `target[i]` is possible, take it and continue.
3. If not, try the smallest letter strictly greater than `target[i]`.
4. If neither, backtrack left to the most recent index where you matched `target` and try to bump there.


**Solution:**

We implement a greedy backtracking algorithm that constructs the lexicographically smallest permutation of `s` greater than `target` by first matching `target` from left to right as much as possible, then finding the rightmost position where we can place a larger character, and finally filling the remaining positions with the smallest available characters in ascending order.

## Approach

- **Frequency Counting** – Count occurrences of each character in `s` to track available letters.
- **Greedy Match** – Iterate through `target` and consume matching characters from the frequency pool as long as possible.
- **Backtracking** – Starting from the last matched position backward, restore consumed characters and attempt to place a character strictly larger than `target[i]`.
- **Construction** – Once a larger character is placed, fill the rest of the string with the remaining characters in ascending order to ensure lexicographic minimality.
- **Fallback** – If no divergence point yields a valid permutation, return an empty string.

Let's implement this solution in PHP: **[3720. Lexicographically Smallest Permutation Greater Than Target](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003720-lexicographically-smallest-permutation-greater-than-target/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String $target
 * @return String
 */
function lexGreaterPermutation(string $s, string $target): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo lexGreaterPermutation("abc", "bba") .  "\n";       // Output: "bca"
echo lexGreaterPermutation("leet", "code") .  "\n";     // Output: "eelt"
echo lexGreaterPermutation("baba", "bbaa") .  "\n";     // Output: ""
echo lexGreaterPermutation("ab", "ab") .  "\n";         // Output: "ba"
echo lexGreaterPermutation("aab", "aba") .  "\n";       // Output: "baa"
echo lexGreaterPermutation("z", "a") .  "\n";           // Output: "z"
echo lexGreaterPermutation("cba", "cba") .  "\n";       // Output: ""
echo lexGreaterPermutation("aaa", "aab") .  "\n";       // Output: ""
echo lexGreaterPermutation("xyz", "abc") .  "\n";       // Output: "xyz"
echo lexGreaterPermutation("aabc", "abac") .  "\n";     // Output: "abac"
?>
```

### Explanation:

- **Step 1 – Frequency Array:** We create an array `cnt[26]` to store how many of each letter are available from `s`.
- **Step 2 – Longest Prefix Match:** We walk through `target` from left to right. For each `target[i]`, if we have that character available, we consume it and increase `match_len`. If not, we stop – this gives us the longest prefix of `target` that can be formed using characters from `s`.
- **Step 3 – Backtrack to Find Divergence:** We iterate `i` from `match_len` down to `0`.
   - If `i < match_len`, we restore the character `target[i]` back into the pool (because we're undoing that match).
   - Then, we try to find a character `c` > `target[i]` that is still available.
   - The first such `c` found (smallest possible) gives us the optimal divergence point.
- **Step 4 – Build the Result**
   - The prefix is `target[0..i-1]` (already matched and fixed).
   - The divergence character is `c` (the smallest greater letter available).
   - The suffix is constructed by appending all remaining characters from the frequency array in ascending order – this guarantees the smallest possible continuation.
- **Edge Cases:** If we exhaust all backtracking positions without finding a larger character, no permutation exists, so we return `""`.

## Complexity Analysis

- **Time Complexity:** `O(n * 26)` = `O(n)`
   - Matching phase: `O(n)`
   - Backtracking phase: at most `n` iterations, each scanning up to 26 characters → `O(26n)`
   - Suffix construction: `O(26 + n)`
   - Overall linear in `n` with a constant factor of 26.

- **Space Complexity:** `O(n)`
   - Frequency array: `O(26)`
   - Prefix and suffix strings: `O(n)`
   - Overall linear space relative to input length.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
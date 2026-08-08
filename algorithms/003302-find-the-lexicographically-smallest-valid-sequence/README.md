3302\. Find the Lexicographically Smallest Valid Sequence

**Difficulty:** Medium

**Topics:** `Staff`, `Two Pointers`, `String`, `Dynamic Programming`, `Greedy`, `Biweekly Contest 140`

You are given two strings `word1` and `word2`.

   A string `x` is called **almost equal** to `y` if you can change **at most** one character in `x` to make it _identical_ to `y`.

A sequence of indices `seq` is called **valid** if:

- The indices are sorted in **ascending** order.
- _Concatenating_ the characters at these indices in `word1` in **the same** order results in a string that is **almost equal** to `word2`.

Return an array of size `word2.length` representing the _lexicographically smallest[^1]_ **valid** sequence of indices. If no such sequence of indices exists, return an **empty** array.

**Note** that the answer must represent the _lexicographically smallest array_, **not** the corresponding string formed by those indices.

[^1]: **Lexicographically Smaller:** An array `a` is **lexicographically smaller** than an array `b` if in the first position where `a` and `b` differ, array `a` has an element that is less than the corresponding element in `b`. If the first `min(a.length, b.length)` elements do not differ, then the shorter array is the lexicographically smaller one.

**Example 1:**

- **Input:** word1 = "vbcca", word2 = "abc"
- **Output:** [0,1,2]
- **Explanation:**
  - The lexicographically smallest valid sequence of indices is `[0, 1, 2]`:
    - Change `word1[0]` to `'a'`.
    - `word1[1]` is already `'b'`.
    - `word1[2]` is already `'c'`.


**Example 2:**

- **Input:** word1 = "bacdc", word2 = "abc"
- **Output:** [1,2,4]
- **Explanation:**
  - The lexicographically smallest valid sequence of indices is `[1, 2, 4]`:
    - `word1[1]` is already `'a'`.
    - Change `word1[2]` to `'b'`.
    - `word1[4]` is already `'c'`.


**Example 3:**

- **Input:** word1 = "aaaaaa", word2 = "aaabc"
- **Output:** []
- **Explanation:** There is no valid sequence of indices.


**Example 4:**

- **Input:** word1 = "abc", word2 = "ab"
- **Output:** [0,1]


**Example 5:**

- **Input:** word1 = "ab", word2 = "a"
- **Output:** [0]


**Example 6:**

- **Input:** word1 = "ab", word2 = "c"
- **Output:** [0]


**Example 7:**

- **Input:** word1 = "ab", word2 = "d"
- **Output:** [0]


**Example 8:**

- **Input:** word1 = "abc", word2 = "ac"
- **Output:** [0,2]


**Example 9:**

- **Input:** word1 = "abc", word2 = "bd"
- **Output:** [1,2]


**Example 10:**

- **Input:** word1 = "xyz", word2 = "abc"
- **Output:** []


**Example 11:**

- **Input:** word1 = "aaaa", word2 = "aa"
- **Output:** [0,1]


**Example 12:**

- **Input:** word1 = "bbbb", word2 = "bb"
- **Output:** [0,1]

**Constraints:**

- `1 <= word2.length < word1.length <= 3 * 10⁵`
- `word1` and `word2` consist only of lowercase English letters.


**Hint:**
1. Let `dp[i]` be the longest suffix of `word2` that exists as a subsequence of suffix of the substring of `word1` starting at index `i`.
2. If `dp[i + 1] < m` and `word1[i] == word2[m - dp[i + 1] - 1]`,`dp[i] =  dp[i + 1] + 1`. Otherwise, `dp[i] =  dp[i + 1]`.
3. For each index `i`, greedily select characters using the `dp` array to know whether a solution exists.


**Similar Questions:**
1. [2030. Smallest K-Length Subsequence With Occurrences of a Letter](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002030-smallest-k-length-subsequence-with-occurrences-of-a-letter)


**Solution:**

We present a greedy two‑phase algorithm that constructs the lexicographically smallest valid index sequence for matching `word2` as a subsequence of `word1` with at most one character change. The algorithm first precomputes the latest possible match positions for each character of `word2` from the right (`last` array), then scans `word1` left‑to‑right, greedily taking matches whenever possible, and allowing exactly one substitution only when it can still lead to a complete solution.

## Approach

- **Precompute suffix last‑occurrence (`last`)**
   - Traverse `word1` from right to left and `word2` from right to left.
   - For each character of `word2` (starting from the last), record the rightmost index in `word1` where it can be matched.
   - This array tells us for each position `j` in `word2`, the latest index in `word1` where `word2[j]` can appear as a subsequence suffix.
- **Greedy left‑to‑right selection**
   - Maintain a pointer `j` for the current position in `word2`.
   - Maintain a flag `canSkip` (initialized `true`) indicating we still have the one allowed change.
   - Iterate `i` from 0 to `n-1`:
      - If `j == m`, we have matched all characters, break.
      - If `word1[i] == word2[j]`, take this index (exact match), advance `j`.
      - Else if we have not used the change yet (`canSkip`) **and** it is safe to change (either `j` is the last character of `word2`, or `i` is before the latest possible match for the rest of `word2` starting at `j+1`), then we use the change: set `ans[j] = i`, mark `canSkip = false`, advance `j`.
   - After the loop, if `j == m`, return the answer; otherwise return empty array.
- **Why it yields the lexicographically smallest sequence**
   - By scanning from left to right and taking the earliest possible index for each position (exact match or the allowed change), we minimise each element of the resulting array in turn.
   - The safety check using `last` ensures that using a change at the current position does not prevent a complete match for the remaining suffix.

Let's implement this solution in PHP: **[3302. Find the Lexicographically Smallest Valid Sequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003302-find-the-lexicographically-smallest-valid-sequence/solution.php)**

```php
<?php
/**
 * @param String $word1
 * @param String $word2
 * @return Integer[]
 */
function validSequence(string $word1, string $word2): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo validSequence("vbcca", "abc") .  "\n";             // Output: [0,1,2]
echo validSequence("bacdc", "abc") .  "\n";             // Output: [1,2,4]
echo validSequence("aaaaaa", "aaabc") .  "\n";          // Output: []
echo validSequence("abc", "ab") .  "\n";                // Output: [0, 1]
echo validSequence("ab", "a") .  "\n";                  // Output: [0]
echo validSequence("ab", "c") .  "\n";                  // Output: [0]
echo validSequence("ab", "d") .  "\n";                  // Output: [0]
echo validSequence("abc", "ac") .  "\n";                // Output: [0, 2]
echo validSequence("abc", "bd") .  "\n";                // Output: [1, 2]
echo validSequence("xyz", "abc") .  "\n";               // Output: []
echo validSequence("aaaa", "aa") .  "\n";               // Output: [0, 1]
echo validSequence("bbbb", "bb") .  "\n";               // Output: [0, 1]
?>
```

### Explanation:

- **Step 1 – Build `last` array:**
   - `last[j]` stores the rightmost index in `word1` that can serve as the start of a subsequence matching `word2[j..m-1]`.
   - This is computed by scanning `word1` from the end, matching backwards from the end of `word2`.
- **Step 2 – Greedy matching with one change:**
   - For each index `i` in `word1`, we try to match the current needed character `word2[j]`.
   - If characters equal, we immediately take `i` – this is always safe and gives the smallest possible index.
   - If they differ, we may use our one allowed substitution if:
      - We haven't already used it (`canSkip == true`).
      - We can still complete the rest of `word2` after this change. This is guaranteed if either `j` is the last character (no more characters needed) or `i < last[j+1]` (meaning there exists a valid subsequence for the remainder starting after `i`).
   - Using the change at the earliest possible `i` minimises the current index.
- **Step 3 – Termination check:**
   - If we successfully match all characters of `word2`, we return `ans`.
   - Otherwise, no valid sequence exists, return `[]`.

## Complexity Analysis

- **Time Complexity:** `O(n + m)`
   - One pass to build `last` (`O(n)`).
   - One pass for greedy selection (`O(n)`).
   - All operations are constant time per character.
- **Space Complexity:** `O(m)` for the `last` array and the answer array.
   - (The answer is required output, so it counts as output space; `last` is the only auxiliary structure.)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
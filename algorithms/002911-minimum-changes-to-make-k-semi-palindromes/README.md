2911\. Minimum Changes to Make K Semi-palindromes

**Difficulty:** Hard

**Topics:** `Principal`, `Two Pointers`, `String`, `Dynamic Programming`, `Weekly Contest 368`

Given a string `s` and an integer `k`, partition `s` into `k` **substrings[^1]** such that the letter changes needed to make each substring a **semi-palindrome** are minimized.

Return _the **minimum** number of letter changes required_.

A **semi-palindrome** is a special type of string that can be divided into **palindromes[^2]** based on a repeating pattern. To check if a string is a semi-palindrome:

1. Choose a positive divisor `d` of the string's length. `d` can range from `1` up to, but not including, the string's length. For a string of length `1`, it does not have a valid divisor as per this definition, since the only divisor is its length, which is not allowed.
2. For a given divisor `d`, divide the string into groups where each group contains characters from the string that follow a repeating pattern of length `d`. Specifically, the first group consists of characters at positions `1`, `1 + d`, `1 + 2d`, and so on; the second group includes characters at positions `2`, `2 + d`, `2 + 2d`, etc.
3. The string is considered a semi-palindrome if each of these groups forms a palindrome.

Consider the string `"abcabc"`:

- The length of `"abcabc"` is `6`. Valid divisors are `1`, `2`, and `3`.
- For `d = 1`: The entire string `"abcabc"` forms one group. Not a palindrome.
- For `d = 2`:
    - Group 1 (positions `1, 3, 5`): `"acb"`
    - Group 2 (positions `2, 4, 6`): `"bac"`
    - Neither group forms a palindrome.
- For `d = 3`:
    - Group 1 (positions `1, 4`): `"aa"`
    - Group 2 (positions `2, 5`): `"bb"`
    - Group 3 (positions `3, 6`): `"cc"`
    - All groups form palindromes. Therefore, `"abcabc"` is a semi-palindrome.

[^1]: **Substring:** A **substring** is a contiguous **non-empty** sequence of characters within a string.
[^2]: **Palindrome:** A **palindrome** is a string that reads the same forwards and backwards.

**Example 1:**

- **Input:** s = "abcac", k = 2
- **Output:** 1
- **Explanation:** Divide `s` into `"ab"` and `"cac"`. `"cac"` is already semi-palindrome. Change `"ab"` to `"aa"`, it becomes semi-palindrome with `d = 1`.

**Example 2:**

- **Input:** s = "abcdef", k = 2
- **Output:** 2
- **Explanation:** Divide `s` into substrings `"abc"` and `"def"`. Each needs one change to become semi-palindrome.

**Example 3:**

- **Input:**  s = "aabbaa", k = 3
- **Output:** 0
- **Explanation:** Divide `s` into substrings `"aa"`, `"bb"` and `"aa"`. All are already semi-palindromes.

**Example 4:**

- **Input:** s = "aa", k = 1
- **Output:** 0

**Example 5:**

- **Input:** s = "ab", k = 1
- **Output:** 1

**Example 6:**

- **Input:** s = "abcabc", k = 1
- **Output:** 0

**Example 7:**

- **Input:** s = "aaaa", k = 2
- **Output:** 0

**Example 8:**

- **Input:** s = "abc", k = 1
- **Output:** 1

**Example 9:**

- **Input:** s = "abcdef", k = 3
- **Output:** 3

**Example 10:**

- **Input:** s = "aabbcc", k = 3
- **Output:** 0

**Constraints:**

- `2 <= s.length <= 200`
- `1 <= k <= s.length / 2`
- `s` contains only lowercase English letters.


**Hint:**

1. Define `dp[i][j]` as the minimum count of letter changes needed to split the suffix of string `s` starting from `s[i]` into `j` valid parts.
2. We have `dp[i][j] = min(dp[x + 1][j - 1] + v[i][x])`. Here `v[i][x]` is the minimum number of letter changes to change substring `s[i..x]` into semi-palindrome.
3. `v[i][j]` can be calculated separately by **brute-force**. We can create a table of `v[i][j]` independently to improve the complexity. Also note that semi-palindrome’s length is at least `2`.


**Similar Questions:**

1. [1278. Palindrome Partitioning III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001278-palindrome-partitioning-iii)


**Solution:**

We precompute the minimum changes needed to turn every substring of length at least 2 into a semi-palindrome, then use dynamic programming to partition the whole string into exactly `k` valid semi-palindromic substrings with minimum total changes.

## Approach

- Let `n = strlen(s)`.
- Precompute `cost[l][r]`: minimum letter changes to make substring `s[l..r]` a semi-palindrome.
  - Only consider substrings with length at least `2`, because a semi-palindrome must have a valid divisor `d < length`.
  - For each substring length `len`, try every divisor `d` from `1` to `len - 1`.
  - For a fixed `d`, split positions into `d` interleaved groups using offsets `0..d-1`.
  - For each group, count mismatches between mirrored characters.
  - Sum mismatches over all groups and take the minimum over all valid `d`.
- Define DP:
  - `dp[i][p]` = minimum changes needed to split suffix `s[i..n-1]` into exactly `p` semi-palindromes.
  - Base case: `dp[n][0] = 0`.
  - Transition: choose the end index `end` of the first part, where `s[i..end]` is a semi-palindrome, then add `dp[end + 1][p - 1]`.
- Answer: `dp[0][k]`.

Let's implement this solution in PHP: **[2911. Minimum Changes to Make K Semi-palindromes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002911-minimum-changes-to-make-k-semi-palindromes/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return Integer
 */
function minimumChanges(string $s, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumChanges("abcac", 2) . "\n";                // Output: 1
echo minimumChanges("abcdef", 2) . "\n";               // Output: 2
echo minimumChanges("aabbaa", 3) . "\n";               // Output: 0
echo minimumChanges("aa", 1) . "\n";                   // Output: 0
echo minimumChanges("ab", 1) . "\n";                   // Output: 1
echo minimumChanges("abcabc", 1) . "\n";               // Output: 0
echo minimumChanges("aaaa", 2) . "\n";                 // Output: 0
echo minimumChanges("abc", 1) . "\n";                  // Output: 1
echo minimumChanges("abcdef", 3) . "\n";               // Output: 3
echo minimumChanges("aabbcc", 3) . "\n";               // Output: 0
?>
```

## Explanation

- A substring can only be semi-palindromic if its length is at least `2`.
- For a chosen divisor `d`, the substring is divided into `d` groups:
  - Group `off` contains positions `off, off + d, off + 2d, ...`.
  - Each group must become a palindrome.
- To make a group a palindrome, we compare symmetric pairs inside that group and count unequal character pairs.
- The best `d` for a substring gives the minimum changes for that substring.
- After all substring costs are known, the DP tries every possible partition into exactly `k` parts.
- Since `n <= 200`, the brute-force cost precomputation is acceptable.

## Complexity Analysis

- Let `n = |s|`, and let `τ(L)` be the number of divisors of `L`.
- Cost precomputation:
  - For each substring, we try divisors and process mirrored pairs.
  - Worst-case safe bound: `O(n⁴)`.
  - Tighter bound: `O(n³ · τ(n))` approximately.
- DP:
  - States: `O(n · k)`.
  - Transitions: for each state, try possible ending positions: `O(k · n²)`.
- Overall time: `O(n⁴ + k · n²)` safe upper bound, with `n <= 200`.
- Space:
  - Cost table: `O(n²)`.
  - DP table: `O(n · k)`.
  - Total: `O(n² + n · k)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
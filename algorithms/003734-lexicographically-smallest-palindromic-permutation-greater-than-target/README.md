3734\. Lexicographically Smallest Palindromic Permutation Greater Than Target

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Two Pointers`, `String`, `Enumeration`, `Weekly Contest 474`

You are given two strings `s` and `target`, each of length `n`, consisting of lowercase English letters.

Return the **lexicographically smallest[^1]** **string** that is **both** a **palindromic[^2]** **permutation[^3]** of `s` and **strictly** greater than `target`. If no such permutation exists, return an empty string.

[^1]: **Lexicographically Smaller:** A string `a` is **lexicographically smaller** than a string `b` if in the first position where `a` and `b` differ, string `a` has a letter that appears earlier in the alphabet than the corresponding letter in `b`. If the first `min(a.length, b.length)` characters do not differ, then the shorter string is the lexicographically smaller one.
[^2]: **Palindrome:** A **palindrome** is a string that reads the same forward and backward.
[^3]: **Permutation:** A **permutation** is a rearrangement of all the elements of a set.

**Example 1:**

- **Input:** s = "baba", target = "abba"
- **Output:** "baab"
- **Explanation:**
  - The palindromic permutations of `s` (in lexicographical order) are `"abba"` and `"baab"`.
  - The lexicographically smallest permutation that is strictly greater than `target` is `"baab"`.

**Example 2:**

- **Input:** s = "baba", target = "bbaa"
- **Output:** ""
- **Explanation:**
  - The palindromic permutations of `s` (in lexicographical order) are `"abba"` and `"baab"`.
  - None of them is lexicographically strictly greater than `target`. Therefore, the answer is `""`.

**Example 3:**

- **Input:** s = "abc", target = "abb"
- **Output:** ""
- **Explanation:** `s` has no palindromic permutations. Therefore, the answer is `""`.

**Example 4:**

- **Input:** s = "aac", target = "abb"
- **Output:** "aca"
- **Explanation:**
  - The only palindromic permutation of `s` is `"aca"`.
  - "aca" is strictly greater than `target`. Therefore, the answer is `"aca"`.

**Example 5:**

- **Input:** s = "aa", target = "aa"
- **Output:** ""

**Example 6:**

- **Input:** s = "aabb", target = "baaa"
- **Output:** "abba"

**Example 7:**

- **Input:** s = "zzz", target = "zzz"
- **Output:** ""

**Example 8:**

- **Input:** s = "abba", target = "aaaa"
- **Output:** "abba"

**Example 9:**

- **Input:** s = "aabbcc", target = "cccccc"
- **Output:** ""

**Example 10:**

- **Input:** s = "abcba", target = "abcba"
- **Output:** ""


**Constraints:**

- `1 <= n == s.length == target.length <= 300`
- `s` and `target` consist of only lowercase English letters.


**Hint:**
1. A palindromic permutation exists only if at most one character has an odd count (for odd-length strings) or all counts are even (for even-length strings).
2. Focus on constructing the first half of the palindrome. The second half is determined by mirroring.
3. To be lexicographically greater than target, the first half must be greater than or equal to target's first half, with careful handling of the middle character for odd-length strings.
4. Use a backtracking approach or greedy selection for each position in the first half, trying the smallest available character that can still produce a valid palindrome.
5. After building the first half, mirror it (and add the middle character if needed) to form the full palindrome and verify it is strictly greater than target.


**Solution:**

We need to construct the lexicographically smallest palindrome permutation of `s` that is strictly greater than `target`. Since palindromes are determined entirely by their first half (plus an optional middle character), we reduce the problem to building the smallest valid first half that yields a full palindrome > `target`, using a greedy backtracking approach with pruning.

## Approach

- Verify that `s` has at least one palindromic permutation (at most one character with odd frequency).
- Build a pool of characters available for the first half: each character count divided by 2.
- Use backtracking to construct the first half position by position.
- At each step, try to match `target` if possible; otherwise, pick the smallest available character that is greater than `target[idx]` to make the prefix strictly greater.
- Once the first half is complete, mirror it, add the middle character if needed, and check if the resulting palindrome > `target`.
- Return the first valid palindrome found (which will be lexicographically smallest).

Let's implement this solution in PHP: **[3734. Lexicographically Smallest Palindromic Permutation Greater Than Target](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003734-lexicographically-smallest-palindromic-permutation-greater-than-target/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String $target
 * @return String
 */
function lexPalindromicPermutation(string $s, string $target): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo lexPalindromicPermutation("baba", "abba") .  "\n";         // Output: "baab"
echo lexPalindromicPermutation("baba", "bbaa") .  "\n";         // Output: ""
echo lexPalindromicPermutation("abc", "abb") .  "\n";           // Output: ""
echo lexPalindromicPermutation("aac", "abb") .  "\n";           // Output: "aca"
echo lexPalindromicPermutation("aa", "aa") .  "\n";             // Output: ""
echo lexPalindromicPermutation("aabb", "baaa") .  "\n";         // Output: "abba"
echo lexPalindromicPermutation("zzz", "zzz") .  "\n";           // Output: ""
echo lexPalindromicPermutation("abba", "aaaa") .  "\n";         // Output: "abba"
echo lexPalindromicPermutation("aabbcc", "cccccc") .  "\n";     // Output: ""
echo lexPalindromicPermutation("abcba", "abcba") .  "\n";       // Output: ""
?>
```

### Explanation:

- **Validity Check**: A palindrome permutation exists iff at most one character has an odd count. If not, return `""`.
- **Pool Construction**: We only need to permute the first half. For each character, we can use at most `count / 2` occurrences.
- **Backtracking Logic**:
   - If the prefix is already greater than `target`'s prefix, we simply pick the smallest available character for each remaining position.
   - If the prefix is still equal to `target`'s prefix, we first try to place the exact same character as `target[idx]`. If that fails, we try larger characters in ascending order.
   - The recursion stops when the first half is full; then we construct the full palindrome and compare with `target`.
- **Lexicographic Minimality**: Because we try characters in ascending order and stop at the first successful full palindrome, the result is lexicographically smallest.
- **Mirroring**: For even `n`, _**palindrome = firstHalf + reverse(firstHalf)**_. For odd `n`, _**palindrome = firstHalf + midChar + reverse(firstHalf)**_.

## Complexity Analysis

- **Time Complexity**: _**O(n * 26⁽ⁿ/²⁾)**_ in worst case, but with pruning it’s much faster. The pool limits choices significantly. For `n ≤ 300`, backtracking is efficient because the number of distinct characters is fixed (26) and we greedily stop early.
- **Space Complexity**: _**O(n)**_ for recursion stack and storage of the first half.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
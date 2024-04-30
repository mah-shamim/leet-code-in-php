1915\. Number of Wonderful Substrings

Medium

A **wonderful** string is a string where at **most one** letter appears an **odd** number of times.

- For example, `"ccjjc"` and `"abab"` are wonderful, but `"ab"` is not.

Given a string `word` that consists of the first ten lowercase English letters (`'a'` through `'j'`), return _the **number of wonderful non-empty substrings** in `word`. If the same substring appears multiple times in `word`, then count **each occurrence** separately_.

A **substring** is a contiguous sequence of characters in a string.

**Example 1:**

- **Input:** word = "aba"
- **Output:** 4
- **Explanation:** The four wonderful substrings are underlined below:
  - "aba" -> "a"
  - "aba" -> "b"
  - "aba" -> "a"
  - "aba" -> "aba"

**Example 2:**

- **Input:** word = "aabb"
- **Output:** 9
- **Explanation:** The nine wonderful substrings are underlined below:
  - "aabb" -> "a"
  - "aabb" -> "aa"
  - "aabb" -> "aab"
  - "aabb" -> "aabb"
  - "aabb" -> "a"
  - "aabb" -> "abb"
  - "aabb" -> "b"
  - "aabb" -> "bb"
  - "aabb" -> "b"
  
**Example 3:**

- **Input:** word = "he"
- **Output:** 2
- **Explanation:** The two wonderful substrings are underlined below:
  - "he" -> "h"
  - "he" -> "e"

**Constraints:**

- <code>1 <= word.length <= 10<sup>5</sup></code>
- `word` consists of lowercase English letters from `'a'` to `'j'`.

2124\. Check if All A's Appears Before All B's

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `Weekly Contest 274`

Given a string `s` consisting of **only** the characters `'a'` and `'b'`, return _`true` if **every** `'a'` appears before **every** `'b'` in the string_. Otherwise, return _`false`_.

**Example 1:**

- **Input:** s = "aaabbb"
- **Output:** true
- **Explanation:**
  - The 'a's are at indices 0, 1, and 2, while the 'b's are at indices 3, 4, and 5.
  - Hence, every 'a' appears before every 'b' and we return true.

**Example 2:**

- **Input:** s = "abab"
- **Output:** false
- **Explanation:**
  - There is an 'a' at index 2 and a 'b' at index 1.
  - Hence, not every 'a' appears before every 'b' and we return false.

**Example 3:**

- **Input:** s = "bbb"
- **Output:** true
- **Explanation:**
  - There are no 'a's, hence, every 'a' appears before every 'b' and we return true.
**Example 4:**

- **Input:** s = "aaa"
- **Output:** true
- **Explanation:**
  - There are no 'b's, hence, every 'a' appears before every 'b' and we return true.

**Example 5:**

- **Input:** s = "ba"
- **Output:** false
- **Explanation:**
  - The 'b' is at index 0 and the 'a' is at index 1.
  - Hence, a 'b' appears before an 'a', so we return false.

**Example 6:**

- **Input:** s = "ab"
- **Output:** true
- **Explanation:**
  - The 'a' is at index 0 and the 'b' is at index 1.
  - Hence, every 'a' appears before every 'b' and we return true.

**Example 7:**

- **Input:** s = "a"
- **Output:** true
- **Explanation:**
  - There is only one 'a' and no 'b's.
  - Hence, every 'a' appears before every 'b' and we return true.

**Example 8:**

- **Input:** s = "b"
- **Output:** true
- **Explanation:**
  - There is only one 'b' and no 'a's.
  - Hence, every 'a' appears before every 'b' and we return true.

**Example 9:**

- **Input:** s = "aabbb"
- **Output:** true
- **Explanation:**
  - The 'a's are at indices 0 and 1, while the 'b's are at indices 2, 3, and 4.
  - Hence, every 'a' appears before every 'b' and we return true.

**Example 10:**

- **Input:** s = "bbaa"
- **Output:** false
- **Explanation:**
  - There is a 'b' at index 0 and an 'a' at index 2.
  - Hence, not every 'a' appears before every 'b' and we return false.

**Example 11:**

- **Input:** s = "abba"
- **Output:** false
- **Explanation:**
  - There is a 'b' at index 1 and an 'a' at index 3.
  - Hence, not every 'a' appears before every 'b' and we return false.

**Example 12:**

- **Input:** s = "aabb"
- **Output:** true
- **Explanation:**
  - The 'a's are at indices 0 and 1, while the 'b's are at indices 2 and 3.
  - Hence, every 'a' appears before every 'b' and we return true.

**Constraints:**

- `1 <= s.length <= 100`
- `s[i]` is either `'a'` or `'b'`.


**Hint:**

1. You can check the opposite: check if there is a ‘b’ before an ‘a’. Then, negate and return that answer.
2. s should not have any occurrences of “ba” as a substring.


**Similar Questions:**

1. [1653. Minimum Deletions to Make String Balanced](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001653-minimum-deletions-to-make-string-balanced)
2. [1752. Check if Array Is Sorted and Rotated](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001752-check-if-array-is-sorted-and-rotated)
3. [2042. Check if Numbers Are Ascending in a Sentence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002042-check-if-numbers-are-ascending-in-a-sentence)


**Solution:**

We determine whether every `'a'` appears before every `'b'` by checking whether the substring `"ba"` exists in `s`. If `"ba"` exists, then a `'b'` appears before an `'a'`, so the answer is `false`. Otherwise, the answer is `true`.

## Approach

- Use PHP’s `strpos($s, 'ba')` to search for the forbidden substring `"ba"`.
- If `strpos` returns `false`, there is no `'b'` before an `'a'`, so return `true`.
- If `strpos` returns a position, then `"ba"` exists, so return `false`.
- Use strict comparison `=== false` because `strpos` can return `0`, which is a valid position but would be loosely equal to `false`.

Let's implement this solution in PHP: **[2124. Check if All A's Appears Before All B's](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002124-check-if-all-as-appears-before-all-bs/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Boolean
 */
function checkString(string $s): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo checkString("aaabbb") ? 'true' : 'false' .  "\n";             // Output: true
echo checkString("abab") ? 'true' : 'false' .  "\n";               // Output: false
echo checkString("bbb") ? 'true' : 'false' .  "\n";                // Output: true
echo checkString("aaa") ? 'true' : 'false' .  "\n";                // Output: true
echo checkString("ba") ? 'true' : 'false' .  "\n";                 // Output: false
echo checkString("ab") ? 'true' : 'false' .  "\n";                 // Output: true
echo checkString("a") ? 'true' : 'false' .  "\n";                  // Output: true
echo checkString("b") ? 'true' : 'false' .  "\n";                  // Output: true
echo checkString("aabbb") ? 'true' : 'false' .  "\n";              // Output: true
echo checkString("bbaa") ? 'true' : 'false' .  "\n";               // Output: false
echo checkString("abba") ? 'true' : 'false' .  "\n";               // Output: false
echo checkString("aabb") ? 'true' : 'false' .  "\n";               // Output: true
?>
```

## Explanation
- The condition “every `'a'` appears before every `'b'`” is equivalent to saying there is no `'b'` before an `'a'`.
- For a string containing only `'a'` and `'b'`, having a `'b'` before an `'a'` is equivalent to having `"ba"` as a substring.
- If `"ba"` exists, there is a violation: a `'b'` occurs before an `'a'`.
- If `"ba"` does not exist, the string must be of the form all `'a'`s followed by all `'b'`s, possibly with only one character type present.
- Strings containing only `'a'`s or only `'b'`s should return `true`.

## Complexity Analysis

- **Time Complexity:** `O(n)`, where `n` is the length of `s`. `strpos` scans the string to find `"ba"`.
- **Space Complexity:** `O(1)`, since no extra data structures are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
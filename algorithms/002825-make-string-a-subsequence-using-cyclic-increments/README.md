2825\. Make String a Subsequence Using Cyclic Increments

**Difficulty:** Medium

**Topics:** `Two Pointers`, `String`

You are given two **0-indexed** strings `str1` and `str2`.

In an operation, you select a **set** of indices in `str1`, and for each index `i` in the set, increment `str1[i]` to the next character **cyclically**. That is `'a'` becomes `'b'`, `'b'` becomes `'c'`, and so on, and `'z'` becomes `'a'`.

Return _`true` if it is possible to make `str2` a subsequence of `str1` by performing the operation **at most once**, and `false` otherwise_.

**Note:** A subsequence of a string is a new string that is formed from the original string by deleting some (possibly none) of the characters without disturbing the relative positions of the remaining characters.

**Example 1:**

- **Input:** str1 = "abc", str2 = "ad"
- **Output:** true
- **Explanation:** Select index 2 in str1.
  Increment str1[2] to become 'd'.
  Hence, str1 becomes "abd" and str2 is now a subsequence. Therefore, true is returned.

**Example 2:**

- **Input:** str1 = "zc", str2 = "ad"
- **Output:** true
- **Explanation:** Select indices 0 and 1 in str1.
  Increment str1[0] to become 'a'.
  Increment str1[1] to become 'd'.
  Hence, str1 becomes "ad" and str2 is now a subsequence. Therefore, true is returned.


**Example 3:**

- **Input:** str1 = "ab", str2 = "d"
- **Output:** false
- **Explanation:** In this example, it can be shown that it is impossible to make str2 a subsequence of str1 using the operation at most once.
  Therefore, false is returned.



**Constraints:**

- <code>1 <= str1.length <= 10<sup>5</sup></code>
- <code>1 <= str2.length <= 10<sup>5</sup></code>
- `str1` and `str2` consist of only lowercase English letters.


**Hint:**
1. Consider the indices we will increment separately.
2. We can maintain two pointers: pointer `i` for `str1` and pointer `j` for `str2`, while ensuring they remain within the bounds of the strings.
3. If both `str1[i]` and `str2[j]` match, or if incrementing `str1[i]` matches `str2[j]`, we increase both pointers; otherwise, we increment only pointer `i`.
4. It is possible to make `str2` a subsequence of `str1` if `j` is at the end of `str2`, after we can no longer find a match.



**Solution:**

We need to check if we can make `str2` a subsequence of `str1` by performing at most one cyclic increment operation on any characters in `str1`:

### Explanation:
- We will use two pointers, `i` for `str1` and `j` for `str2`.
- If the character at `str1[i]` matches `str2[j]`, we move both pointers forward.
- If `str1[i]` can be incremented to match `str2[j]` (cyclically), we try to match them and then move both pointers.
- If neither of the above conditions holds, we only move the pointer `i` for `str1`.
- Finally, if we can match all characters of `str2`, then it is possible to make `str2` a subsequence of `str1`, otherwise not.

Let's implement this solution in PHP: **[2825. Make String a Subsequence Using Cyclic Increments](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002825-make-string-a-subsequence-using-cyclic-increments/solution.php)**

```php
<?php
/**
 * @param String $str1
 * @param String $str2
 * @return Boolean
 */
function canMakeSubsequence($str1, $str2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage
$str1 = "abc";
$str2 = "ad";
echo canMakeSubsequence($str1, $str2) ? 'true' : 'false'; // Output: true

$str1 = "zc";
$str2 = "ad";
echo canMakeSubsequence($str1, $str2) ? 'true' : 'false'; // Output: true

$str1 = "ab";
$str2 = "d";
echo canMakeSubsequence($str1, $str2) ? 'true' : 'false'; // Output: false
?>
```

### Explanation:

1. **Two Pointers**: `i` and `j` are initialized to the start of `str1` and `str2`, respectively.
2. **Matching Logic**: Inside the loop, we check if the characters at `str1[i]` and `str2[j]` are the same or if we can increment `str1[i]` to match `str2[j]` cyclically.
   - The cyclic increment condition is handled using `(ord($str1[$i]) + 1 - ord('a')) % 26` which checks if `str1[i]` can be incremented to match `str2[j]`.
3. **Subsequence Check**: If we have iterated through `str2` completely (i.e., `j == m`), it means `str2` is a subsequence of `str1`. Otherwise, it's not.

### Time Complexity:
- The algorithm iterates through `str1` once, and each character in `str2` is checked only once, so the time complexity is **O(n)**, where `n` is the length of `str1`.

### Space Complexity:
- The space complexity is **O(1)** since we only use a few pointers and do not need extra space dependent on the input size.

This solution efficiently checks if it's possible to make `str2` a subsequence of `str1` with at most one cyclic increment operation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

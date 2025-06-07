3170\. Lexicographically Minimum String After Removing Stars

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Stack`, `Greedy`, `Heap (Priority Queue)`

You are given a string `s`. It may contain any number of `'*'` characters. Your task is to remove all `'*'` characters.

While there is a `'*'`, do the following operation:

- Delete the leftmost `'*'` and the smallest non-`'*'` character to its left. If there are several smallest characters, you can delete any of them.

Return the lexicographically smallest[^1] resulting string after removing all `'*'` characters.

**Example 1:**

- **Input:** s = "aaba*"
- **Output:** "aab"
- **Explanation:** We should delete one of the `'a'` characters with `'*'`. If we choose `s[3]`, `s` becomes the lexicographically smallest.

**Example 2:**

- **Input:** s = "abc"
- **Output:** "abc"
- **Explanation:** There is no `'*'` in the string.



**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `s` consists only of lowercase English letters and `'*'`.
- The input is generated such that it is possible to delete all `'*'` characters.


**Hint:**
1. Each point on the left would either be connected to exactly point already connected to some left node, or a subset of the nodes on the right which are not connected to any node
2. Use dynamic programming with bitmasking, where the state will be (number of points assigned in first group, bitmask of points assigned in second group).

[^1]: **Lexicographically Smaller**: A string `a` is **lexicographically smaller** than a string `b` if in the first position where `a` and `b` differ, string `a` has a letter that appears earlier in the alphabet than the corresponding letter in `b`.
If the first `min(a.length, b.length)` characters do not differ, then the shorter string is the lexicographically smaller one.

**Solution:**

We need to remove all '*' characters from the string while ensuring that each '*' is removed along with the smallest non-'*' character to its left. If there are multiple smallest characters, we remove the rightmost one to ensure the resulting string is lexicographically smallest.

### Approach
1. **Problem Analysis**: The problem requires processing each '*' in the string by removing it along with the smallest character to its left. The key challenge is efficiently finding the smallest character to the left of each '*' and ensuring the solution is optimal for large input sizes (up to 10^5 characters).

2. **Intuition**: The lexicographically smallest string is achieved by preserving as many leftmost characters as possible. When removing a character, choosing the rightmost occurrence of the smallest character minimizes disruption to the left part of the string, which is crucial for lexicographical order.

3. **Algorithm Selection**:
    - **Buckets for Characters**: We use 26 buckets (one for each lowercase letter) to store the indices of encountered characters. Each bucket is a stack where the most recent (rightmost) index is at the top.
    - **Processing Stars**: For each '*', we scan the buckets from 'a' to 'z' (smallest to largest) to find the first non-empty bucket. The top index from this bucket (the rightmost occurrence of the smallest character) is removed along with the '*'.
    - **Efficiency**: Scanning 26 buckets per '*' ensures O(26 * n) time complexity, which is O(n) since 26 is a constant. This is efficient for large inputs.

4. **Complexity Analysis**:
    - **Time Complexity**: O(n), where n is the length of the string. Each character is processed once, and each '*' involves a constant-time scan (26 steps).
    - **Space Complexity**: O(n) for storing the buckets and the modified string.

Let's implement this solution in PHP: **[3170. Lexicographically Minimum String After Removing Stars](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003170-lexicographically-minimum-string-after-removing-stars/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function clearStars($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo clearStars("aaba*") . "\n"; // Output: aab
echo clearStars("abc") . "\n";   // Output: abc
echo clearStars("abc*def*g*") . "\n"; // Output: abdf
?>
```

### Explanation:

1. **Initialization**: Convert the input string into an array for in-place modification. Initialize 26 empty buckets (arrays) for each lowercase letter.
2. **Processing Characters**:
    - For each non-'*' character, push its index into the corresponding bucket based on its character (e.g., 'a' goes to bucket 0, 'b' to bucket 1, etc.).
    - For each '*', scan the buckets from 'a' (bucket 0) to 'z' (bucket 25) to find the first non-empty bucket. Pop the top index (rightmost occurrence) from this bucket, and mark both this index and the current '*' for removal by setting them to empty strings.
3. **Result Construction**: After processing all characters, implode the modified array into a string, effectively removing all marked characters (empty strings).

This approach efficiently processes each character and ensures the lexicographically smallest result by always removing the rightmost smallest character for each '*', leveraging bucket sorting for constant-time access to the smallest character. The solution handles large inputs within optimal time complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
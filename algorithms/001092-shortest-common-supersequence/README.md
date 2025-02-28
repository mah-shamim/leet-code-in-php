1092\. Shortest Common Supersequence

**Difficulty:** Hard

**Topics:** `String`, `Dynamic Programming`

Given two strings `str1` and `str2`, return _the shortest string that has both `str1` and `str2` as **subsequences**_. If there are multiple valid strings, return **any** of them.

A string `s` is a subsequence of string `t` if deleting some number of characters from `t` (possibly `0`) results in the string `s`.

**Example 1:**

- **Input:** str1 = "abac", str2 = "cab"
- **Output:** "cabac"
- **Explanation:**
  str1 = "abac" is a subsequence of "cabac" because we can delete the first "c".
  str2 = "cab" is a subsequence of "cabac" because we can delete the last "ac".
  The answer provided is the shortest such string that satisfies these properties.

**Example 2:**

- **Input:** str1 = "aaaaaaaa", str2 = "aaaaaaaa"
- **Output:** "aaaaaaaa"



**Constraints:**

- `1 <= str1.length, str2.length <= 1000`
- `str1` and `str2` consist of lowercase English letters.


**Hint:**
1. We can find the length of the longest common subsequence between `str1[i:]` and `str2[j:]` (for all `(i, j)`) by using dynamic programming.
2. We can use this information to recover the shortest common supersequence.



**Solution:**

We need to find the shortest common supersequence (SCS) of two given strings. The SCS is the shortest string that contains both input strings as subsequences. The approach involves using dynamic programming (DP) to determine the longest common subsequence (LCS) and then constructing the SCS by merging the two input strings based on the LCS.

### Approach
1. **Dynamic Programming (DP) Table Construction**:
   - Create a DP table where `dp[i][j]` represents the length of the LCS of the substrings `str1[0..i-1]` and `str2[0..j-1]`.
   - Fill the DP table by comparing characters of the two strings and using previously computed values to build up the solution.

2. **Backtracking to Construct SCS**:
   - Use the DP table to backtrack from `dp[m][n]` (where `m` and `n` are the lengths of the two strings) to construct the SCS.
   - While backtracking, append characters from either `str1` or `str2` based on the direction of movement in the DP table. If characters match, they are part of the LCS and added only once. If they don't match, move in the direction of the larger DP value and append the corresponding character.

3. **Handling Remaining Characters**:
   - After backtracking, append any remaining characters from either string that were not processed during the backtracking phase.

4. **Reverse the Result**:
   - Since the characters are collected in reverse order during backtracking, reverse the result to get the correct order of the SCS.

Let's implement this solution in PHP: **[1092. Shortest Common Supersequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001092-shortest-common-supersequence/solution.php)**

```php
<?php
/**
 * @param String $str1
 * @param String $str2
 * @return String
 */
function shortestCommonSupersequence($str1, $str2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Cases
echo shortestCommonSupersequence("abac", "cab") . "\n";  // Output: "cabac"
echo shortestCommonSupersequence("aaaaaaaa", "aaaaaaaa") . "\n";  // Output: "aaaaaaaa"
?>
```

### Explanation:

1. **DP Table Construction**: The DP table is built by comparing each character of the two strings. If characters match, the value is incremented from the diagonal cell. If they don't match, the value is taken from the maximum of the left or upper cell.

2. **Backtracking**: Starting from the end of both strings, characters are added to the result based on their presence in the LCS. If characters match, they are added once. If not, the direction with the higher DP value is chosen, and the corresponding character is added.

3. **Handling Remaining Characters**: After the main loop, any remaining characters from either string are appended to ensure all characters are included in the SCS.

4. **Reversing the Result**: The collected characters are reversed to form the correct order of the SCS.

This approach efficiently constructs the shortest common supersequence by leveraging the LCS, ensuring that the solution is both optimal and correct.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
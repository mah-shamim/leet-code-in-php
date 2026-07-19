1081\. Smallest Subsequence of Distinct Characters

**Difficulty:** Medium

**Topics:** `Senior Staff`, `String`, `Stack`, `Greedy`, `Monotonic Stack`, `Weekly Contest 140`

Given a string s, return the **lexicographically smallest[^1]** **subsequence[^2]** of s that contains all the distinct characters of s exactly once.

[^1]: **Lexicographically Smaller:** A string `a` is **lexicographically smaller** than a string `b` if in the first position where `a` and `b` differ, string `a` has a letter that appears earlier in the alphabet than the corresponding letter in `b`. If the first `min(a.length, b.length)` characters do not differ, then the shorter string is the lexicographically smaller one.
[^2]: **Subsequence:** A **subsequence** is a string that can be derived from another string by deleting some or no characters without changing the order of the remaining characters.

**Example 1:**

- **Input:** s = "bcabc"
- **Output:** "abc"

**Example 2:**

- **Input:** s = "cbacdcbc"
- **Output:** "acdb"

**Example 3:**

- **Input:** s = "abcd"
- **Output:** "abcd"

**Example 4:**

- **Input:** s = "dddd"
- **Output:** "d"

**Example 5:**

- **Input:** s = "a"
- **Output:** "a"

**Example 6:**

- **Input:** s = "cba"
- **Output:** "cba"

**Example 7:**

- **Input:** s = "bac"
- **Output:** "bac"

**Example 8:**

- **Input:** s = "abacb"
- **Output:** "abc"

**Example 9:**

- **Input:** s = "bbacac"
- **Output:** "bac"

**Example 10:**

- **Input:** s = "leetcode"
- **Output:** "letcod"

**Example 11:**

- **Input:** s = "abcdefghijklmnopqrstuvwxyz"
- **Output:** "abcdefghijklmnopqrstuvwxyz"

**Example 12:**

- **Input:** s = "abababab"
- **Output:** "ab"

**Example 13:**

- **Input:** s = "zyxwzyxw"
- **Output:** "zyxw"

**Constraints:**

- `1 <= s.length <= 1000`
- `s` consists of lowercase English letters.

**Note:** This question is the same as [316. Remove Duplicate Letters](https://leetcode.com/problems/remove-duplicate-letters/)


**Hint:**
1. Greedily try to add one missing character. How to check if adding some character will not cause problems ? Use bit-masks to check whether you will be able to complete the sub-sequence if you add the character at some index i.


**Similar Questions:**
1. [1673. Find the Most Competitive Subsequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001673-find-the-most-competitive-subsequence)


**Solution:**

We solve the "Smallest Subsequence of Distinct Characters" problem using a greedy algorithm with a monotonic stack, ensuring we produce the lexicographically smallest subsequence that contains each distinct character exactly once. The solution leverages character frequency tracking and last occurrence indices to make optimal decisions while maintaining the correct order of characters from the original string.

## Approach

- **Count character frequencies** to track remaining occurrences of each character in the string
- **Use a stack** to build the resulting subsequence, maintaining it in lexicographically smallest order
- **Track visited characters** using a boolean array to ensure each character appears only once
- **Apply greedy popping logic**: when current character is smaller than the stack's top character and that top character appears later in the string, pop it to allow a lexicographically smaller result
- **Store last occurrence indices** to determine if a character will appear again in the future, enabling safe removal decisions

Let's implement this solution in PHP: **[1081. Smallest Subsequence of Distinct Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001081-smallest-subsequence-of-distinct-characters/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function smallestSubsequence(string $s): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo smallestSubsequence("bcabc") .  "\n";                                  // Output: "abc"
echo smallestSubsequence("cbacdcbc") .  "\n";                               // Output: "acdb"
echo smallestSubsequence("abcd") .  "\n";                                   // Output: "abcd"
echo smallestSubsequence("dddd") .  "\n";                                   // Output: "d"
echo smallestSubsequence("a") .  "\n";                                      // Output: "a"
echo smallestSubsequence("cba") .  "\n";                                    // Output: "cba"
echo smallestSubsequence("bac") .  "\n";                                    // Output: "bac"
echo smallestSubsequence("abacb") .  "\n";                                  // Output: "acb"
echo smallestSubsequence("bbacac") .  "\n";                                 // Output: "bac"
echo smallestSubsequence("leetcode") .  "\n";                               // Output: "letcod"
echo smallestSubsequence("abcdefghijklmnopqrstuvwxyz") .  "\n";             // Output: "abcdefghijklmnopqrstuvwxyz"
echo smallestSubsequence("abababab") .  "\n";                               // Output: "ab"
echo smallestSubsequence("zyxwzyxw") .  "\n";                               // Output: "zyxw"
?>
```

### Explanation:

- **Frequency Counting**: First, we calculate the last occurrence index of each character. This allows us to know if popping a character from the stack is safe (i.e., it will appear again later).
- **Stack-Based Construction**: We iterate through the string character by character. For each character:
   - If it's already in the stack (visited), we skip it to maintain uniqueness
   - Otherwise, we check if the current character is lexicographically smaller than the top of the stack
- **Safe Removal**: While the stack isn't empty and the current character is smaller than the top, and the top character appears again later (based on last occurrence), we pop it from the stack and mark it as unvisited. This greedy decision ensures we get the smallest possible lexicographical order.
- **Add Current Character**: After removing any eligible characters, we push the current character onto the stack and mark it as visited.
- **Result Construction**: Finally, we convert the stack to a string, which contains exactly one occurrence of each distinct character in the smallest lexicographical order.

## Complexity Analysis

- **Time Complexity**: _**O(n)**_ where `n` is the length of the string. We make a single pass through the string, and each character is pushed and popped from the stack at most once.
- **Space Complexity**: _**O(1)**_ for the auxiliary arrays (26 characters for visited and last occurrence tracking) plus _**O(n)**_ for the stack in the worst case.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
- 
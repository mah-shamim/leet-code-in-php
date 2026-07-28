3517\. Smallest Palindromic Rearrangement I

**Difficulty:** Medium

**Topics:** `Senior`, `String`, `Sorting`, `Counting Sort`, `Weekly Contest 445`

You are given a **palindromic[^1]** string `s`.

Return the **lexicographically smallest[^2]** palindromic permutation[^3] of `s`.

[^1]: **Palindrome:** A **palindrome** is a string that reads the same forward and backward.

[^2]: **Lexicographically Smaller:** A string `a` is **lexicographically smaller** than a string `b` if in the first position where `a` and `b` differ, string `a` has a letter that appears earlier in the alphabet than the corresponding letter in `b`. If the first `min(a.length, b.length)` characters do not differ, then the shorter string is the lexicographically smaller one.

[^3]: **Permutation:** A **permutation** is a rearrangement of all the characters of a string.

**Example 1:**

- **Input:** s = "z"
- **Output:** "z"
- **Explanation:** A string of only one character is already the lexicographically smallest palindrome.

**Example 2:**

- **Input:** s = "babab"
- **Output:** "abbba"
- **Explanation:**Rearranging `"babab"` → `"abbba"` gives the smallest lexicographic palindrome.

**Example 3:**

- **Input:** s = "daccad"
- **Output:** "acddca"
- **Explanation:** Rearranging `"daccad"` → `"acddca"` gives the smallest lexicographic palindrome.

**Example 4:**

- **Input:** s = "a"
- **Output:** "a"

**Example 5:**

- **Input:** s = "aa"
- **Output:** "aa"

**Example 6:**

- **Input:** s = "abcba"
- **Output:** "abcba"

**Example 7:**

- **Input:** s = "aabb"
- **Output:** "abba"

**Example 8:**

- **Input:** s = "aaabaaa"
- **Output:** "aaabaaa"

**Example 9:**

- **Input:** s = "ccddcc"
- **Output:** "ccddcc"

**Example 10:**

- **Input:** s = "zaz"
- **Output:** "zaz"

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s` consists of lowercase English letters.
- `s` is guaranteed to be palindromic.


**Hint:**
1. Consider a palindrome as composed of two mirror-image halves.
2. Construct one half (using `s`), and then the other half is its reverse to obtain the lexicographically smallest permutation.


**Similar Questions:**
1. [214. Shortest Palindrome](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000214-shortest-palindrome)


**Solution:**

We use frequency counting to construct the smallest possible palindrome by building only the first half in ascending character order, placing the middle character (if any), and mirroring the first half reversed.

## Approach

- Count occurrences of each character in the string.
- Use half of each character’s count to form the left half of the palindrome.
- Identify the middle character (if any) from an odd frequency count.
- Construct the final palindrome as: `leftHalf + middle + reverse(leftHalf)`.

Let's implement this solution in PHP: **[3517. Smallest Palindromic Rearrangement I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003517-smallest-palindromic-rearrangement-i/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function smallestPalindrome(string $s): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo smallestPalindrome("z") .  "\n";               // Output: "z"
echo smallestPalindrome("babab") .  "\n";           // Output: "abbba"
echo smallestPalindrome("daccad") .  "\n";          // Output: "acddca"
echo smallestPalindrome("a") .  "\n";               // Output: "a"
echo smallestPalindrome("aa") .  "\n";              // Output: "aa"
echo smallestPalindrome("abcba") .  "\n";           // Output: "abcba"
echo smallestPalindrome("aabb") .  "\n";            // Output: "abba"
echo smallestPalindrome("aaabaaa") .  "\n";         // Output: "aaabaaa"
echo smallestPalindrome("ccddcc") .  "\n";          // Output: "ccddcc"
echo smallestPalindrome("zaz") .  "\n";             // Output: "zaz"
?>
```

### Explanation:

- A palindrome is determined by its first half; the second half is a mirror of it.
- To make the palindrome lexicographically smallest, the first half must be the smallest possible sequence of characters.
- Since the string is already palindromic, there can be at most one character with an odd frequency (the middle).
- We iterate through characters from `'a'` to `'z'` and add half of their counts to the left half, ensuring ascending order.
- The middle character (from any odd count) is placed in the center.
- The right half is the reverse of the left half, completing the palindrome.

## Complexity Analysis

- **Time:** _**O(n + 26) ≈ O(n)**_ — we count characters in _**O(n)**_ and build the result in _**O(n)**_.
- **Space:** _**O(n)**_ — for storing the result and frequency array (constant size of 26).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
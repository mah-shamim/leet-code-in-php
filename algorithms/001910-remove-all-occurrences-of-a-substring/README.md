1910\. Remove All Occurrences of a Substring

**Difficulty:** Medium

**Topics:** `String`, `Stack`, `Simulation`

Given two strings `s` and `part`, perform the following operation on `s` until **all** occurrences of the substring `part` are removed:

- Find the **leftmost** occurrence of the substring `part` and **remove** it from `s`.

Return _`s` after removing all occurrences of `part`_.

A **substring** is a contiguous sequence of characters in a string.

**Example 1:**

- **Input:** s = "daabcbaabcbc", part = "abc"
- **Output:** "dab"
- **Explanation:** The following operations are done:
  - s = "daabcbaabcbc", remove "abc" starting at index 2, so s = "dabaabcbc".
  - s = "dabaabcbc", remove "abc" starting at index 4, so s = "dababc".
  - s = "dababc", remove "abc" starting at index 3, so s = "dab".
    Now s has no occurrences of "abc".

**Example 2:**

- **Input:** s = "axxxxyyyyb", part = "xy"
- **Output:** "ab"
- **Explanation:** The following operations are done:
  - s = "axxxxyyyyb", remove "xy" starting at index 4 so s = "axxxyyyb".
  - s = "axxxyyyb", remove "xy" starting at index 3 so s = "axxyyb".
  - s = "axxyyb", remove "xy" starting at index 2 so s = "axyb".
  - s = "axyb", remove "xy" starting at index 1 so s = "ab".
    Now s has no occurrences of "xy".



**Constraints:**

- `1 <= s.length <= 1000`
- `1 <= part.length <= 1000`
- `s` and `part` consists of lowercase English letters.


**Hint:**
1. Note that a new occurrence of pattern can appear if you remove an old one, For example, `s = "ababcc"` and `pattern = "abc"`.
2. You can maintain a stack of characters and if the last character of the pattern size in the stack match the pattern remove them



**Solution:**

We need to repeatedly remove all occurrences of a substring `part` from the string `s` until no more occurrences exist. Each time we remove the leftmost occurrence of `part`, we need to check the resulting string again for new occurrences that might have formed due to the removal.

### Approach
1. **Iterative Removal**: Continuously check for the leftmost occurrence of the substring `part` in the string `s`.
2. **String Modification**: Each time the substring is found, remove it and form a new string from the remaining parts before and after the removed substring.
3. **Repeat Until Done**: Continue this process until no more occurrences of `part` are found in the string.

This approach ensures that after each removal, we check the modified string again for new occurrences, which might have formed due to the previous removal. This is necessary because removing a substring can create a new occurrence of `part` that was not present before.

Let's implement this solution in PHP: **[1910. Remove All Occurrences of a Substring](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001910-remove-all-occurrences-of-a-substring/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String $part
 * @return String
 */
function removeOccurrences($s, $part) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$s1 = "daabcbaabcbc";
$part1 = "abc";
echo "Output 1: " . removeOccurrences($s1, $part1) . PHP_EOL; // Output: "dab"

// Example 2
$s2 = "axxxxyyyyb";
$part2 = "xy";
echo "Output 2: " . removeOccurrences($s2, $part2) . PHP_EOL; // Output: "ab"
?>
```

### Explanation:

1. **Initialization**: Determine the length of the substring `part` to handle the removal efficiently.
2. **Loop Until No More Occurrences**: Use a loop to repeatedly find and remove the leftmost occurrence of `part` in `s`.
3. **String Manipulation**: Each time `part` is found, split the string into two parts: the substring before `part` and the substring after `part`. Concatenate these two parts to form the new string after removing `part`.
4. **Termination**: The loop exits when no more occurrences of `part` are found, at which point the modified string is returned.

This approach efficiently handles the problem by leveraging PHP's built-in string functions to find and remove substrings iteratively, ensuring that all possible occurrences (including those formed due to previous removals) are addressed. The time complexity is O(n^2) in the worst case, which is manageable given the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
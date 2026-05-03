796\. Rotate String

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `String Matching`, `Weekly Contest 75`

Given two strings `s` and `goal`, return _`true` if and only if `s` can become `goal` after some number of **shifts** on `s`_.

A **shift** on `s` consists of moving the leftmost character of `s` to the rightmost position.

- For example, if `s = "abcde"`, then it will be `"bcdea"` after one shift.

**Example 1:**

- **Input:** s = "abcde", goal = "cdeab"
- **Output:** true

**Example 2:**

- **Input:** s = "abcde", goal = "abced"
- **Output:** false

**Example 3:**

- **Input:** s = "a", goal = "a"
- **Output:** true

**Example 4:**

- **Input:** s = "ab", goal = "abc"
- **Output:** false


**Constraints:**

- `1 <= s.length, goal.length <= 100`
- `s` and `goal` consist of lowercase English letters.


**Solution:**

We can take advantage of the properties of string concatenation. Specifically, if we concatenate the string `s` with itself (i.e., `s + s`), all possible rotations of `s` will appear as substrings within that concatenated string. This allows us to simply check if `goal` is a substring of `s + s`.

### Approach

- Compare lengths of `s` and `goal` — if different, return `false` immediately.
- Concatenate `s` with itself to form `s + s`.
- Check if `goal` is a substring of `s + s` using `strpos`.
- Return `true` if found, `false` otherwise.

Let's implement this solution in PHP: **[796. Rotate String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000796-rotate-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String $goal
 * @return Boolean
 */
function rotateString(string $s, string $goal): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo rotateString("abcde", "cdeab") . "\n";             // Output: true
echo rotateString("abcde", "abced") . "\n";             // Output: false
echo rotateString("a", "a") . "\n";                     // Output: true 
echo rotateString("ab", "abc") . "\n";                  // Output: false 
?>
```

### Explanation:

- **Length Check**: If lengths differ, rotation is impossible.
- **Double String**: Any rotation of `s` appears as a contiguous block in `s + s`.
- **Substring Check**: Searching for `goal` in `s + s` covers all possible rotations in O(n) time with built-in functions.
- **Edge Cases**: Handles empty strings (though constraints say length ≥ 1) and single-character strings correctly.

### Complexity:
- **Time Complexity**: _**O(n)**_ — `strpos` scans through `s + s` (length 2n) for `goal`.
- **Space Complexity**: _**O(n)**_ — for storing the concatenated string `s + s`.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
